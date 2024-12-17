<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gefeliciteerd met uw baan</title>
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
        <h1>Gefeliciteerd met uw baan bij {{ $company->name }}</h1>
    </div>
    <div class="content">
        <p>Gefeliciteerd! U bent gekozen als <strong>{{ $application->title }}</strong> bij <strong>{{ $company->name }}, {{ $company->city }} {{ $company->address }}</strong>.</p>
        <p><strong>Wanneer?</strong><br>
            U wordt verwacht op <strong>{{ \Carbon\Carbon::parse($chosenTime)->format('d M Y') }}</strong> om <strong>{{ \Carbon\Carbon::parse($chosenTime)->format('H:i') }}</strong>. U wordt verwacht in een zwarte spijkerbroek en dichte schoenen. Tatoeages moeten zo goed mogelijk bedekt worden.
        </p>
        <p><strong>Wat moet u doen?</strong><br>
            Reageer binnen 3 dagen, anders verliest u de baan.
        </p>
        <div style="text-align: center;">
            <a href="{{ $baseUrl }}/email/confirm-job?id={{ $applicantModel->id }}&email={{ $applicantModel->email }}" class="button">
                Ja, ik kom
            </a>
        </div>
        <p>Wilt u de baan niet meer? Klik dan op:</p>
        <div style="text-align: center;">
            <a href="{{ $baseUrl }}/email/cancel-job?id={{ $applicantModel->id }}&email={{ $applicantModel->email }}" class="button">
                Afmelden
            </a>
        </div>
        <p>Heeft u vragen? Neem contact met ons op. Wij helpen u graag!</p>
        <div style="text-align: center;">
            <a href="{{ $baseUrl }}/email/add-to-calendar?id={{ $applicantModel->id }}" class="button">
                Voeg de dienst toe aan uw agenda
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
