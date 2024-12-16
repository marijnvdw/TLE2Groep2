@extends('layouts.app')

@section('content')
    @php
        $filterTranslations = [
            'location' => 'Locatie',
            'sector' => 'Sector',
            'employment' => 'Werkgelegenheid',
            'allCities' => 'Alle locaties',
            'adult' => 'Leeftijd',
            'drivers_license' => 'Rijbewijs',
        ];
    @endphp
    <style>
        .carousel-cell {
            width: 66%;
            min-height: 60vh;
            margin-right: 2rem;
            counter-increment: carousel-cell;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            background: #92AA83;
            color: #FBFCF6;
            gap: 2rem;
        }

        .carousel-cell.is-selected {
            background: #2E342A;
        }

        .carousel-cell p {
            flex: 4;
            font-weight: normal;
        }

        /* no circle */
        .flickity-button {
            background: transparent;
        }

        /* big previous & next buttons */
        .flickity-prev-next-button {
            width: 5rem;
            height: 5rem;
        }

        /* icon color */
        .flickity-button-icon {
            fill: #AA0161;
            arrowShape: 'M 0,50 L 60,00 L 50,30 L 80,30 L 80,70 L 50,70 L 60,100 Z'
        }

        /* hide disabled button */
        .flickity-button:disabled {
            display: none;
        }

        .flickity-button:focus {
            background-color: transparent;
        }


    </style>

    <div>
        <section>
            <x-modal-filter id="filterModal" class="hidden"></x-modal-filter>
            <div class=" pb-5">
                <div class="px-5 pb-5">
                    <form class="flex justify-center gap-10 pb-2 " method="GET">
                        {{--                    <input class="border flex-1 rounded-[30px] pl-2" type="text" name="search"--}}
                        {{--                           placeholder="Zoek vacatures">--}}
                        {{--                    <button class="border flex-1 bg-white rounded-[30px] " type="button">filters</button>--}}
                        <input class="border flex-1 rounded-[30px] pl-2" type="text" name="search"
                               placeholder="Zoek vacatures">
                        <x-button id="openModalButton" class="border flex-1 bg-white rounded-[30px] " type="button">
                            filters
                        </x-button>
                    </form>


                    <div>
                        <p class="filter-description">actieve filters:</p>
                        @if(!empty($activeFilters))
                            <div>
                                <ul style="width: 50%">
                                    @foreach($activeFilters as $filter => $value)
                                        <li style="color: #ffffff; background-color: #6d6d6d; display: flex; padding: 1vw">
                                            <span
                                                style="">{{ $filterTranslations[$filter] ?? ucfirst($filter) }}:</span>
                                            <span>{{ $value }}</span>
                                            <form action="{{ url()->current() }}" method="GET" style="display: inline;">
                                                @foreach (request()->except([$filter, 'page']) as $key => $val)
                                                    <input type="hidden" name="{{ $key }}" value="{{ $val }}">
                                                @endforeach
                                                <button type="submit">Verwijder filter</button>
                                            </form>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @else
                            <p>Geen actieve filters.</p>
                        @endif
                    </div>

                </div>

                <!-- Flickity HTML init -->
                <div class="carousel " data-flickity='{ "wrapAround": true, "pageDots": false}'>


                    @foreach ($applications as $index => $application)

                        <div
                            class="carousel-cell bg-dark-moss shadow-lg shadow-dark-moss rounded-[30px] p-10 w-[80vw] mx-auto overflow-hidden mb-8 flex flex-col justify-stretch ">
                            <div
                                class="flex flex-col md:flex-row md:gap-8 lg:gap-12 h-[100%] flex flex-col justify-stretch">
                                <!-- Details section -->
                                <div class=" h-[100%] flex flex-col justify-between md:w-2/3 lg:w-3/4">
                                    <div class="flex justify-center gap-8 md:gap-12 lg:gap-16">
                                        <img
                                            src="
                                                {{ $application->company->image }}"
                                            alt="{{ $application->company->image }}"
                                            class="h-12 md:h-16 lg:h-20">
                                        <div class="flex flex-col justify-center text-md md:text-lg lg:text-xl">
                                            <h2>{{ $application->title}}</h2>
                                            <h3>{{ $application->employment}}</h3>
                                        </div>
                                    </div>

                                    <!-- Image section on mobile -->
                                    <div class="flex justify-center mt-4 md:hidden">
                                        <img
                                            src="{{ $application->image}}"
                                            alt="pic " class="max-w-full h-auto object-cover">
                                    </div>

                                    <!-- Description and button -->
                                    <div class="mt-4">
                                        <p class="text-sm md:text-base lg:text-lg">
                                            {{ $application->details }}
                                        </p>

                                    </div>


                                </div>

                                <!-- Image section on larger screens -->
                                <div class="hidden md:flex md:w-1/3 lg:w-1/4 justify-center">
                                    <img
                                        src="storage/images/jmmnT6jAPaTIyxEIG4SQSgAr6O2wsF8x9XV1mUlp.jpg"
{{--                                        images/seHUIGexlgBCi4pwVo1pEMuBTVgfkEwa7TwamUBe.jpg--}}
                                    alt="mcdonalds workers" class="max-w-full h-auto object-cover">
                                </div>

                            </div>
                            <div class="flex flex-col gap-3">
                                <a href="{{route('application.show', $application)}}"
                                >
                                    <x-button type=":" href="{{route('application.show', $application)}}">Meer
                                        informatie
                                    </x-button>
                                </a>
                                <p class="text-center max-h-1">vacature {{ $index+1 }} van
                                    de {{ $applicationsCount }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    </div>
@endsection
