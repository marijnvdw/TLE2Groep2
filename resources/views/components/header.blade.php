<header class="bg-dark-green text-white p-4">
    <!-- Navigation Bar -->
    <div class="flex justify-between items-center">
        <!-- Hamburger Menu -->
        <div id="burgerMenu" class="flex flex-col justify-center items-center cursor-pointer" onclick="toggleOverlay()"
             tabindex="0" role="button">
            <span class="block w-10 h-1 bg-violet"></span>
            <span class="block w-10 text-center text-violet text-sm font-bold">Menu</span>
            <span class="block w-10 h-1 bg-violet"></span>
        </div>

        <!-- Centered Logo -->
        <div class="" >
            <a  class=""
                href="{{ route('home') }}">
                <img class="h-16 w-auto" src="{{asset('storage/images/logo-oh-trans.png')}}" alt="Logo open hiring">
            </a>
        </div>

        <div class="w-10"></div>
    </div>

    <!-- Overlay Menu -->
    <div id="overlay"
         class="z-10 fixed inset-0 bg-black bg-opacity-50 hidden transition-opacity duration-300 opacity-0">
        <div class="absolute top-0 left-0 w-full max-w-sm h-full flex flex-col bg-dark-moss shadow-lg p-6">
            <!-- Close Button -->
            <div id="closeBtn" class="absolute top-4 right-4 text-2xl text-cream cursor-pointer"
                 onclick="toggleOverlay()" tabindex="0" role="button">&times;
            </div>

            <!-- Menu Links -->
            <nav class="mt-24 space-y-6 flex-grow">
                <a href="{{ route('application.index') }}" class="block text-lg text-cream hover:text-violet">Vacatures</a>
                <a href="{{ route('about-us') }}" class="block text-lg text-cream hover:text-violet">Over ons</a>
                <a href="{{ route('companies') }}" class="block text-lg text-cream hover:text-violet">Werkgevers</a>

                @if (Route::has('login'))
                    @auth
                        @if (Auth::user()->admin === 1)
                            <a href="{{ route('admin-overzicht.index') }}" class="block text-lg text-cream hover:text-violet">Admin overzicht</a>
                        @else
                            <a href="{{ route('dashboard') }}" class="block text-lg text-cream hover:text-violet">Vacature dashboard</a>
                        @endif

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="block text-lg text-cream hover:text-violet">
                                Uitloggen
                            </button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="block text-lg text-cream hover:text-violet">Login/Registreer voor
                            bedrijven</a>
                    @endauth
                @endif

            </nav>
            @if (Route::has('login'))
                @auth
                    <p>{{Auth::user()->name}}</p>
                @endauth
            @endif
        </div>
    </div>
    <!-- Script for Toggle -->
    <script>
        const overlay = document.getElementById('overlay');
        const burgerMenu = document.getElementById('burgerMenu');
        const closeBtn = document.getElementById('closeBtn');

        function toggleOverlay() {
            overlay.classList.toggle('hidden');
            overlay.classList.toggle('opacity-100');
        }

        function keyBoardAcces(event) {
            if (event.key === 'Enter' || event.key === ' ') {
                toggleOverlay();
                event.preventDefault();
            }
        }

        burgerMenu.addEventListener('keydown', function (event) {
            keyBoardAcces(event);
        });

        closeBtn.addEventListener('keydown', function (event) {
            keyBoardAcces(event);
        });

        window.addEventListener('click', function (event) {
            if (event.target === overlay) {
                toggleOverlay();
            }
        });

    </script>
</header>
