@extends('layouts.app')

@section('content')
    <div class="bg-dark-moss shadow-lg shadow-dark-moss rounded-[30px] p-6 w-[80vw] mx-auto overflow-hidden mb-8">
        <div class="container">
            <h1 class="text-xl sm:text-2xl font-bold text-cream content-center py-6 break-words">Vacature Bewerken</h1>

            <form action="{{ route('application.update', $application->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <input type="hidden" name="id" value="{{ $application->id }}">

                <div style="margin-bottom: 2vw;">
                    <label class="text-cream" for="title">Titel</label>
                    <input type="text" name="title" id="title" value="{{ $application->title }}" required
                           style="color: #344343; width: 100%; padding: 2vw; border: 1px solid #6d6d6d; border-radius: 15px;">
                </div>

                <div style="margin-bottom: 2vw;">
                    <label class="text-cream" for="description">Beschrijving</label>
                    <textarea name="description" id="description" rows="4" required
                              style="color: #344343; width: 100%; padding: 2vw; border: 1px solid #6d6d6d; border-radius: 15px;">{{ $application->description }}</textarea>
                </div>

                <div style="margin-bottom: 2vw;">
                    <label for="sector" style="display: flex; font-size: 1rem; margin-bottom: 0.5rem;" class="text-cream">Sector</label>
                    <select name="sector" id="sector" style="color: #344343; width: 100%; padding: 2vw; border: 1px solid #6d6d6d; border-radius: 15px; box-sizing: border-box;">
                        <option value="" {{ $application->sector == '' ? 'selected' : '' }}>Alle sectoren</option>
                        <option value="technologie" {{ $application->sector == 'technologie' ? 'selected' : '' }}>Technologie</option>
                        <option value="gezondheidszorg {{ $application->sector == 'gezondheidszorg' ? 'selected' : '' }}">Gezondheidszorg</option>
                        <option value="onderwijs" {{ $application->sector == 'onderwijs' ? 'selected' : '' }}>Onderwijs</option>
                        <option value="financiën" {{ $application->sector == 'financiën' ? 'selected' : '' }}>Financiën </option>
                        <option value="bouw" {{ $application->sector == 'bouw' ? 'selected' : '' }}>Bouw</option>
                        <option value="retail" {{ $application->sector == 'retail' ? 'selected' : '' }}>Retail </option>
                        <option value="logistiek" {{ $application->sector == 'logistiek' ? 'selected' : '' }}>Logistiek </option>
                        <option value="horeca" {{ $application->sector == 'horeca' ? 'selected' : '' }}>Horeca </option>
                        <option value="creatief" {{ $application->sector == 'creatief' ? 'selected' : '' }}>Creatief</option>
                        <option value="landbouw" {{ $application->sector == 'landbouw' ? 'selected' : '' }}>Landbouw</option>
                    </select>
                    @error('sector')
                    <span class="text-error text-sm">{{ 'Vul hier een sector in' }}</span>
                    @enderror
                </div>



                <div style="margin-bottom: 2vw;">
                    <label class="text-cream" for="employment">Dienstverband</label>
{{--                    <input type="text" name="employment" id="employment" value="{{ $application->employment }}" required--}}
{{--                           style="color: #344343; width: 100%; padding: 2vw; border: 1px solid #6d6d6d; border-radius: 15px;">--}}
                    <select name="employment" id="employment" class="form-control" required>
                        <option value="1" {{ $application->employment ? 'selected' : '' }}>Fulltime</option>
                        <option value="0" {{ !$application->employment ? 'selected' : '' }}>Parttime</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label text-cream" for="drivers_licence">Rijbewijs Vereist</label>
                    <select name="drivers_licence" id="drivers_licence" class="form-control" required>
                        <option value="1" {{ $application->drivers_licence ? 'selected' : '' }}>Ja</option>
                        <option value="0" {{ !$application->drivers_licence ? 'selected' : '' }}>Nee</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label text-cream" for="adult">Volwassen (18+)</label>
                    <select name="adult" id="adult" class="form-control" required>
                        <option value="1" {{ $application->adult ? 'selected' : '' }}>Ja</option>
                        <option value="0" {{ !$application->adult ? 'selected' : '' }}>Nee</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label text-cream" for="image">Afbeelding</label>
                    <input type="file" name="image" id="image" class="form-control" onchange="previewImage(event)">
                    <div id="preview-container" style="margin-top: 15px;">
                        <img id="preview" src="{{ asset($application->image) }}" style="max-width: 300px;" alt="current image">
                    </div>
                </div>

                <script>
                    function previewImage(event) {
                        const input = event.target;
                        const preview = document.getElementById('preview');

                        if (input.files && input.files[0]) {
                            const reader = new FileReader();
                            reader.onload = function (e) {
                                preview.src = e.target.result;
                            };
                            reader.readAsDataURL(input.files[0]);
                        }
                    }
                </script>

                <div style="margin-bottom: 2vw;">
                    <label class="text-cream" for="details">Details</label>
                    <textarea name="details" id="details" rows="6" required
                              style="color: #344343; width: 100%; padding: 2vw; border: 1px solid #6d6d6d; border-radius: 15px;">{{ $application->details }}</textarea>
                </div>

                <x-button type="submit" class="btn btn-primary" style="width: 100%; border-radius: 15px;">Vacature Opslaan</x-button>
            </form>
        </div>
    </div>
@endsection
