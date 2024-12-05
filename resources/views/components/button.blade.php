@props(['type' => 'primary'])

@php
    $classes = $type === 'primary'
        ? 'bg-cream text-violet py-2 px-4 rounded-[30px] font-semibold shadow-md shadow-violet hover:bg-gray hover:shadow-md hover:shadow-dark-violet'
        : 'bg-cream text-dark-moss py-2 px-4 rounded-[30px] font-semibold shadow-md shadow-gray hover:bg-gray hover:shadow-md hover:shadow-cream';
@endphp

<button {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</button>
