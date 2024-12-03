@extends('layouts.app')

@section('content')

    <div>

        <div class="bg-dark-moss shadow-lg shadow-dark-moss rounded-[30px] p-6 w-[80vw] mx-auto overflow-hidden mb-8">
            <div class="text-center">
                <h2 class="text-xl sm:text-2xl font-bold text-cream py-6 break-words">Een baan zonder sollicitatiegesprek</h2>
                <form action="{{ route('application.index') }}" method="get">
                    <x-button href="applications" type="submit" class="w-full sm:w-80 px-8 py-2 break-words" type="primary">Bekijk vacatures</x-button>
                </form>
                <h2 class="text-xl sm:text-2xl font-bold text-cream pt-6 pb-4 break-words">Zo werkt het:</h2>
            </div>

            <div class="flex items-start pb-2">
                <img src="/img/check.png" alt="check" class="mr-2 mt-2 w-4 h-4 align-middle">
                <p class="text-lg sm:text-xl text-cream break-words">Direct reageren. Zonder sollicitatiegesprek, vragen of (voor)oordelen. Een eerlijke kans.</p>
            </div>

            <div class="flex items-start pb-2">
                <img src="/img/check.png" alt="check" class="mr-2 mt-2 w-4 h-4">
                <p class="text-lg sm:text-xl text-cream break-words">Jij bepaalt of je het kunt.</p>
            </div>

            <div class="flex items-start pb-2">
                <img src="/img/check.png" alt="check" class="mr-2 mt-2 w-4 h-4">
                <p class="text-lg sm:text-xl text-cream break-words">Snel aan de slag. Met een normaal contract, vanaf dag 1 betaald.</p>
            </div>
        </div>

        <div class="bg-cream rounded-[30px] shadow-lg shadow-medium-moss p-6 w-[80vw] mx-auto overflow-hidden">
            <div class="text-center">
                <h2 class="text-xl sm:text-2xl font-bold text-dark-moss pt-6 pb-4 break-words">Disclaimer:</h2>
            </div>

            <div class="flex items-start pb-2">
                <img src="/img/check.png" alt="check" class="mr-2 mt-2 w-4 h-4">
                <p class="text-lg sm:text-xl text-dark-moss break-words">Je bent volledig anoniem, want de werkgever krijgt niet jouw gegevens tijdens het wachten.</p>
            </div>

            <div class="flex items-start pb-2">
                <img src="/img/check.png" alt="check" class="mr-2 mt-2 w-4 h-4 align-middle">
                <p class="text-lg sm:text-xl text-dark-moss break-words">Wij als open hiring zijn een tussenpersoon voor jou
                    en de werkgever.</p>
            </div>

            <div class="flex items-start pb-2">
                <img src="/img/check.png" alt="check" class="mr-2 mt-2 w-4 h-4">
                <p class="text-lg sm:text-xl text-dark-moss break-words">Open hiring werkt doormiddel van een wachtrij!</p>
            </div>

        </div>

    </div>

@endsection
