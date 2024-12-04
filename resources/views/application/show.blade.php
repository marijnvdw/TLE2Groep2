@extends('layouts.app')

@section('content')
    <section class="flex justify-center p-4 sm:p-8">
        <div class="bg-dark-moss shadow-lg shadow-dark-moss rounded-[30px] p-8 w-full max-w-[600px] mx-auto overflow-hidden mb-8">
            <!-- Header Section -->
            <div class="flex flex-col sm:flex-row-reverse justify-between items-center mb-6 gap-4">
                <button
                    onclick="history.back()"
                    class="bg-white text-dark-moss rounded-[30px] px-4 py-2 shadow-md hover:bg-red-500 hover:text-white transition-all duration-300 ease-in-out"
                >
                    Terug X
                </button>
                <h1 class="text-white text-2xl sm:text-3xl font-semibold text-center sm:text-left">
                    {{$company->name}}, {{$company->city}} {{$company->address}}
                </h1>
            </div>

            <!-- Application Content -->
            <div class="space-y-6 text-white text-base sm:text-lg">
                <h2 class="text-rose-brown text-3xl sm:text-4xl font-bold text-center sm:text-left">
                    {{$application->title}}
                </h2>
                <p>{{$application->description}}</p>
                <p><strong>Contractvorm:</strong> {{$application->employment}}</p>
                <p><strong>Rijbewijs nodig?</strong> {{$application->drivers_licence}}</p>
                <p><strong>18+ vereist?</strong> {{$application->adult}}</p>
            </div>

            <!-- Call to Action -->
            <div class="mt-8 text-center">
                <a
                    href="{{route('email.register', $application)}}"
                    class="bg-white text-dark-moss font-semibold rounded-[30px] px-6 py-3 inline-block shadow-md hover:bg-dark-violet hover:text-white transition-transform transform hover:scale-105 duration-300 ease-in-out"
                >
                    Reageer
                </a>
            </div>
        </div>
    </section>
@endsection
