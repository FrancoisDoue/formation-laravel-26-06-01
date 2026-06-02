<x-app-layout>
    @if(session('success'))
    <div>
        <p class="mb-4 text-green-600">
            {{ session('success') }}
        </p>
    </div>
    @endif
    <div>
        <p class="mb-4">
            Bienvenue, {{ auth()->user()->name }} ({{ auth()->user()->role }})
        </p>
        <a href="{{ route('posts.index') }}" class="text-blue-600 underline">
            → Gérer les articles
        </a>
    </div>

</x-app-layout>
