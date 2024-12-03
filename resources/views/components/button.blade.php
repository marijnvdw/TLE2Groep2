@props(['type' => 'primary'])

@php
    $classes = $type === 'primary'
        ? 'bg-violet text-cream py-2 px-4 rounded font-semibold hover:bg-dark-violet'
        : 'bg-cream text-dark-moss py-2 px-4 rounded font-semibold hover:bg-gray';
@endphp

<button {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</button>
