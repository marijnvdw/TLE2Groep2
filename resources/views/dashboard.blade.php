@extends('layouts.app')

@section('content')


    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                    <a>Vacature aanmaken.</a>
                    {{ Auth::user()->name }}

                </div>
            </div>
        </div>
    </div>
    <div class="carousel-cell bg-dark-moss shadow-lg shadow-dark-moss rounded-[30px] p-10 w-[80vw] mx-auto overflow-hidden mb-8 text-white">
        <h1>Chef</h1>
        <p>beschrijving</p>
        <a href="">Vraag sollicitant aan</a>
        <a href="">Pas aan</a>
        <a href="">Verwijder</a>
    </div>




@endsection
