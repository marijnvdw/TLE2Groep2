@extends('layouts.app')

@section('content')
    <section class="flex justify-center px-4 flex-col items-center">
        <!-- Form wraps around all applicants -->
        <form method="POST" action="{{ route('email.inform-applicants-mail') }}" class="w-full flex flex-col items-center">
            @csrf
            @foreach($applicants as $index => $applicant)
                <div
                    class="bg-dark-moss shadow-lg shadow-dark-moss rounded-[30px] p-8 w-[80vw] max-w-[600px] mx-auto overflow-hidden mb-8">
                    <h1 class="text-rose-brown text-3xl sm:text-4xl font-bold mb-6 text-center">
                        Persoon {{ $index + 1 }}
                    </h1>
                    <p class="text-white text-base sm:text-lg text-center mb-6">
                        Kies datum en tijd voor sollicitant om langs te komen. De keuze is uit een week vanaf nu tot en met een maand vanaf nu
                    </p>
                    <!-- Hidden input for applicant ID -->
                    <input type="hidden" name="applicants[{{ $index }}][id]" value="{{ $applicant->id }}">
                    <!-- Datetime-local input for selecting time -->
                    <input type="datetime-local" name="applicants[{{ $index }}][time]" id="CheckIn" required>
                </div>
            @endforeach

            <!-- Submit Button -->
            <div class="mt-6 text-center w-[80vw] max-w-[600px]">
                <button
                    type="submit"
                    class="bg-dark-violet text-white font-semibold rounded-[30px] px-6 py-3 hover:bg-white hover:text-dark-moss transition-colors duration-300 ease-in-out"
                >
                    Informeer sollicitanten
                </button>
            </div>
        </form>
    </section>
@endsection

<script>
    document.addEventListener('DOMContentLoaded', () => {
        // Get today's date and the date a week from now
        const today = new Date();
        const weekAhead = new Date(today);
        weekAhead.setDate(today.getDate() + 7); // Set the date 7 days ahead
        const monthLater = new Date(today);
        monthLater.setMonth(today.getMonth() + 1); // Set the date 1 month ahead

        // Format the dates to "YYYY-MM-DD"
        const todayFormatted = today.toISOString().split('T')[0]; // "2024-12-17"
        const weekAheadFormatted = weekAhead.toISOString().split('T')[0]; // "2024-12-24"
        const monthLaterFormatted = monthLater.toISOString().split('T')[0]; // "2024-01-17"

        // Get all datetime-local inputs and apply the restrictions
        document.querySelectorAll('input[type="datetime-local"]').forEach(el => {
            // Set minimum time to a week ahead (can't select a time before 7 days from now)
            el.min = weekAheadFormatted + "T00:00"; // Minimum time: 7 days ahead, starting from midnight
            // Set maximum time to one month ahead
            el.max = monthLaterFormatted + "T23:59"; // Maximum time: 1 month ahead, till the end of the day
        });
    });
</script>
