@extends('layouts.app')

@section('content')

    <div>

        <div class="bg-dark-moss shadow-lg shadow-dark-moss rounded-[30px] p-6 w-[80vw] mx-auto overflow-hidden mb-8">
            <div class="text-center">
                <h2 class="text-xl sm:text-2xl font-bold text-cream py-6 break-words">Een baan zonder
                    sollicitatiegesprek</h2>
                <form action="{{ route('application.index') }}" method="get">
                    <x-button href="applications" type="submit" class="w-full sm:w-80 px-8 py-2 break-words"
                              type="primary">Bekijk vacatures
                    </x-button>
                </form>
                <h2 class="text-xl sm:text-2xl font-bold text-cream pt-6 pb-4 break-words">Zo werkt het:</h2>
            </div>

            <div class="flex items-start pb-2">
                <img src="/img/checkWhite.png" alt="1" class="mr-2 mt-2 w-4 h-4 align-middle">
                <p class="text-lg sm:text-xl text-cream break-words">Direct reageren. Zonder sollicitatiegesprek, vragen
                    of (voor)oordelen. Een eerlijke kans.</p>
            </div>

            <div class="flex items-start pb-2">
                <img src="/img/checkWhite.png" alt="2" class="mr-2 mt-2 w-4 h-4">
                <p class="text-lg sm:text-xl text-cream break-words">Jij bepaalt of je het kunt.</p>
            </div>

            <div class="flex items-start pb-2">
                <img src="/img/checkWhite.png" alt="3" class="mr-2 mt-2 w-4 h-4">
                <p class="text-lg sm:text-xl text-cream break-words">Snel aan de slag. Met een normaal contract, vanaf
                    dag 1 betaald.</p>
            </div>
        </div>

        <div class="bg-cream rounded-[30px] shadow-lg shadow-medium-moss p-6 w-[80vw] mx-auto overflow-hidden">
            <div class="text-center">
                <h2 class="text-xl sm:text-2xl font-bold text-dark-moss pt-6 pb-4 break-words">Goed om te weten:</h2>
            </div>

            <div class="flex items-start pb-2">
                <img src="/img/check.png" alt="1" class="mr-2 mt-2 w-4 h-4">
                <p class="text-lg sm:text-xl text-dark-moss break-words">Je bent volledig anoniem, want de werkgever
                    krijgt niet jouw gegevens tijdens het wachten.</p>
            </div>

            <div class="flex items-start pb-2">
                <img src="/img/check.png" alt="2" class="mr-2 mt-2 w-4 h-4 align-middle">
                <p class="text-lg sm:text-xl text-dark-moss break-words">Wij als open hiring zijn een tussenpersoon voor
                    jou
                    en de werkgever.</p>
            </div>

            <div class="flex items-start pb-2">
                <img src="/img/check.png" alt="3" class="mr-2 mt-2 w-4 h-4">
                <p class="text-lg sm:text-xl text-dark-moss break-words">Open hiring werkt doormiddel van een
                    wachtlijst!</p>
                <div
                    id="infoIcon"
                    class="flex items-center justify-center w-6 h-6 ml-2 mt-0.5 cursor-pointer"
                    onclick="togglePopup()" tabindex="0" role="button">
                    <img src="/img/information-button.png">
                </div><br>
            </div>
                <!-- Popup -->
                <div
                    id="infoPopup"
                    class=" left-0 mt-3 p-4 bg-violet bg-opacity-80 rounded-lg shadow-lg shadow-dark-violet hidden"
                    onmouseover="keepPopupOpen()"
                    onmouseleave="hidePopup()"
                >
                    <h3 class="text-xl sm:text-2xl font-bold text-cream pt-6 pb-4 break-words">Hoe werkt de wachtlijst?</h3>
                    <p class="text-lg sm:text-xl text-cream break-words">

                    Als je je aanmeldt, krijg je meteen een plek in de wachtrij. Hoe eerder je je aanmeldt, hoe sneller
                    je kans maakt om gekozen te worden door de werkgever. De werkgever selecteert kandidaten van
                    bovenaan de lijst, dus vroeg aanmelden vergroot je kansen om snel aan de slag te gaan. Door je nu
                    aan te melden, zet je de eerste stap richting jouw nieuwe baan!
                </p>
            </div>


            <script>
                let isPopupHovered = false;
                const popup = document.getElementById('infoPopup');
                const infoIcon = document.getElementById('infoIcon');
                const infoPopup = document.getElementById('infoPopup');

                function showPopup() {
                    popup.classList.remove('hidden');
                }

                function hidePopup() {
                    if (!isPopupHovered) {
                        popup.classList.add('hidden');
                    }
                }

                function togglePopup() {
                    popup.classList.toggle('hidden');
                }

                function keepPopupOpen() {
                    isPopupHovered = true;
                }

                document.addEventListener('click', (event) => {
                    if (!infoIcon.contains(event.target) && !infoPopup.contains(event.target)) {
                        hidePopup();
                    }
                });
                document.addEventListener('keydown', (event) => {
                    if ((event.key === 'Enter' || event.key === ' ') && document.activeElement === infoIcon) {
                        togglePopup();
                        event.preventDefault();
                    }
                });
            </script>

        </div>

    </div>

@endsection
