@props(['title'])

<div>
    @if ($title)
        <h3>{{ $title }}</h3>
    @endif
    <p class="mt-4">
        {{ $slot }}
    </p>
    <!-- Simplicity is an acquired taste. - Katharine Gerould -->
</div>
