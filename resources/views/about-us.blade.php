@extends('layouts.app')

@section('content')

    <div>

        <H1 class="text-center text-4xl sm:text-5xl font-bold text-dark-moss pt-10 pb-6">Over ons</H1>

        <div class="bg-dark-moss shadow-lg shadow-dark-moss rounded-[30px] p-6 w-[80vw] mx-auto overflow-hidden mb-8">
            <div class="text-center">
                <h2 class="text-xl sm:text-2xl font-bold text-cream py-6 break-words">Iedereen kan meedoen</h2>
            </div>

            <div class="flex items-start pb-2">

                <p class="text-lg sm:text-xl text-cream break-words">
                    Iedereen een eerlijke kans op een baan. Daar draait het om bij Open Hiring.
                    Het gaat er niet om of iemand een diploma, vlotte babbel of bakken ervaring heeft,
                    maar of iemand wíl en kan werken.
                    Bedrijven die mensen zoeken via Open Hiring houden dus geen sollicitatiegesprekken.
                    Zo hebben vooroordelen geen kans. Werkzoekenden bepalen zelf of ze geschikt zijn voor een baan.
                    Zo maken we de arbeidsmarkt eerlijk. En krijgen we mensen snel (weer) aan het werk.</p>
            </div>
        </div>


        <div class="p-6 w-[80vw] mx-auto overflow-hidden mb-8">

            <h1 class="text-dark-moss py-6 break-words text-center text-2xl sm:text-3xl font-bold">3 principes</h1>

            <div class="text-dark-moss py-6 break-words">


                <h2 class="font-bold sm:text-2xl text-xl"> 1. Het werkt beter zonder (voor)oordelen </h2>

                <p class="mt-1">Met Open Hiring krijgen (voor)oordelen geen kans. En mensen die vaak (onbewust) worden uitgesloten juist wel.
                    Dat maakt de arbeidsmarkt eerlijker en mooier.
                </p>

                <h2 class="font-bold sm:text-2xl text-xl mt-4"> 2. We vertrouwen elkaar </h2>

                <p class="mt-1">Werkzoekenden kunnen zelf prima beoordelen of ze een baan aankunnen. Door daarop te vertrouwen,
                    in mensen te geloven, worden organisaties (veer)krachtiger en diverser.
                </p>

                <h2 class="font-bold sm:text-2xl text-xl mt-4"> 3. Groeien doe je samen </h2>

                <p class="mt-1">Ieder mens heeft mooie en minder mooie kanten én momenten. Door elkaar helemaal te accepteren,
                    en te helpen, wordt een team sterker en beter in staat van elkaar te leren.
                </p>
            </div>
        </div>

        <div class="flex justify-center mt-6 mb-8">
            <form action="{{ route('application.index') }}" method="get">
                <button type="submit" class="py-2 px-4 rounded-[30px] font-semibold w-full sm:w-80 px-8 py-2 break-words
                bg-violet text-cream shadow-md shadow-dark-violet hover:bg-dark-violet hover:shadow-md hover:shadow-violet">
                    Bekijk vacatures
                </button>
            </form>
        </div>
    </div>


@endsection
