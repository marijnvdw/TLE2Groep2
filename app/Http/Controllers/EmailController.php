<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use App\Models\Application;
use App\Models\Company;
use App\Services\MailerService;
use Illuminate\Http\Request;
use function Pest\Laravel\get;

class EmailController extends Controller
{
    protected $mailerService;

    //public $baseUrl = 'http://127.0.0.1:8000';
    public $baseUrl = 'http://145.24.223.251'; //server url

    public function __construct(MailerService $mailerService)
    {
        $this->mailerService = $mailerService;
    }

    public function sendEmail(Request $request, Application $application)
    {
        $userEmail = $request->input('email');
        $company = Company::find($application->company_id);
        $baseUrl = $this->baseUrl;

        $applicant = Applicant::where('email', $userEmail)
            ->where('application_id', $application->id)
            ->first();

        if ($applicant) {
            return redirect()->back()->with('error', 'Deze email staat al geregistreerd voor deze vacature.');
        }

        $htmlBody = view('emails.registration-email',
            compact('application', 'userEmail', 'company', 'baseUrl'))->render();

        $result = $this->mailerService->sendMail(
            $userEmail,
            'Maak uw aanmelding compleet!',
            $htmlBody,
            'Bedankt voor uw aanmelding!'
        );

        if ($result === true) {
            return view('emails.registration-confirmation');
        } else {
            return response()->json(['error' => $result], 500);
        }
    }

    public function completeRegistration(Request $request)
    {
        $applicationId = $request->query('id');
        $userEmail = $request->query('email');
        $application = Application::find($applicationId);
        $company = Company::find($application->company_id);
        $baseUrl = $this->baseUrl;

        $applicant = Applicant::where('email', $userEmail)
            ->where('application_id', $applicationId)
            ->first();

        if ($applicant) {
            return redirect()->route('error.page')->with('error', 'Deze email staat al geregistreerd voor deze vacature.');
        }

        $applicantCount = Applicant::where('application_id', $applicationId)->count();


        if ($application) {
            $applicant = new Applicant();
            $applicant->email = $userEmail;
            $applicant->status = 1;
            $applicant->application_id = $applicationId;
            $applicant->save();

            $htmlBody = view('emails.registration-complete-email',
                compact('application', 'userEmail', 'company', 'applicantCount', 'baseUrl'))->render();

            $result = $this->mailerService->sendMail(
                $userEmail,
                'Bevestiging van uw aanmelding!',
                $htmlBody,
                'Bedankt voor uw aanmelding!'
            );

            if ($result === true) {
                return view('emails.complete-registration', compact('application', 'userEmail', 'company', 'applicantCount', 'applicant'));
            } else {
                return response()->json(['error' => $result], 500);
            }
        }
    }

    public function checkQueue(Request $request)
    {
        $applicationId = $request->query('id');
        $userEmail = $request->query('email');
        $application = Application::find($applicationId);
        $company = Company::find($application->company_id);

        // Get all applicants for the application, ordered by registration order
        $applicants = Applicant::where('application_id', $applicationId)
            ->orderBy('created_at', 'asc')
            ->get();

        // Find the position of the user's email
        $position = null;

        foreach ($applicants as $index => $applicant) {
            if ($applicant->email === $userEmail) {
                $position = $index + 1; // Position starts at 1, not 0
                break;
            }
        }

        if ($position === null) {
            // User's email is not found in the queue
            return redirect()->route('error.page')->with('error', 'Uw e-mailadres staat niet in de wachtrij voor deze vacature.');
        }

        return view('emails.check-queue', compact('position', 'application', 'company'));
    }

    public function sendInformApplicantsMail(Request $request)
    {
        $applicants = $request->input('applicants'); // Retrieve submitted applicants data
        $baseUrl = $this->baseUrl;

        // Track email sending results
        $errors = [];

        foreach ($applicants as $applicant) {
            $applicantId = $applicant['id'];
            $chosenTime = $applicant['time'];

            // Find the applicant by ID
            $applicantModel = Applicant::find($applicantId);
            if ($applicantModel) {
                // Retrieve the application related to the applicant
                $application = Application::find($applicantModel->application_id);
                if ($application) {
                    // Retrieve the company related to the application
                    $company = Company::find($application->company_id);
                    try {
                        // Ensure the company data is passed to the email view
                        $htmlBody = view('emails.inform-applicant-email',
                            compact('baseUrl', 'chosenTime', 'applicantModel', 'company', 'application'))->render();

                        $result = $this->mailerService->sendMail(
                            $applicantModel->email,
                            'Gefeliciteerd met uw baan!',
                            $htmlBody,
                            'Bedankt voor uw aanmelding!'
                        );

                        if ($result !== true) {
                            $errors[] = "Failed to send email to: {$applicantModel->email}";
                        }
                    } catch (\Exception $e) {
                        $errors[] = "Error sending email to {$applicantModel->email}: {$e->getMessage()}";
                    }
                } else {
                    $errors[] = "Applicant with ID {$applicantId} not found.";
                }
            }

            // Check for errors and decide the response
            if (count($errors) > 0) {
                // Log the errors or return an appropriate response
                return response()->json([
                    'message' => 'Some emails failed to send.',
                    'errors' => $errors,
                ], 500);
            }

        }
        return redirect()->route('home');

    }
}
