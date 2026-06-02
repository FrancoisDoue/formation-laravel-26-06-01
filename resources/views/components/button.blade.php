@props(['variant' => null, 'href' => null])
@php
    $classes = match($variant) {
        'primary' => 'bg-blue-500 text-white',
        'danger' => 'bg-red-500 text-white',
        default => 'bg-gray-300 text-black',
    };
    $haveHref = $href != null;
@endphp

<div>
    @if ($haveHref)
        <a
            href="{{ $href }}"
            {{ $attributes->merge(['class' => "inline-block px-4 py-2 rounded $classes"]) }}
        >
            {{ $slot }}
        </a>
    @else
        <button {{ $attributes->merge(['class' => "inline-block px-4 py-2 rounded $classes"]) }}>
            {{ $slot }}
        </button>
    @endif
    <!-- People find pleasure in different ways. I find it in keeping my mind clear. - Marcus Aurelius -->
</div>
