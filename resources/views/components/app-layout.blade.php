@props(['header' => null])

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>{{ $title ?? config('app.name') }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex min-h-screen flex-col bg-gray-50 text-gray-900">
<nav class="bg-white border-b px-4 py-3 flex flex-wrap gap-4 items-center">
    @auth
        <a href="{{ route('dashboard') }}">Dashboard</a>
        <a href="{{ route('posts.index') }}">Articles</a>
        <a href="{{ route('newsletters.index') }}">Newsletters</a>
        <span class="text-sm text-gray-500">{{ auth()->user()->name }}</span>
        <form method="POST" action="{{ route('logout') }}" class="ml-auto">@csrf
            <button type="submit" class="text-sm text-red-600">Déconnexion</button>
        </form>
    @else
        <a href="{{ route('login') }}">Connexion</a>
        <a href="{{ route('register') }}">Inscription</a>
    @endauth
</nav>
    <main class="flex-1 py-8 px-4 max-w-5xl mx-auto w-full">
        @isset($header)
            <h1 class="text-xl font-semibold mb-4">{{ $header }}</h1>
        @endisset
        {{ $slot }}
    </main>
</body>
</html>
