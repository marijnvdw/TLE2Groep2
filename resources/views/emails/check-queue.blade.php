@extends('layouts.app')

@section('content')
    <section class="flex justify-center px-4">
        <div class="bg-dark-moss shadow-lg shadow-dark-moss rounded-[30px] p-8 w-[80vw] max-w-[600px] mx-auto overflow-hidden mb-8">
            <h1 class="text-rose-brown text-3xl sm:text-4xl font-bold mb-6 text-center">Uw plaats in de wachtlijst</h1>
            <p class="text-white text-base sm:text-lg text-center mb-6">
                U staat momenteel op plaats nummer: <strong>{{ $position }}</strong> in de wachtlijst voor de {{ $application->title }}, {{ $company->name }}.
            </p>
            <div class="mt-6 text-center">
                <a
                    href="{{ url('/') }}"
                    class="bg-white text-dark-moss font-semibold rounded-[30px] px-6 py-3 inline-block hover:bg-dark-violet hover:text-white transition-colors duration-300 ease-in-out"
                >
                    Terug naar Startpagina
                </a>
            </div>
        </div>
    </section>
@endsection
