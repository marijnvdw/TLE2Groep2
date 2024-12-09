@extends('layouts.app')

@section('content')

    <div class="bg-dark-moss shadow-lg shadow-dark-moss rounded-[30px] p-6 w-[80vw] mx-auto overflow-hidden mb-8">

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-dark-moss overflow-hidden shadow-dark-moss shadow-sm sm:rounded-lg">
                <div class="p-6 text-cream">
                        {{ __("Company overview") }}

                    <table class="table-auto w-full">
                        <thead>
                        <tr>
                            <th class="px-4 py-2">ID</th>
                            <th class="px-4 py-2">Name</th>
                            <th class="px-4 py-2">Role</th>
                            <th class="px-4 py-2">Change role</th>
                        </tr>
                        </thead>
                        @foreach ($companies as $company)
                            <tbody>
                            <tr>
                                <td class="border px-4 py-2">{{ $company->name }}</td>
                                <td class="border px-4 py-2">{{ $company->city }}</td>
                                <td class="border px-4 py-2">{{ $company->company_code }}</td>
                            </tr>
                            </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
