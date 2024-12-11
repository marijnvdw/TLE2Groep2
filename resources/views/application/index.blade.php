@extends('layouts.app')

@section('content')
    @php
        $filterTranslations = [
            'location' => 'Locatie',
            'sector' => 'Sector',
            'employment' => 'Werkgelegenheid',
            'allCities' => 'Alle locaties',
            'adult' => '18+',
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
            <div class="px-5 pb-5">
                <div class="px-5 pb-5">
                    <form class="flex justify-center gap-10 pb-2" method="GET" action="{{ route('application.index') }}">
                        <input type="text" name="search" value="{{ request('search') }}" placeholder="Zoek vacatures" id="searchInput" class="border flex-1 rounded-[30px] pl-2">
                        @foreach(request()->except('search') as $key => $value)
                            <input type="hidden" name="{{ $key }}" value="{{ $value }}">
                        @endforeach
                    </form>
                    <x-button id="openModalButton" class="border flex-1 bg-white rounded-[30px]" type="submit">Zoeken</x-button>




                    <div class="flex flex-wrap ">
                        <p class="text-sm font-medium pr-2">actieve filters:  </p>
                        @if(!empty($activeFilters))
                            <div class="100% overflow-hidden">
                                <ul class="flex  flex-wrap gap-2">
                                    @foreach($activeFilters as $filter => $value)
                                        <li class="bg-white text-black text-xs items-center justify-between pl-2 rounded-[30px] flex flex-row border">
                                            <span class="mr-2">{{ $filterTranslations[$filter] ?? ucfirst($filter) }}:</span>
                                            <span class="mr-2">{{ $value }}</span>
                                            <form action="{{ url()->current() }}" method="GET" class="inline-block">
                                                @foreach (request()->except([$filter, 'page']) as $key => $val)
                                                    <input type="hidden" name="{{ $key }}" value="{{ $val }}">
                                                @endforeach
                                                <button type="submit" class=" py-1 px-2 rounded-[30px] hover:bg-red-600">x</button>
                                            </form>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @else
                            <p class="text-gray-500">Geen actieve filters.</p>
                        @endif
                    </div>

                </div>

                <!-- Flickity HTML init -->
                <div class="carousel" data-flickity='{ "wrapAround": true }'>

                    {{--                <div--}}
                    {{--                    class="carousel-cell bg-dark-moss shadow-lg shadow-dark-moss rounded-[30px] p-10 w-[80vw] mx-auto overflow-hidden mb-8">--}}

                    {{--                    <div class="flex flex-col md:flex-row md:gap-8 lg:gap-12">--}}
                    {{--                        <!-- Details section -->--}}
                    {{--                        <div class="flex flex-col justify-center md:w-2/3 lg:w-3/4">--}}
                    {{--                            <div class="flex justify-center gap-8 md:gap-12 lg:gap-16">--}}
                    {{--                                <img--}}
                    {{--                                    src="https://cdn.freebiesupply.com/logos/large/2x/mcdonalds-15-logo-png-transparent.png"--}}
                    {{--                                    alt="logo"--}}
                    {{--                                    class="h-12 md:h-16 lg:h-20">--}}
                    {{--                                <div class="flex flex-col justify-center text-md md:text-lg lg:text-xl">--}}
                    {{--                                    <h2>MCdonalds</h2>--}}
                    {{--                                    <h3>Rotterdam Blaak</h3>--}}
                    {{--                                </div>--}}
                    {{--                            </div>--}}

                    {{--                            <!-- Image section on mobile -->--}}
                    {{--                            <div class="flex justify-center mt-4 md:hidden">--}}
                    {{--                                <img--}}
                    {{--                                    src="https://mei-arch.eu/en/wp-content/uploads/sites/2/2022/01/OvD-47-1020x1320.jpg?image-crop-positioner-ts=1642509477"--}}
                    {{--                                    alt="mcdonalds work" class="max-w-full h-auto object-cover">--}}
                    {{--                            </div>--}}

                    {{--                            <!-- Description and button -->--}}
                    {{--                            <div class="mt-4">--}}
                    {{--                                <p class="text-sm md:text-base lg:text-lg">--}}
                    {{--                                    beschrijving pipikaka--}}
                    {{--                                    mcdonalds yummy yippee ich habe cola--}}
                    {{--                                </p>--}}
                    {{--                                <a href="" class="block mt-4 text-center">--}}
                    {{--                                    <x-button type=":">Meer informatie</x-button>--}}
                    {{--                                </a>--}}
                    {{--                            </div>--}}
                    {{--                        </div>--}}

                    {{--                        <!-- Image section on larger screens -->--}}
                    {{--                        <div class="hidden md:flex md:w-1/3 lg:w-1/4 justify-center">--}}
                    {{--                            <img--}}
                    {{--                                src="https://mei-arch.eu/en/wp-content/uploads/sites/2/2022/01/OvD-47-1020x1320.jpg?image-crop-positioner-ts=1642509477"--}}
                    {{--                                alt="mcdonalds work" class="max-w-full h-auto object-cover">--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}

                    {{--                </div>--}}

                    @foreach ($applications as $application)
                        <div
                            class="carousel-cell bg-dark-moss shadow-lg shadow-dark-moss rounded-[30px] p-10 w-[80vw] mx-auto overflow-hidden mb-8">
                            <div class="flex flex-col md:flex-row md:gap-8 lg:gap-12">
                                <!-- Details section -->
                                <div class="flex flex-col justify-center md:w-2/3 lg:w-3/4">
                                    <div class="flex justify-center gap-8 md:gap-12 lg:gap-16">
                                        <img
                                            src="
                                         {{ $application->details }}"
                                            alt="logo"
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
                                            {{ $application->description }}
                                        </p>


                                        <a href="{{route('application.show', $application)}}"
                                        >
                                            <x-button type=":">Meer informatie</x-button>
                                        </a>
                                    </div>
                                </div>

                                <!-- Image section on larger screens -->
                                <div class="hidden md:flex md:w-1/3 lg:w-1/4 justify-center">
                                    <img
                                        src="https://mei-arch.eu/en/wp-content/uploads/sites/2/2022/01/OvD-47-1020x1320.jpg?image-crop-positioner-ts=1642509477"
                                        alt="mcdonalds work" class="max-w-full h-auto object-cover">
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <p class="text-center	">pagina x/x</p>
            </div>
        </section>
    </div>
@endsection
