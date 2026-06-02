<x-guest-layout>
    <form method="POST" action="{{ route('register') }}" class="space-y-4">
        @csrf
        <input
            type="text"
            name="name"
            required
            class="w-full border rounded p-2"
            placeholder="Nom"
        >
        <input
            type="email"
            name="email"
            required
            class="w-full border rounded p-2"
            placeholder="Email"
        >
        <input
            type="password"
            name="password"
            required
            class="w-full border rounded p-2"
            placeholder="Mot de passe"
        >
        <input
            type="password"
            name="password_confirmation"
            required
            class="w-full border rounded p-2"
            placeholder="Confirmation"
        >
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded w-full">
            S'inscrire
        </button>
    </form>
</x-guest-layout>
