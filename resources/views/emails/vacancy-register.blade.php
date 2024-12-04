@extends('layouts.app')
@props(['application'])

@section('content')
    <section class="flex justify-center p-4 sm:p-8">
        <div
            class="bg-dark-moss shadow-lg shadow-dark-moss rounded-[30px] p-8 w-full max-w-[600px] mx-auto overflow-hidden mb-8"
        >
            <!-- Header Section -->
            <div class="flex flex-col-reverse sm:flex-row justify-between items-center mb-6 gap-4">
                <h1 class="text-rose-brown text-3xl sm:text-4xl font-bold text-center sm:text-left">
                    {{$application->title}}
                </h1>
                <button
                    onclick="history.back()"
                    class="bg-white text-dark-moss rounded-[30px] px-4 py-2 shadow-md hover:bg-red-500 hover:text-white transition-all duration-300 ease-in-out min-w-[120px] text-center"
                >
                    Terug X
                </button>
            </div>

            <!-- Description -->
            <p class="text-white mb-6 text-base sm:text-lg">
                Voel jij je aangetrokken tot deze baan en denk je dat je over de kwaliteiten beschikt
                voor deze baan, geef dan hier je email door om op de wachtlijst gezet te worden.
            </p>

            <!-- Form Section -->
            <form action="{{ route('email.send', $application) }}" method="GET">
                <div class="flex flex-col gap-4">
                    <input
                        type="email"
                        id="email"
                        name="email"
                        value="{{ old('email') }}"
                        placeholder="Email"
                        required
                        class="rounded-[30px] p-3 w-full md:w-auto border border-gray-300 focus:outline-none focus:ring-2 focus:ring-dark-moss"
                    >
                    <button
                        type="submit"
                        class="bg-white text-dark-moss font-semibold rounded-[30px] px-6 py-3 w-full md:w-auto hover:bg-dark-violet hover:text-white transition-transform transform hover:scale-105 duration-300 ease-in-out"
                    >
                        Verzend E-mail
                    </button>
                </div>
            </form>
        </div>
    </section>
@endsection
