@extends('layouts.app')

@section('content')

    <div class="bg-dark-moss shadow-lg shadow-dark-moss rounded-[30px] p-6 w-[80vw] mx-auto overflow-hidden mb-8">
        <form action="{{ route('admin-overzicht.update', $company->id) }}" method="post">
            @csrf
            @method('PATCH')

            <div>
                <x-input-label class="text-cream" for="name">Bedrijfsnaam</x-input-label>
                <x-text-input type="text" id="name" name="name" value="{{ old('name', $company->name) }}" class="{{ $errors->has('name') ? 'border-red-500' : '' }}" />
                @error('name')
                <span class="text-red-600 text-sm">{{ 'Vul hier een bedrijfsnaam in' }}</span>
                @enderror
            </div>

            <div>
                <x-input-label class="text-cream" for="phone_number">Telefoonnummer</x-input-label>
                <x-text-input type="text" id="phone_number" name="phone_number" value="{{ old('phone_number', $company->phone_number) }}" class="{{ $errors->has('phone_number') ? 'border-red-500' : '' }}" />
                @error('phone_number')
                <span class="text-red-600 text-sm">{{ 'Vul hier een telefoonnummer in' }}</span>
                @enderror
            </div>

            <div>
                <x-input-label class="text-cream" for="address">Straat en huisnummer</x-input-label>
                <x-text-input id="address" name="address" value="{{ old('address', $company->address) }}" class="{{ $errors->has('address') ? 'border-red-500' : '' }}" />
                @error('address')
                <span class="text-red-600 text-sm">{{ 'Vul hier de straat en het huisnummer in' }}</span>
                @enderror
            </div>

            <div>
                <x-input-label class="text-cream" for="city">Stad</x-input-label>
                <x-text-input id="city" name="city" value="{{ old('city', $company->city) }}" class="{{ $errors->has('city') ? 'border-red-500' : '' }}" />
                @error('city')
                <span class="text-red-600 text-sm">{{ 'Voer hier de stad in' }}</span>
                @enderror
            </div>

            <div>
                <x-input-label class="text-cream" for="company_code">Bedrijfscode</x-input-label>
                <x-text-input id="company_code" name="company_code" value="{{ old('company_code', $company->company_code) }}" class="{{ $errors->has('company_code') ? 'border-red-500' : '' }}" />
                @error('company_code')
                <span class="text-red-600 text-sm">{{ 'Voer hier een bedrijfscode in zodat medewerkers van een bedrijf een account kunnen openen.' }}</span>
                @enderror
            </div>

            <div class="py-5">
                <x-button type="submit">Werk bedrijf bij</x-button>
            </div>
        </form>
    </div>

@endsection
