@extends('layouts.app')

@section('content')

    @php
        use Illuminate\Support\Facades\DB;

        // Fetch all companies
        $companies = DB::table('companies')->get();
    @endphp

    <div class="px-5">
        <h1 class="text-xl font-bold text-center pb-5">Werkgevers</h1>
        <ul>
            @foreach ($companies as $company)
                <li>
                    <article

                        class="flex gap-5 flex-row bg-dark-moss shadow-lg shadow-dark-moss rounded-[30px] p-6 mx-auto overflow-hidden mb-8"
                    >
                        <div class="h-20 w-20 md:h-16 lg:h-20">
                            <img tabindex="0"
                                 class="object-fill"
                                 src="{{ $company->image }}"
                                 alt="{{ $company->name }}">
                        </div>
                        <div class="self-center text-white" tabindex="0">
                            <h2>{{ $company->name }}</h2>
                            <h2>{{ $company->city }}</h2>
                        </div>
                    </article>
                </li>
            @endforeach
        </ul>
    </div>

@endsection
