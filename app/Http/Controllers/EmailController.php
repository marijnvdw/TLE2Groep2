<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use App\Models\Application;
use App\Models\Company;
use Illuminate\Http\Request;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class EmailController extends Controller
{
    public function sendEmail(Request $request, Application $application)
    {
        $userEmail = $request->input('email');
        $company = Company::find($application->companie_id);
        // Initialize PHPMailer
        $mail = new PHPMailer(true);

        try {
            // Server settings
            $mail->isSMTP();
            $mail->Host = env('MAIL_HOST');
            $mail->SMTPAuth = true;
            $mail->Username = env('MAIL_USERNAME');
            $mail->Password = env('MAIL_PASSWORD');
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = env('MAIL_PORT');

            // Recipients
            $mail->setFrom('openhiringofficial@gmail.com', 'Open Hiring');
            $mail->addAddress($userEmail);

            // Content
            $mail->isHTML(true);
            $mail->Subject = 'Maak uw aanmelding compleet!';
            $mail->Body = view('emails.registration-email', ['application' => $application, 'userEmail' => $userEmail, 'company' => $company])->render();
            $mail->AltBody = 'Bedankt voor uw aanmelding!';

            $mail->send();
            return view('emails.registration-confirmation');
        } catch (Exception $e) {
            return response()->json(['error' => $mail->ErrorInfo], 500);
        }
    }

    public function registerEmail(Application $application)
    {
        return view('emails.vacancy-register', compact('application'));
    }

    public function completeRegistration(Request $request)
    {
        $applicationId = $request->query('id');
        $userEmail = $request->query('email');
        $application = Application::find($applicationId);

        if ($application) {
            $applicant = new Applicant();
            $applicant->email = $userEmail;
            $applicant->status = 1;
            $applicant->application_id = $applicationId;
            $applicant->save();

            // Initialize PHPMailer
            $mail = new PHPMailer(true);

            try {
                // Server settings
                $mail->isSMTP();
                $mail->Host = env('MAIL_HOST');
                $mail->SMTPAuth = true;
                $mail->Username = env('MAIL_USERNAME');
                $mail->Password = env('MAIL_PASSWORD');
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port = env('MAIL_PORT');

                // Recipients
                $mail->setFrom('openhiringofficial@gmail.com', 'Open Hiring');
                $mail->addAddress($userEmail);

                // Content
                $mail->isHTML(true);
                $mail->Subject = 'Bevestiging van uw aanmelding!';
                $mail->Body = view('emails.registration-complete-email', ['application' => $application, 'userEmail' => $userEmail])->render();
                $mail->AltBody = 'Bedankt voor uw aanmelding!';

                $mail->send();
                return view('emails.complete-registration', compact('application', 'userEmail'));

            } catch (Exception $e) {
                return response()->json(['error' => $mail->ErrorInfo], 500);
            }
        }
    }
}
