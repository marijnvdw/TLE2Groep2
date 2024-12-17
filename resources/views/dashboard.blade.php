@extends('layouts.app')

@section('content')

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>


    <div class="bg-cream rounded-[30px] shadow-lg shadow-medium-moss p-6 w-[80vw] mx-auto overflow-hidden max-w-96">
        <div class="text-center">
            <h2 class="text-xl  font-bold text-dark-moss pb-2 break-words">{{ __("Je bent ingelogd!") }}</h2>
        </div>

        <div class="flex items-start pb-2">
            <p class="">
                Naam: {{ Auth::user()->name }}<br>
                Bedrijfsnaam: {{ Auth::user()->company->name }}
            </p>
        </div>

    </div>

    <div class="self-center px-10 py-4 flex justify-end">
        <a href="{{ route('application.create') }}"
           class="shadow-lg font-bold  bg-white text-dark-moss rounded-[30px] px-4 py-2 shadow-md hover:bg-dark-violet hover:text-white text-center "
        >
            Vacature aanmaken
        </a>
    </div>



    <div class="flex flex-wrap justify-center gap-5 p-10">
        @foreach (Auth::user()->company->applications as $application)
            <div
                class="bg-dark-moss shadow-lg shadow-dark-moss; rounded-[30px] flex-auto mx-auto p-10 max-w-xl overflow-hidden text-white flex flex-col gap-5 justify-between"
            >
                <h1 class="text-xl text-center  ">{{ $application->title }}</h1>
                <div class="flex justify-between content-between gap-4">
                    <p class="flex-1">{{ $application->description }}</p>
                    <div class="flex-1 ">
                        <img class="object-fill"
                             src="{{ $application->image }}"
                             alt="job image">
                        <p class=" mt-2 text-[#7C1A51] bg-white text-center rounded py-1 "> Aantal
                            aanmeldingen: {{ $application->applicants()->count() }}</p>

                    </div>
                </div>
                <div class="flex flex-col text-black gap-2">
                    <a class="shadow-lg font-bold  bg-white text-dark-moss rounded-[30px] px-4 py-2 shadow-md hover:bg-dark-violet hover:text-white text-center "
                       href="">Vraag sollicitant aan</a>
                    <a class="shadow-lg font-bold  bg-white text-dark-moss rounded-[30px] px-4 py-2 shadow-md hover:bg-dark-violet hover:text-white text-center "
                       href="{{route('application.edit', $application)}}">Pas aan</a>
                    <form action="{{ route('application.destroy', $application) }}" method="POST"
                          onsubmit="return confirm('Weet u zeker dat u deze vacature wilt verwijderen?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                                class="w-[100%] shadow-lg font-bold bg-white text-dark-moss rounded-[30px] px-4 py-2 shadow-md hover:bg-dark-violet hover:text-white text-center">
                            Verwijder
                        </button>
                    </form>
                </div>
            </div>

        @endforeach
    </div>

@endsection
