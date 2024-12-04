@extends('layouts.app')

@section('content')
    <section class="flex justify-center">
        <div class="bg-dark-moss shadow-lg shadow-dark-moss rounded-[30px] p-6 w-[80vw] mx-auto overflow-hidden mb-8">
            <div>
{{--                <img src="../../../public/img/mc-donalds-logo.png" alt="mc-donalds-logo" width="50" height="50">--}}
                <h1 class="text-white">{{$application->title}}</h1>
                <button class="bg-white p-2 rounded-lg">terug x</button>
            </div>
            <div>
                <p>{{$application->description}}</p>
                <p>{{$application->employment}}</p>
                <p>Rijbewijs nodig? {{$application->drivers_licence}}</p>
{{--                <p>18+? {{$application->18_plus}}</p>--}}
            </div>
            <a href="{{route('email.register', $application)}}" class="text-white">reageer</a>
        </div>
    </section>
@endsection
