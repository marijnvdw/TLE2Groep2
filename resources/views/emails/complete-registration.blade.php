@extends('layouts.app')
@props(['application', 'userEmail'])

@section('content')
    <section class="flex justify-center px-4">
        <div class="bg-dark-moss shadow-lg shadow-dark-moss rounded-[30px] p-8 w-[80vw] max-w-[600px] mx-auto overflow-hidden mb-8">
            <div class="flex flex-col sm:flex-row-reverse justify-between items-center mb-6 gap-4">
                <h1 class="text-white text-4xl sm:text-5xl font-semibold text-center sm:text-left">
                    Uw registratie voor de vacature: <span class="text-rose-brown">{{ $application->title }}</span> is voltooid!
                </h1>
            </div>
            <p class="text-white mb-6 text-base sm:text-lg text-center">
                Een aanvullende e-mail is verzonden met meer informatie over de verdere stappen.
            </p>
            <div class="mt-6 text-center">
                <a href="mailto:{{ $userEmail }}" class="bg-white text-dark-moss font-semibold rounded-[30px] px-6 py-3 inline-block hover:bg-dark-violet hover:text-white transition-colors duration-300 ease-in-out">
                    Bekijk uw e-mail
                </a>
            </div>
        </div>
    </section>
@endsection
