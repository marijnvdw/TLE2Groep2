@extends('layouts.app')

@section('content')
    <div class="text-center space-y-4">
        <div id="filterModal" style="display: flex; position: fixed; top: 0; left: 0; width: 100%; height: 100%; justify-content: center; align-items: center; background-color: rgba(0, 0, 0, 0.4);">
            <div class="modalContent" style="background-color: white; padding: 4vw; border-radius: 8px; width: 70%; max-width: 800px; text-align: center;">
                <span class="close-btn" style="font-size: 7vw; color: #aaa; cursor: pointer; display: flex; justify-content: end; padding: 0 2vw">&times;</span>
                <form action="???" method="get" class="filters">
                    <p class="filter">Filters:</p>
                    <p>Selecteer uw voorkeuren</p>
                    <label for="location" class="filterLabel">Postcode</label>

                    <input for="location" class="filterLabel">
                    <select name="location" id="location" class="filterSelect">
                        <option value=""></option>
                        @foreach($cities as $city)
                            <option value="{{ $city->id }}" {{ request('city_id') == $city->id ? 'selected' : '' }}>{{ $city->name }}</option>
                        @endforeach
                    </select>

                    <input for="genre_id" class="filterLabel">Kies een genre:</input>
                    <select name="genre_id" id="genre_id" class="filterSelect">
                        <option value=""></option>
                        @foreach($genres as $genre)
                            <option value="{{ $genre->id }}" {{ request('genre_id') == $genre->id ? 'selected' : '' }}>{{ $genre->name }}</option>
                        @endforeach
                    </select>

                    <label for="query" class="filterLabel">Text:</label>
                    <input type="text" name="query" placeholder="..." class="filterText" value="{{ request('query') }}"></input>
                    <button type="submit" class="filterRechts">Zoek</button>
                </form>
            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                setTimeout(function() {
                    var modal = document.getElementById('filterModal');
                    modal.style.display = "flex";

                    var closeBtn = document.getElementsByClassName('close-btn')[0];
                    closeBtn.onclick = function() {
                        modal.style.display = "none";
                    }

                    window.onclick = function(event) {
                        if (event.target === modal) {
                            modal.style.display = "none";
                        }
                    }
                }, 1000);
            });
        </script>
    </div>
@endsection
