<header class="bg-dark-green text-white p-4">
    <!-- Navigation Bar -->
    <div class="flex justify-between items-center">
        <!-- Hamburger Menu -->
        <div class="flex flex-col justify-center items-center cursor-pointer" onclick="toggleOverlay()">
            <span class="block w-6 h-1 bg-violet mb-1"></span>
            <span class="block w-6 h-1 bg-violet mb-1"></span>
            <span class="block w-6 h-1 bg-violet"></span>
        </div>

        <!-- Centered Logo -->
        <div class="flex-1 flex justify-center items-center" >
            <a href="{{ route('home') }}">
                <img class="h-16 w-auto" src="img/logo-oh-trans.png" alt="Logo open hiring" >
            </a>

        </div>
    </div>

    <!-- Overlay Menu -->
    <div id="overlay" class="fixed inset-0 bg-black bg-opacity-50 hidden transition-opacity">
        <div class="absolute top-0 left-0 w-3/4 max-w-sm h-full bg-dark-moss shadow-lg p-6">
            <!-- Close Button -->
            <div class="absolute top-4 right-4 text-2xl text-cream cursor-pointer" onclick="toggleOverlay()">&times;</div>

            <!-- Menu Links -->
            <nav class="mt-24 space-y-6">
                <a href="{{ route('application.index') }}" class="block text-lg text-cream hover:text-violet">Vacatures</a>
                <a href="#" class="block text-lg text-cream hover:text-violet">Over ons</a>
                <a href="#" class="block text-lg text-cream hover:text-violet">Werkgevers</a>
                <a href="#" class="block text-lg text-cream hover:text-violet">Login/Registreer voor bedrijven</a>
            </nav>
        </div>
    </div>

    <!-- Script for Toggle -->
    <script>
        function toggleOverlay() {
            const overlay = document.getElementById('overlay');
            overlay.classList.toggle('hidden');
            overlay.classList.toggle('opacity-100');
        }
    </script>
</header>
