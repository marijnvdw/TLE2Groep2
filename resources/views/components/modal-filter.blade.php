<div class="text-center space-y-4">
    <div id="filterModal" style="position: fixed; display: flex; justify-content: center; align-items: center; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.4); z-index: 9999;">
        <div class="modalContent" style="background-color: #2E342A; padding: 4vw; border-radius: 20px; width: 70%; max-width: 800px; text-align: center;">
            <span class="close-btn" style="font-size: 7vw; color: #6d6d6d; cursor: pointer; display: flex; justify-content: end; padding: 0 2vw;">&times;</span>
            <form action="{{ route('filter.results') }}" method="get" class="filters" style="color: #DA9F93;">
                <div style="margin-bottom: 4vw;">
                    <p class="filter" style="display: flex; justify-content: center; font-size: 2rem; margin-bottom: 0.5rem">Filters</p>
                    <p style="display: flex; justify-content: center; font-size: 1.2rem;">Selecteer uw voorkeuren</p>
                </div>

                <div style="margin-bottom: 4vw;">
                    <div style="margin-bottom: 2vw;">
                        <label for="location" style="display: flex; font-size: 1rem; margin-bottom: 0.5rem;">Postcode</label>
                        <input type="text" name="location" id="location" placeholder="3067TN" style="color: #344343; width: 100%; padding: 2vw; border: 1px solid #6d6d6d; border-radius: 15px;">
                    </div>

                    <div style="margin-bottom: 2vw;">
                        <label for="distance" style="display: flex; font-size: 1rem; margin-bottom: 0.5rem;">Afstand</label>
                        <select name="distance" id="distance" style="color: #344343; width: 100%; padding: 2vw; border: 1px solid #6d6d6d; border-radius: 15px;">
                            <option value=""></option>
                            <option value="5">5 km</option>
                            <option value="10">10 km</option>
                            <option value="20">20 km</option>
                            <option value="50">50 km</option>
                        </select>
                    </div>

                    <div style="margin-bottom: 2vw;">
                        <label for="sector" style="display: flex; font-size: 1rem; margin-bottom: 0.5rem;">Sector</label>
                        <select name="sector" id="sector" style="color: #344343; width: 100%; padding: 2vw; border: 1px solid #6d6d6d; border-radius: 15px;">
                            <option value=""></option>
                            <option value="horeca">Horeca</option>
                            <option value="Mileu">Mileu</option>
                            <option value="logistiek">Logistiek</option>
                            <option value="industrie">Indsutrie</option>
                        </select>
                    </div>

                    <div style="margin-bottom: 2vw;">
                        <label for="hours" style="display: flex; font-size: 1rem; margin-bottom: 0.5rem;">Uren</label>
                        <select name="hours" id="hours" style="color: #344343; width: 100%; padding: 2vw; border: 1px solid #6d6d6d; border-radius: 15px;">
                            <option value=""></option>
                            <option value="fulltime">Fulltime</option>
                            <option value="parttime">Parttime</option>
                            <option value="bijbaan">Bijbaan</option>
                        </select>
                    </div>
                </div>

                <div style="margin-bottom: 6vw;">
                    <div style="margin-bottom: 2vw;">
                        <label for="adult" style="display: flex; align-items: center; font-size: 1rem;">
                            <input type="checkbox" name="adult" id="adult" style="color: #344343; width: 5vw; height: 5vw; margin-right: 2vw; border: 1px solid #6d6d6d; border-radius: 15px;">
                            <span>Ik ben 18+</span>
                        </label>
                    </div>

                    <div style="margin-bottom: 2vw;">
                        <label for="drivers_license" style="display: flex; align-items: center; font-size: 1rem;">
                            <input type="checkbox" name="drivers_license" id="drivers_license" style="color: #344343; width: 5vw; height: 5vw; margin-right: 2vw; border: 1px solid #6d6d6d; border-radius: 15px;">
                            <span>Ik heb een rijbewijs</span>
                        </label>
                    </div>
                </div>

                <x-button type="submit" class="filterSubmit" style="width: 100%; border-radius: 15px; box-shadow: none;">Bevestig filters</x-button>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            handleFocusBlur('location');
            handleFocusBlur('distance');
            handleFocusBlur('sector');
            handleFocusBlur('hours');

            const modal = document.getElementById('filterModal');
            const closeBtn = document.getElementsByClassName('close-btn')[0];
            const body = document.querySelector('body');

            modal.style.display = 'flex';

            body.style.overflow = 'hidden';

            closeBtn.addEventListener('click', function () {
                modal.style.display = 'none';
                body.style.overflow = 'auto';
            });

            window.addEventListener('click', function (event) {
                if (event.target === modal) {
                    modal.style.display = 'none';
                    body.style.overflow = 'auto';
                }
            });

            const form = modal.querySelector('form');
            form.addEventListener('submit', function () {
                modal.style.display = 'none';
                body.style.overflow = 'auto';
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
</div>
