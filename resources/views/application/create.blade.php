@extends('layouts.app')

@section('content')
    <div class="bg-dark-moss shadow-lg shadow-dark-moss rounded-[30px] p-6 w-[80vw] mx-auto overflow-hidden mb-8">
        <div class="container">
            <button
                onclick="history.back()"
                class="bg-white text-dark-moss rounded-[30px] px-4 py-2 shadow-md hover:bg-red-500 hover:text-white transition-all duration-300 ease-in-out min-w-[120px] text-center"
            >
                Terug X
            </button>

            <h1 class="text-xl sm:text-2xl font-bold text-cream content-center py-6 break-words">Nieuwe Vacature
                Toevoegen</h1>

            <form action="{{ route('applications.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div style="margin-bottom: 2vw;">
                    <label class="text-cream" for="title"
                           style="display: flex; font-size: 1rem; margin-bottom: 0.5rem;">Titel</label>
                    <input type="text" name="title" id="title"
                           style="color: #344343; width: 100%; padding: 2vw; border: 1px solid #6d6d6d; border-radius: 15px;"
                           class="{{ $errors->has('title') ? 'border-red-500' : '' }}">
                    @error('title')
                    <span class="text-error text-sm">{{ 'Vul hier een titel in' }}</span>
                    @enderror
                </div>

                <div style="margin-bottom: 2vw;">
                    <label for="description"
                           style="display: flex; font-size: 1rem; margin-bottom: 0.5rem;" class="text-cream">Beschrijving
                        (korte beschrijving voor vacature overzicht)</label>
                    <textarea type="text" name="description" id="description" rows="4"
                              style="color: #344343; width: 100%; padding: 2vw; border: 1px solid #6d6d6d; border-radius: 15px;"
                              class="{{ $errors->has('description') ? 'border-red-500' : '' }}"></textarea>
                    @error('description')
                    <span class="text-error text-sm">{{ 'Vul hier een beschrijving in' }}</span>
                    @enderror
                </div>

                <div style="margin-bottom: 2vw;">
                    <label for="employment"
                           style="display: flex; font-size: 1rem; margin-bottom: 0.5rem;" class="text-cream">Dienstverband</label>
                    <input type="text" name="employment" id="employment"
                           style="color: #344343; width: 100%; padding: 2vw; border: 1px solid #6d6d6d; border-radius: 15px;"
                           class="{{ $errors->has('employment') ? 'border-red-500' : '' }}">
                    @error('employment')
                    <span class="text-error text-sm">{{ 'Vul hier een dienstverband in' }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="drivers_licence" class="form-label text-cream">Rijbewijs Vereist</label>
                    <select name="drivers_licence" id="drivers_licence" class="form-control" required>
                        <option value="1">Ja</option>
                        <option value="0">Nee</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="adult" class="form-label text-cream">Volwassen (18+)</label>
                    <select name="adult" id="adult" class="form-control" required>
                        <option value="1">Ja</option>
                        <option value="0">Nee</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label text-cream">Afbeelding</label>
                    <input type="file" name="image" id="image"
                           class="form-control {{ $errors->has('image') ? 'border-red-500' : '' }}"
                           onchange="previewImage(event)">
                    @error('image')
                    <span class="text-error text-sm">{{ 'Voeg hier een foto toe' }}</span>
                    @enderror
                </div>

                <div id="preview-container" style="margin-top: 15px;">
                    <img src="" id="preview" style="max-width: 300px; display: none;" alt="preview image">
                </div>

                <script>
                    function previewImage(event) {
                        const input = event.target;
                        const preview = document.getElementById('preview');
                        const previewContainer = document.getElementById('preview-container');

                        if (input.files && input.files[0]) {
                            const reader = new FileReader();

                            reader.onload = function (e) {
                                preview.src = e.target.result;
                                preview.style.display = 'block';
                            };

                            reader.readAsDataURL(input.files[0]);
                        }
                    }
                </script>

                <div style="margin-bottom: 2vw;">
                    <label for="details" style="display: flex; font-size: 1rem; margin-bottom: 0.5rem;"
                           class="text-cream">Beschrijving (lange beschrijving voor vacature)</label>
                    <textarea type="text" name="details" id="details" rows="6"
                              style="color: #344343; width: 100%; padding: 2vw; border: 1px solid #6d6d6d; border-radius: 15px;"
                              class="{{ $errors->has('details') ? 'border-red-500' : '' }}"></textarea>
                    @error('details')
                    <span class="text-error text-sm">{{ 'Vul hier de details in' }}</span>
                    @enderror
                </div>

                <x-button type="submit" class="btn btn-primary" style="width: 100%; border-radius: 15px;">Vacature
                    opslaan
                </x-button>

            </form>
        </div>
    </div>
@endsection
