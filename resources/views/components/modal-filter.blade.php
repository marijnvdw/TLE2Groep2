<div class="text-center space-y-4">
    <div id="filterModal" style="position: fixed; display: none; justify-content: center; align-items: center; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.4); z-index: 9999;">
        <div class="modalContent" style="background-color: #2E342A; padding: 1vw 4vw 4vw 4vw; border-radius: 20px; width: 80vw; max-width: 800px; height: auto; min-height: 60vh; max-height: 90vh; text-align: center; overflow-y: auto; display: flex; flex-direction: column; justify-content: space-between; box-sizing: border-box;">
            <span class="close-btn" style="font-size: 3.5rem; color: #ffffff; cursor: pointer; display: flex; justify-content: right; padding: 0 2vw;" tabindex="0" role="button">&times;</span>
            <form action="{{ route('application.index') }}" method="GET" class="filters" style="color: #DA9F93; padding: 1vw 1vw 3vw 1vw">
                @foreach(request()->except(['page']) as $key => $value)
                    <input type="hidden" name="{{ $key }}" value="{{ $value }}">
                @endforeach
                <div style="margin-bottom: 4vw;">
                    <p class="filter" style="display: flex; justify-content: center; font-size: 2rem; margin-bottom: 0.5rem">Filters</p>
                    <p style="display: flex; justify-content: center; font-size: 1.2rem;">Selecteer uw voorkeuren</p>
                </div>

                <div class="deskMobileSwitch">
                    <div style="margin-bottom: 4vw;" class="locationSectorEmployment">
                        <div>
                            <div style="margin-bottom: 2vw;">
                                <label for="location" style="display: flex; font-size: 1rem; margin-bottom: 0.5rem;">Locatie</label>
                                <input type="text" name="location" id="location" placeholder="Locatie laden..." style="color: #344343; width: 100%; padding: 2vw; border: 1px solid #6d6d6d; border-radius: 15px;" value="{{ request('location') ? request('location') : '' }}">
                            </div>

                            <div style="margin-bottom: 2vw;">
                                <label for="allCities" style="display: flex; align-items: center; font-size: 1rem;">
                                    <input type="hidden" name="allCities" value="0">
                                    <input type="checkbox" name="allCities" id="allCities" style="color: #344343; width: 5vw; height: 5vw; margin-right: 2vw; border: 1px solid #6d6d6d; border-radius: 15px;"{{ request('allCities') ? 'checked' : '' }}>
                                    <span>Alle locaties laten zien.</span>
                                </label>
                            </div>
                        </div>

                        <div>
                            <div style="margin-bottom: 2vw;">
                                <label for="sector" style="display: flex; font-size: 1rem; margin-bottom: 0.5rem;">Sector</label>
                                <select name="sector" id="sector" style="color: #344343; width: 100%; padding: 2vw; border: 1px solid #6d6d6d; border-radius: 15px; box-sizing: border-box;">
                                    <option value="" {{ request('sector') == '' ? 'selected' : '' }}>Alle sectoren</option>
                                    <option value="technologie" {{ request('sector') == 'technologie' ? 'selected' : '' }}>Technologie</option>
                                    <option value="gezondheidzorg {{ request('sector') == 'gezondheidzorg' ? 'selected' : '' }}">Gezondheidzorg</option>
                                    <option value="onderwijs" {{ request('sector') == 'onderwijs' ? 'selected' : '' }}>Onderwijs</option>
                                    <option value="financiën" {{ request('sector') == 'financiën' ? 'selected' : '' }}>Financiën </option>
                                    <option value="bouw" {{ request('sector') == 'bouw' ? 'selected' : '' }}>Bouw</option>
                                    <option value="retail" {{ request('sector') == 'retail' ? 'selected' : '' }}>Retail </option>
                                    <option value="logistiek" {{ request('sector') == 'logistiek' ? 'selected' : '' }}>Logistiek </option>
                                    <option value="horeca" {{ request('sector') == 'horeca' ? 'selected' : '' }}>Horeca </option>
                                    <option value="creatief" {{ request('sector') == 'creatief' ? 'selected' : '' }}>Creatief</option>
                                    <option value="landbouw" {{ request('sector') == 'landbouw' ? 'selected' : '' }}>Landbouw</option>
                                </select>
                            </div>

                            <div style="margin-bottom: 2vw;">
                                <label for="employment" style="display: flex; font-size: 1rem; margin-bottom: 0.5rem;">Werkgelegenheid</label>
                                <select name="employment" id="employment" style="color: #344343; width: 100%; padding: 2vw; border: 1px solid #6d6d6d; border-radius: 15px;">
                                    <option value="" {{ request('employment') == '' ? 'selected' : '' }}>Fulltime en parttime</option>
                                    <option value="fulltime" {{ request('employment') == 'fulltime' ? 'selected' : '' }}>Fulltime</option>
                                    <option value="parttime" {{ request('employment') == 'parttime' ? 'selected' : '' }}>Parttime</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div style="margin-bottom: 6vw;">
                        <div style="margin-bottom: 2vw;">
                            <label for="adult" style="display: flex; align-items: center; font-size: 1rem;">
                                <input type="checkbox" name="adult" id="adult" style="color: #344343; width: 5vw; height: 5vw; margin-right: 2vw; border: 1px solid #6d6d6d; border-radius: 15px;" {{ request('adult') ? 'checked' : '' }}>
                                <span>Ik ben 18+</span>
                            </label>
                        </div>

                        <div style="margin-bottom: 2vw;">
                            <label for="drivers_license" style="display: flex; align-items: center; font-size: 1rem;">
                                <input type="checkbox" name="drivers_license" id="drivers_license" style="color: #344343; width: 5vw; height: 5vw; margin-right: 2vw; border: 1px solid #6d6d6d; border-radius: 15px;" {{ request('drivers_license') ? 'checked' : '' }}>
                                <span>Ik heb een rijbewijs</span>
                            </label>
                        </div>
                    </div>
                </div>

                <input type="hidden" name="latitude" id="latitude">
                <input type="hidden" name="longitude" id="longitude">

                <x-button type="submit" class="filterSubmit" style="width: 100%; border-radius: 15px; box-shadow: none;">Bevestig filters</x-button>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            handleFocusBlur('location');
            handleFocusBlur('sector');
            handleFocusBlur('employment');

            function getLocation() {
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(showPosition);
                }
            }

            function showPosition(position) {
                var latitude = position.coords.latitude;
                var longitude = position.coords.longitude;

                document.getElementById("latitude").value = latitude;
                document.getElementById("longitude").value = longitude;

                fetch(`https://api.opencagedata.com/geocode/v1/json?q=${latitude}+${longitude}&key=0dd76c0f87de49b5a9f1c51dcf1f0fcb`)
                    .then(response => response.json())
                    .then(data => {
                        if (data.results.length > 0) {
                            var components = data.results[0].components;
                            var city = components.city || components.village || "Onbekend";
                            var locationInput = document.getElementById("location");

                            if (!locationInput.value) {
                                locationInput.value = city;
                            }

                            if (!locationInput.placeholder) {
                                locationInput.placeholder = city;
                            }

                            document.getElementById("location").placeholder = `${city}`;
                        } else {
                            document.getElementById("location").placeholder = "locatie niet gevonden";
                        }
                    })
            }

            window.onload = getLocation;

            const locationInput = document.getElementById('location');
            locationInput.addEventListener('input', function() {
                document.getElementById("latitude").value = '';
                document.getElementById("longitude").value = '';
            });


            const openModalButton = document.getElementById('openModalButton');
            const closeBtn = document.querySelector('.close-btn');
            const modal = document.getElementById('filterModal');
            const body = document.querySelector('body');

            openModalButton.addEventListener('click', function (event) {
                event.preventDefault();
                modal.style.display = 'flex';
                body.style.overflow = 'hidden';
            });

            function closeModal() {
                modal.style.display = 'none';
                body.style.overflow = 'auto';
            }

            closeBtn.addEventListener('click', closeModal);

            window.addEventListener('click', function(event) {
                if (event.target === modal) {
                    closeModal();
                }
            });

            closeBtn.addEventListener('keydown', function (event) {
                if (event.key === 'Enter' || event.key === ' ') {
                    event.preventDefault();
                    closeModal();
                }
            });

            const form = modal.querySelector('form');
            form.addEventListener('submit', function () {
                closeModal();
            });
        });

        function handleFocusBlur(elementId) {
            const element = document.getElementById(elementId);
            element.addEventListener('focus', function() {
                this.style.borderColor = '#DA9F93';
                this.style.outline = 'none';
            });
            element.addEventListener('blur', function() {
                this.style.borderColor = '#6d6d6d';
            });
        }
    </script>

    <style>
        @media (min-width: 1024px) {
            #filterModal .modalContent {
                width: 90vw;
                height: 60vh;
                flex-direction: row;
                justify-content: space-between;
            }

            #filterModal .modalContent form {
                overflow-y: auto;
                height: 100%;
                padding: 1.5vw 2vw;
            }
        }
    </style>
</div>

