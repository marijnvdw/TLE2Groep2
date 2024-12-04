@extends('layouts.app')

@section('content')

    <style>
        main {
            padding: 0;
            margin: 0;

        }

        .container {
            border: black solid 5px;
        }

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
            justify-content: space-between;
            padding: 5px;
            gap: 5px;
        }

        form button {
            flex: 1;
            background-color: white;

        }

        .carousel {


        }

        .carousel-cell {
            width: 66%;
            height: 50vh;
            margin-right: 10px;
            border-radius: 5px;
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
            overflow: hidden; /* Prevents overflowing content */
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
            /*background-color: red;*/

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


    <div>

        <article>
            <h1 class="text-xl sm:text-2xl font-bold text-black  ">
                Vind een vacature
            </h1>

            <form action="" method="GET">
                <input type="text" name="search" placeholder="Search Products">
                <button type="button">filters</button>

            </form>


            <!-- Flickity HTML init -->
            <div class="carousel"
                 data-flickity='{ "wrapAround": true
{{--                 ,"arrowShape": "--}}
{{--                    M3.05 3.05 h17.9 a0.95 0.95 0 0 1 0.95 0.95 v17.9 a0.95 0.95 0 0 1 -0.95 0.95 h-17.9 a0.95 0.95 0 0 1 -0.95 -0.95 v-17.9 a0.95 0.95 0 0 1 0.95 -0.95 z--}}
{{--    M2.05 4.05 h19.9 a0.95 0.95 0 0 1 0.95 0.95 v15.9 a0.95 0.95 0 0 1 -0.95 0.95 h-19.9 a0.95 0.95 0 0 1 -0.95 -0.95 v-15.9 a0.95 0.95 0 0 1 0.95 -0.95 z--}}
{{--    M4.05 2.05 h15.9 a0.95 0.95 0 0 1 0.95 0.95 v19.9 a0.95 0.95 0 0 1 -0.95 0.95 h-15.9 a0.95 0.95 0 0 1 -0.95 -0.95 v-19.9 a0.95 0.95 0 0 1 0.95 -0.95 z--}}
{{--    M12 2.05 a9.95 9.95 0 1 1 0 19.9 a9.95 9.95 0 1 1 0 -19.9 z--}}
{{--    M12 6.05 a5.95 5.95 0 1 1 0 11.9 a5.95 5.95 0 1 1 0 -11.9 z--}}
{{--    M12 8.05 a3.95 3.95 0 1 1 0 7.9 a3.95 3.95 0 1 1 0 -7.9 z--}}
{{--    M0 8 h8 v4 h-8 z--}}
{{--    M0 12 h8 v4 h-8 z--}}
{{--    M16 8 h8 v4 h-8 z--}}
{{--    M16 12 h8 v4 h-8 z--}}
{{--    M8 0 v8 h4 v-8 z--}}
{{--    M12 0 v8 h4 v-8 z--}}
{{--    M8 16 v8 h4 v-8 z--}}
{{--    M12 16 v8 h4 v-8 z--}}
{{--    M8 8 h4 v4 h-4 z--}}
{{--    M12 8 h4 v4 h-4 z--}}
{{--    M8 12 h4 v4 h-4 z--}}
{{--    M12 12 h4 v4 h-4 z--}}
{{--    M0 16 h8 v8 h-8 z--}}
{{--    M16 16 h8 v8 h-8 z--}}
{{--    M16 0 h8 v8 h-8 z--}}
{{--    M0 0 h8 v8 h-8 z--}}
{{--    M5 12 h14--}}
{{--    M12 5 l7 7 l-7 7--}}

{{--                 "--}}
                  }'>
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
                        beschrijving pipikaka
                        mcdonalds yummy yippee ich habe cola und fortnite skibidi
                    </p>
                    <a href="">Meer informatie</a>

                </div>
                <div class="carousel-cell
                bg-dark-moss shadow-lg shadow-dark-moss rounded-[30px] p-4 w-[80vw] mx-auto overflow-hidden mb-8"
                >1
                </div>
                <div class="carousel-cell
                bg-dark-moss shadow-lg shadow-dark-moss rounded-[30px] p-4 w-[80vw] mx-auto overflow-hidden mb-8"
                >2
                </div>
                <div class="carousel-cell
                bg-dark-moss shadow-lg shadow-dark-moss rounded-[30px] p-4 w-[80vw] mx-auto overflow-hidden mb-8"
                >3
                </div>
                <div class="carousel-cell
                bg-dark-moss shadow-lg shadow-dark-moss rounded-[30px] p-4 w-[80vw] mx-auto overflow-hidden mb-8"
                >4
                </div>

            </div>

        </article>

    </div>

@endsection
