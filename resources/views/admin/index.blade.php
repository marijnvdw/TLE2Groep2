@extends('layouts.app')

@section('content')

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-dark-moss leading-tight">
            {{ __('Admin dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-dark-moss overflow-hidden shadow-dark-moss shadow-sm sm:rounded-lg">
                <div class="p-6 text-cream">
                    {{ __("Company overview") }}
                </div>
            </div>
        </div>
    </div>

@endsection
