@extends('layouts.app')

@section('content')
    <section class="flex justify-center p-4 sm:p-8">
        <div class="bg-dark-moss shadow-lg shadow-dark-moss rounded-[30px] p-8 w-full max-w-[600px] mx-auto overflow-hidden mb-8">
            <!-- Header Section -->
            <div class="flex flex-col sm:flex-row-reverse justify-between items-center mb-6 gap-4">
                <button
                    onclick="history.back()"
                    class="bg-white text-dark-moss rounded-[30px] px-4 py-2 shadow-md hover:bg-red-500 hover:text-white transition-all duration-300 ease-in-out min-w-[120px] text-center"
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
            <!-- Description -->
            <p class="text-white mb-6 text-base sm:text-lg">
                Voel u zich aangetrokken tot deze baan en denk je dat je over de kwaliteiten beschikt
                voor deze baan, geef dan hier uw email door om op de wachtlijst gezet te worden.
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
