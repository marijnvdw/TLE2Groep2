<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class EmailController extends Controller
{
    public function sendEmail(Request $request)
    {
        $userEmail = $request->input('email');
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
            $mail->Body = view('emails.registration-email')->render();
            $mail->AltBody = 'Bedankt voor uw aanmelding!';

            $mail->send();
            return view('home');
        } catch (Exception $e) {
            return response()->json(['error' => $mail->ErrorInfo], 500);
        }
    }
    public function registerEmail(Application $application) {
        return view('emails.vacancy-register', compact('application'));
    }
}
