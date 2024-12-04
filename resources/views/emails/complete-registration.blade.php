@extends('layouts.app')
@props(['application', 'userEmail'])

@section('content')
    <section class="flex justify-center">
        <h1>{{$application->title}} </h1>
        <h1>{{ $userEmail }}</h1>
    </section>

@endsection
