<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Uw Aanmelding</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #2E342A;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 20px auto;
            background: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .header h1 {
            color: #2E342A;
        }

        .content {
            font-size: 16px;
        }

        .button {
            display: inline-block;
            padding: 12px 24px;
            background-color: #2E342A;
            color: #ffffff;
            text-decoration: none;
            font-weight: bold;
            border-radius: 30px;
            margin: 20px 0;
            text-align: center;
        }

        .button:hover {
            background-color: #DA9F93;
            transition: background-color 0.3s ease;
        }

        .footer {
            font-size: 14px;
            color: #666666;
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="header">
        <h1>Bedankt voor uw aanmelding!</h1>
    </div>
    <div class="content">
        <p>Bedankt voor uw aanmelding! Uw reactie is succesvol ontvangen.</p>
        <p>U staat momenteel op plaats nummer: <strong>{{ $applicantCount+1 }}</strong> in de wachtlijst voor <strong>{{ $application->title }}</strong> bij <strong>{{ $company->name }}, {{ $company->city }} {{ $company->address }}</strong>. Zodra het uw beurt is, ontvangt u van ons een e-mail met alle details om aan de slag te gaan.</p>
        <p>Heeft u vragen? Neem gerust contact met ons op via openhiringofficial@gmail.com.</p>
        <p>Wilt u weten hoe lang het nog duurt voordat u aan de beurt bent? Klik op de knop hieronder om uw plek in de wachtrij te bekijken:</p>
        <div style="text-align: center;">
            <a href="{{ $baseUrl }}/email/check-queue?id={{ $application->id }}&email={{ $userEmail }}" class="button">
                Controleer mijn plek in de wachtrij
            </a>
        </div>

                <p>Wilt u zich afmelden voor deze vacature? Klik dan op de knop hieronder om uw aanmelding te annuleren.</p>
        <div style="text-align: center;">
            <a href="{{ $baseUrl }}/email/cancel-registration?id={{ $application->id }}&email={{ $userEmail }}" class="button">
                Aanmelding annuleren
            </a>
        </div>
        <p>Met vriendelijke groet,</p>
        <p><strong>Team OpenHiring</strong></p>
    </div>
    <div class="footer">
        <p>Deze e-mail is automatisch verzonden. Neem contact op met support als u vragen heeft.</p>
    </div>
</div>
</body>
</html>
