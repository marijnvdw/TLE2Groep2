@extends('layouts.app')

@section('content')

    <style>
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

        body {
            font-family: sans-serif;

        }

        .carousel {


        }

        .carousel-cell {
            width: 66%;
            height: 50vh;
            margin-right: 10px;
            background: red;
            border-radius: 5px;
            counter-increment: carousel-cell;
            display: flex;
            flex-direction: column;
            justify-content: stretch;
        }

        /* cell number */
        .carousel-cell:before {
            display: block;
            text-align: center;
            /*content: counter(carousel-cell);*/
            line-height: 200px;
            font-size: 80px;
            color: white;
        }

        .carousel-cell.is-selected {
            background: #ED2;
        }

        .logo-en-titel {

        }

        #vacature-img {
            align-self: center;
            height: 300px;
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
            fill: white;
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
            <h1>Vacature</h1>

            <!-- Flickity HTML init -->
            <div class="carousel"
                 data-flickity='{ "wrapAround": true }'>
                <div class="carousel-cell">
                    <div class="logo-en-titel">
                        <img
                            src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSRjLWhWpx9PfbzysffLbMA_DK_8jawJAVHbw&s"
                            alt="logo">
                        <h2>MCdonalds</h2>
                    </div>

                    <img id="vacature-img"
                         src="https://mei-arch.eu/en/wp-content/uploads/sites/2/2022/01/OvD-47-1020x1320.jpg?image-crop-positioner-ts=1642509477"
                         alt="mcdonalds work">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequuntur dolorum facere magnam
                        officia perspiciatis provident quo. Consectetur distinctio dolor dolorem earum fugit impedit
                        quaerat reprehenderit totam ullam unde. Possimus, vel.</p>

                </div>
                <div class="carousel-cell"></div>
                <div class="carousel-cell"></div>
                <div class="carousel-cell"></div>
                <div class="carousel-cell"></div>
            </div>

        </article>

    </div>

@endsection
