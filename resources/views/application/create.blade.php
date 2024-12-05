@extends('layouts.app')

@section('content')

    <div class="container">
        <h2>Nieuwe Vacature Toevoegen</h2>

        <!-- Add a form for creating a new application -->
        <form action="{{ route('applications.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Title Field -->
            <div class="mb-3">
                <label for="title" class="form-label">Titel</label>
                <input type="text" name="title" id="title" class="form-control" required>
            </div>

            <!-- Description Field -->
            <div class="mb-3">
                <label for="description" class="form-label">Omschrijving</label>
                <textarea name="description" id="description" class="form-control" rows="4" required></textarea>
            </div>

            <!-- Employment Field -->
            <div class="mb-3">
                <label for="employment" class="form-label">Dienstverband</label>
                <input type="text" name="employment" id="employment" class="form-control" required>
            </div>

            <!-- Driver's License Field -->
            <div class="mb-3">
                <label for="drivers_licence" class="form-label">Rijbewijs Vereist</label>
                <select name="drivers_licence" id="drivers_licence" class="form-control" required>
                    <option value="1">Ja</option>
                    <option value="0">Nee</option>
                </select>
            </div>

            <!-- Adult Field -->
            <div class="mb-3">
                <label for="adult" class="form-label">Volwassen (18+)</label>
                <select name="adult" id="adult" class="form-control" required>
                    <option value="1">Ja</option>
                    <option value="0">Nee</option>
                </select>
            </div>

            <!-- Image Field -->
            <div class="mb-3">
                <label for="image" class="form-label">Afbeelding</label>
                <input type="file" name="image" id="image" class="form-control">
            </div>

            <!-- Details Field -->
            <div class="mb-3">
                <label for="details" class="form-label">Details</label>
                <textarea name="details" id="details" class="form-control" rows="6"></textarea>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary">Vacature Opslaan</button>
        </form>
    </div>

@endsection
