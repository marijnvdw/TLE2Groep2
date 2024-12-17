@extends('layouts.app')

@section('content')

    <div class="bg-dark-moss shadow-lg shadow-dark-moss rounded-[30px] p-6 w-[80vw] mx-auto overflow-hidden mb-8">
        @auth()
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <a href="{{ route('admin-overzicht.create') }}">
                    <x-button> voeg een bedrijf toe</x-button>
                </a>
            </div>
        @endauth
    </div>

    <div class="bg-dark-moss shadow-lg shadow-dark-moss rounded-[30px] p-6 w-[80vw] mx-auto overflow-hidden mb-8">

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-dark-moss overflow-hidden shadow-dark-moss shadow-sm sm:rounded-lg">
                    <div class="p-6 text-cream">
                        {{ __("Bedrijven overzicht") }}

                        <!-- Container voor scrollbare tabel -->
                        <div class="overflow-x-auto">
                            <table class="table-auto w-full min-w-[600px]">
                                <thead>
                                <tr>
                                    <th class="px-4 py-2">Bedrijfsnaam</th>
                                    <th class="px-4 py-2">Stad</th>
                                    <th class="px-4 py-2">Bedrijfscode</th>
                                    <th class="px-4 py-2">Edit </th>
                                    <th class="px-4 py-2">Verwijder bedrijf </th>
                                </tr>
                                </thead>
                                @foreach ($companies as $company)
                                    <tbody>
                                    <tr>
                                        <td class="border px-4 py-2">{{ $company->name }}</td>
                                        <td class="border px-4 py-2">{{ $company->city }}</td>
                                        <td class="border px-4 py-2">{{ $company->company_code }}</td>
                                        <td class="border px-4 py-2 text-center">
                                            <a href="{{ route('admin-overzicht.edit', $company->id) }}"
                                               class="bg-cream hover:bg-gray text-dark-moss font-bold py-2 px-4 rounded">
                                                Bewerken
                                            </a>
                                        </td>
                                        <td class="border px-4 py-2 text-center">
                                            <form action="{{ route('admin-overzicht.destroy', $company->id) }}" method="POST"
                                                  onsubmit="return confirm('Weet u zeker dat u dit bedrijf wilt verwijderen?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="bg-cream hover:bg-gray text-red-800 font-bold py-2 px-4 rounded">
                                                    Verwijder
                                                </button>
                                            </form>

                                        </td>
                                    </tr>
                                    </tbody>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection
