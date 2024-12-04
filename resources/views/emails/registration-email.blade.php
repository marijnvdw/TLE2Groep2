<!DOCTYPE html>
<html>
<head>
    <style>
        .button {
            padding: 10px 20px;
            background-color: #2E342A;
            color: #DA9F93;
            border-radius: 20px;
            cursor: pointer;
            border: none;
            font-weight: bold;
            text-decoration: none;
        }
    </style>
</head>
<body>
<p>Bedankt voor uw aanmelding als {{ $application->title }} bij {{ $application->employment }}.</p>
<p>Uw aanmelding is bijna klaar. Klik op de knop hieronder om deze af te ronden:</p>
<a href="http://127.0.0.1:8000/email/complete-registration?id={{ $application->id }}&email={{ $userEmail }}" class="button">Aanmelding afronden</a>
<p>Wat gebeurt er daarna? Wij laten u via e-mail weten of u bent geselecteerd voor de baan. Houd uw e-mail goed in de gaten!</p>
<p>U heeft 3 dagen om de aanmelding te voltooien!</p>
<p>Met vriendelijke groet,</p>
<p>Team OpenHiring</p>
</body>
</html>
