@extends('layouts.app')

@section('content')

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
                    <form class="flex justify-center gap-10 pb-2 " method="GET">
                        {{--                    <input class="border flex-1 rounded-[30px] pl-2" type="text" name="search"--}}
                        {{--                           placeholder="Zoek vacatures">--}}
                        {{--                    <button class="border flex-1 bg-white rounded-[30px] " type="button">filters</button>--}}
                        <input class="border flex-1 rounded-[30px] pl-2" type="text" name="search"
                               placeholder="Zoek vacatures">
                        <x-button id="openModalButton" class="border flex-1 bg-white rounded-[30px] " type="button">filters</x-button>
                    </form>

                    <p class="filter-description">active filters:</p>

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
