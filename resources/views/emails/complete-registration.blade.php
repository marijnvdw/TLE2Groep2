@extends('layouts.app')
@props(['application', 'userEmail', 'company'])

@section('content')
    <section class="flex justify-center px-4">
        <div class="bg-dark-moss shadow-lg shadow-dark-moss rounded-[30px] p-8 w-[80vw] max-w-[600px] mx-auto overflow-hidden mb-8">
            <div class="flex flex-col sm:flex-row-reverse justify-between items-center mb-6 gap-4">
                <h1 class="text-white text-4xl sm:text-5xl font-semibold text-center sm:text-left">
                    Uw aanmelding voor de vacature: <span class="text-rose-brown">{{ $application->title }}</span> is voltooid!
                </h1>
            </div>
            <p class="text-white mb-6 text-base sm:text-lg text-center">
                Bedankt voor uw aanmelding als <strong>{{ $application->title }}</strong> bij <strong>{{ $company->name }}, {{ $company->city }} {{ $company->address }}</strong>.
            </p>
            <p class="text-white mb-6 text-base sm:text-lg text-center">
                U staat momenteel op plaats nummer: <strong class="font-semibold">{{ $applicantCount+1 }}</strong> in de wachtlijst. Zodra het uw beurt is, ontvangt u van ons een e-mail met alle details om aan de slag te gaan.
            </p>
            <p class="text-white mb-6 text-base sm:text-lg text-center">
                Heeft u vragen? Neem gerust contact met ons op via <a href="mailto:openhiringofficial@gmail.com" class="text-rose-brown hover:underline">openhiringofficial@gmail.com</a>.
            </p>
            <p class="text-white mb-6 text-base sm:text-lg text-center">
                U heeft een e-mail ontvangen met alle informatie nogmaals op een rij. Controleer ook uw spam-map als u de e-mail niet direct kunt vinden.
            </p>
            <div class="mt-6 text-center">
                <a href="{{ url('/') }}"
                   class="bg-white text-dark-moss font-semibold rounded-[30px] px-6 py-3 inline-block hover:bg-dark-violet hover:text-white transition-colors duration-300 ease-in-out">
                    Terug naar Startpagina
                </a>
            </div>
        </div>
    </section>
@endsection
