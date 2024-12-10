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

    public function __construct(MailerService $mailerService)
    {
        $this->mailerService = $mailerService;
    }

    public function sendEmail(Request $request, Application $application)
    {
        $userEmail = $request->input('email');
        $company = Company::find($application->companie_id);

        $applicant = Applicant::where('email', $userEmail)
            ->where('application_id', $application->id)
            ->first();

        if ($applicant) {
            return redirect()->back()->with('error', 'Deze email staat al geregistreerd voor deze vacature.');
        }

        $htmlBody = view('emails.registration-email',
            compact('application', 'userEmail', 'company'))->render();

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
        $company = Company::find($application->companie_id);

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
                compact('application', 'userEmail', 'company', 'applicantCount'))->render();

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
        $company = Company::find($application->companie_id);

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
}
