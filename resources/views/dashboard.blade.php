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
                    <a>Vacature aanmaken.</a>
                    {{ Auth::user()->name }}
                </div>
            </div>
        </div>
    </div>


@endsection
