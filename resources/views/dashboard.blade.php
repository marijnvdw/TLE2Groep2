@extends('layouts.app')

@section('content')

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-dark-moss overflow-hidden shadow-dark-moss shadow-sm sm:rounded-lg">
                <div class="p-6 text-cream">
                    {{ __("You're logged in!") }}
                    <a href="{{ route('application.create') }}">Vacature aanmaken.</a><br>
                    Username: {{ Auth::user()->name }}<br>
                    Company name: {{ Auth::user()->company->name }}
                </div>
            </div>
        </div>

    </div>

    {{ Auth::user()->application }}


    <div
        class="carousel-cell bg-dark-moss shadow-lg shadow-dark-moss rounded-[30px] p-10 w-[80vw] mx-auto overflow-hidden mb-8 text-white flex flex-col gap-5"
    >
        <h1 class="text-center  "></h1>
        <div class="flex justify-between content-between">
            <p class="flex-1">beschrijving</p>
            <div class="flex-1">
                <img class="object-fill"
                     src="https://www.e-days.com/wp-content/uploads/2020/03/conducting-a-return-to-work-interview-scaled.jpg"
                     alt="work img">
            </div>
        </div>
        <div class="flex flex-col text-black gap-2">
            <a class="p-2 rounded-[30px] bg-white text-center" href="">Vraag sollicitant aan</a>
            <a class="p-2 rounded-[30px] bg-white text-center" href="">Pas aan</a>
            <a class="p-2 rounded-[30px] bg-white text-center" href="">Verwijder</a>
        </div>
    </div>

@endsection
