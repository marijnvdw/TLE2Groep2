@extends('layouts.app')

@section('content')
    <section class="flex justify-center">
        <div class="bg-dark-moss shadow-lg shadow-dark-moss rounded-[30px] p-6 w-[80vw] mx-auto overflow-hidden mb-8">
            <div class="flex">
                <img src="img/mc-donalds-logo.png" alt="mc-donalds-logo" width="50" height="50">
                <h1 class="text-white">Titel</h1>
                <button class="bg-white p-2 rounded-lg">terug x</button>
            </div>
            <div>
                <h2 class="text-white">Keuken Medewerker</h2>
                <p class="text-white">Maandag tot vrijdag</p>
                <p class="text-white">Avond werk, dag dienst</p>
                <p class="text-white">Fulltime</p>
                <p class="text-white">Loon: €20,- p/u</p>
                <p class="text-white">Blaakstraat 102, Rotterdam</p>
                <p class="text-white">Ben jij een aanpakker met passie voor koken? Als keukenmedewerker ondersteun je ons keukenteam bij het bereiden van gerechten, het schoonhouden van de keuken en het verwerken van bestellingen. Jij zorgt ervoor dat alles op rolletjes loopt achter de schermen! Geen ervaring? Geen probleem, wij leren je de kneepjes van het vak. Sluit je aan bij ons enthousiaste team en maak het verschil! </p>
                <ul>
                    <li></li>
                    <li></li>
                    <li></li>
                </ul>
            </div>
            <a href="{{ route('vacancy-register') }}" class="text-white">reageer</a>
        </div>
    </section>
@endsection
