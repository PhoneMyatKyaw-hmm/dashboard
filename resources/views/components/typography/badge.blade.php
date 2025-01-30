@props(['type' => 'primary'])

@php
    $colors = [
        'success' => 'bg-green-100 text-green-800',
        'warning' => 'bg-yellow-100 text-yellow-800',
        'error' => 'bg-red-100 text-red-800',
        'info' => 'bg-blue-100 text-blue-800',
        'primary' => 'bg-teal-100 text-teal-800',
    ];

    $color = $colors[$type] ?? $colors['primary'];
@endphp

<span
    {{ $attributes->merge(['class' => 'inline-flex items-center gap-x-1.5 py-1.5 px-3 rounded-full text-xs font-medium ' . $color]) }}>
    {{ $slot }}
</span>
