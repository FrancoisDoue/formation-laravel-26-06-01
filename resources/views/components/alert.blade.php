@props(['type' => 'success'])

@php
    $color = match($type) {
        'success' => 'bg-green-100 text-green-800',
        'error' => 'bg-red-100 text-red-800',
        'warning' => 'bg-yellow-100 text-yellow-800',
        default => 'bg-gray-200 text-gray-800',
    };
@endphp

<div {{ $attributes->merge(['class' => "rounded-md p-4 $color"]) }}>
    {{ $slot }}
</div>
