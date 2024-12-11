@extends('layouts.app')

@section('content')

    <div class="bg-dark-moss shadow-lg shadow-dark-moss rounded-[30px] p-6 w-[80vw] mx-auto overflow-hidden mb-8">
        <form action="{{ route('admin-overzicht.store') }}" method="post">
            @csrf
            <div>
                <x-input-label class="text-cream" for="name">Bedrijfs naam</x-input-label>
                <x-text-input type="text" id="name" name="name" class="{{ $errors->has('name') ? 'border-red-500' : '' }}"/>
                @error('name')
                <span class="text-error text-sm">{{ 'Vul hier een bedrijfsnaam in' }}</span>
                @enderror
            </div>

            <div>
                <x-input-label class="text-cream" for="phone_number">Telefoonnummer</x-input-label>
                <x-text-input type="text" id="phone_number" name="phone_number" class="{{ $errors->has('phone_number') ? 'border-red-500' : '' }}"/>
                @error('phone_number')
                <span class="text-error text-sm">{{ 'Vul hier een telefoonnummer in' }}</span>
                @enderror
            </div>

            <div>
                <x-input-label class="text-cream" for="address" >Straat en huisnummer</x-input-label>
                <x-text-input id="address" name="address" class="{{ $errors->has('address') ? 'border-red-500' : '' }}"/>
                @error('address')
                <span class="text-error text-sm">{{ 'Vul hier het de straat en het huisnummer in' }}</span>
                @enderror
            </div>

            <div>
                <x-input-label class="text-cream" for="city">Stad</x-input-label>
                <x-text-input id="city" name="city" class="{{ $errors->has('city') ? 'border-red-500' : '' }}"/>
                @error('city')
                <span class="text-error text-sm">{{ 'Voer hier de stad in' }}</span>
                @enderror
            </div>

            <div>
                <x-input-label class="text-cream" for="company_code">Bedenk een unieke bedrijfscode</x-input-label>
                <x-text-input id="company_code" name="company_code" class="{{ $errors->has('company_code') ? 'border-red-500' : '' }}"/>
                @error('company_code')
                <span class="text-error text-sm">{{ 'Voer hier een bedrijfscode in zodat medewerkers van een bedrijf een account kunnen openen.' }}</span>
                @enderror
            </div>

            <div class="py-5">
                <x-button type="submit">Voeg het bedrijf toe aan de database</x-button>
            </div>
        </form>
    </div>

@endsection
