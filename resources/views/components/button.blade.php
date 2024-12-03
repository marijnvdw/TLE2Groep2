@props(['type' => 'primary'])

@php
    $classes = $type === 'primary'
        ? 'bg-violet text-cream py-2 px-4 rounded-[30px] font-semibold shadow-md shadow-dark-violet hover:bg-dark-violet hover:shadow-md hover:shadow-violet'
        : 'bg-cream text-dark-moss py-2 px-4 rounded font-semibold shadow-md shadow-gray hover:bg-gray hover:shadow-md hover:shadow-cream';
@endphp

<button {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</button>
