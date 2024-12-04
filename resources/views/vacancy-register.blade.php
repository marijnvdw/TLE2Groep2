@extends('layouts.app')
@props(['application'])

@section('content')
    <section class="flex justify-center">
        <div class="bg-dark-moss shadow-lg shadow-dark-moss rounded-[30px] p-6 w-[80vw] mx-auto overflow-hidden mb-8">
            <form action="{{ route('send-email') }}" method="GET">
                <label for="email"></label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required>
                <button type="submit" class="text-white">Verzend E-mail</button>
            </form>
        </div>
    </section>
@endsection

