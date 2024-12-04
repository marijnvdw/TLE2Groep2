@extends('layouts.app')

@section('content')

    <style>

        .logo-en-titel {
            display: flex;
            justify-content: space-evenly;
        }

        .logo-en-titel img {
            height: 50px;

        }

        * {
            box-sizing: border-box;
        }


        form {
            display: flex;
            justify-content: center;
            align-content: center;
            padding: 10px 20px 5px 20px;
            gap: 20px;
        }

        form input {
            border-radius: 30px;
            text-align: center;
            flex: 1;
            border: 1px black solid;

        }

        form button {
            flex: 1;
            background-color: white;
            border-radius: 30px;
            color: #7C1A51;
            border: 1px black solid;
        }

        .filter-description {
            padding-left: 20px;
            padding-bottom: 20px;
        }

        .carousel {
            margin-bottom: 200px;
            z-index: -2;
        }

        .carousel-cell {

            width: 66%;
            height: 50vh;
            margin-right: 10px;
            counter-increment: carousel-cell;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            background: #92AA83;
            color: #FBFCF6;
            gap: 10px;


        }


        /* cell number */
        .carousel-cell:before {
            display: block;
            text-align: center;
            /*content: counter(carousel-cell);*/
            line-height: 200px;
            font-size: 80px;
        }

        .carousel-cell.is-selected {
            background: #2E342A;
        }

        .logo-en-titel {
            flex: 1;

        }

        .vacature-img-container {
            flex: 2;
            align-self: center;
            height: 150px;
            width: 100%; /* Ensures it spans the container width */
            /*overflow: hidden; !* Prevents overflowing content *!*/
            display: flex;
            justify-content: center;
            align-items: center;
            /*padding: 5px 20px;*/
        }

        .vacature-img-container img {
            max-width: 100%;
            max-height: 100%;
            width: 100%;
            object-fit: cover;
        }

        .carousel-cell p {
            flex: 4;
            font-weight: normal;
            /*background-color: red;*/
            z-index: -2;
        }

        .carousel-cell a {
            text-align: center;
            background-color: white;
            color: #7C1A51;
            font-weight: bold;
            border-radius: 30px;
        }

        /* no circle */
        .flickity-button {
            background: transparent;
            align-self: end;

        }

        /* big previous & next buttons */
        .flickity-prev-next-button {
            width: 100px;
            height: 100px;
            bottom: -200px;
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

        /*.flickity-enabled:focus .flickity-viewport {*/
        /*    outline: thin dotted;*/
        /*    outline: 5px auto -webkit-focus-ring-color;*/
        /*}*/

    </style>


    <div >

        <section >

            <div>
                <form action="" method="GET">
                    <input type="text" name="search" placeholder="Zoek vacatures">
                    <button type="button">filters</button>

                </form>
                <p class="filter-description">active filters:</p>

            </div>

            <!-- Flickity HTML init -->
            <div class="carousel "
                 data-flickity='{ "wrapAround": true}'>
                <div class="carousel-cell
                bg-dark-moss shadow-lg shadow-dark-moss rounded-[30px] p-4 w-[80vw] mx-auto overflow-hidden mb-8"
                >

                    <div class="logo-en-titel">
                        <img
                            src="https://cdn.freebiesupply.com/logos/large/2x/mcdonalds-15-logo-png-transparent.png"
                            alt="logo">
                        <div>
                            <h2>MCdonalds</h2>
                            <h3>Rotterdam Blaak</h3>
                        </div>

                    </div>
                    <div class="vacature-img-container">
                        <img
                            src="https://mei-arch.eu/en/wp-content/uploads/sites/2/2022/01/OvD-47-1020x1320.jpg?image-crop-positioner-ts=1642509477"
                            alt="mcdonalds work">
                    </div>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad, assumenda commodi consectetur
                        cupiditate
                    </p>
                    <a href="">Meer informatie</a>

                </div>
                @foreach ($applications as $application)
                <div class="carousel-cell
                bg-dark-moss shadow-lg shadow-dark-moss rounded-[30px] p-4 w-[80vw] mx-auto overflow-hidden mb-8"
                >1  {{ $application->description }}
                @endforeach
                </div>
            </div>

        </section>

    </div>
    @if ($applications->isEmpty())
        <p>Er zijn momenteel geen vacatures beschikbaar.</p>
    @else
        <script>
            // Log the data to console
            console.log(@json($applications));
        </script>

        <table class="table table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>Bedrijf</th>
                <th>Functie</th>
                <th>Omschrijving</th>
                <th>Datum Gepubliceerd</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($applications as $application)
                <tr>
                    <td>{{ $application->id }}</td>
                    <td>{{ $application->company_name }}</td>
                    <td>{{ $application->job_title }}</td>
                    <td>{{ $application->description }}</td>
{{--                    <td>{{ $application->created_at->format('d-m-Y') }}</td>--}}
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif


@endsection
