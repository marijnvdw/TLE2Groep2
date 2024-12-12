@extends('layouts.app')

@section('content')
    <section class="flex justify-center px-4">
        <div
            class="bg-dark-moss shadow-lg shadow-dark-moss rounded-[30px] p-8 w-[80vw] max-w-[600px] mx-auto overflow-hidden mb-8">
            <h1 class="text-rose-brown text-3xl sm:text-4xl font-bold mb-6 text-center">vraag sollicitanten aan</h1>
            <form action="">
                <p class="text-white text-base sm:text-lg text-center mb-6">{{ $applicantsCount }}</p>
                <div class="mt-6 text-center">
                    <a
                        href="{{ url('/') }}"
                        class="bg-white text-dark-moss font-semibold rounded-[30px] px-6 py-3 inline-block hover:bg-dark-violet hover:text-white transition-colors duration-300 ease-in-out"
                    >
                        vraag aan
                    </a>
                </div>
            </form>
        </div>
    </section>
@endsection
