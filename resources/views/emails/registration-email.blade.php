@extends('layouts.app')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aanmelding Bevestigen</title>
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
        <h1>Maak uw aanmelding compleet!</h1>
    </div>
    <div class="content">
        <p>Bedankt voor uw aanmelding als <strong>{{ $application->title }}</strong> bij <strong>{{ $company->name }}, {{ $company->city }} {{ $company->address }}</strong>.</p>
        <p>Uw aanmelding is bijna klaar. Klik op de knop hieronder om deze af te ronden:</p>
        <div style="text-align: center;">
            <a href="{{ $baseUrl }}/email/complete-registration?id={{ $application->id }}&email={{ $userEmail }}" class="button">
                Aanmelding afronden
            </a>
        </div>
        <p>Wat gebeurt er daarna? Wij laten u via e-mail weten of u bent geselecteerd voor de baan. Houd uw e-mail goed in de gaten!</p>
        <p>U heeft 3 dagen om de aanmelding te voltooien!</p>
        <p>Met vriendelijke groet,</p>
        <p><strong>Team OpenHiring</strong></p>
    </div>
    <div class="footer">
        <p>Deze e-mail is automatisch verzonden. Neem contact op met support als u vragen heeft.</p>
    </div>
</div>
</body>
</html>
