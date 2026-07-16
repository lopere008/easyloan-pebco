<x-guest-layout>
    <h1 class="text-xl font-bold mb-4 text-center">Accéder à mon espace client</h1>

    <form method="POST" action="{{ route('client.login.submit') }}">
        @csrf
        <x-input-label for="code" value="Votre code" />
        <x-text-input id="code" name="code" type="text" class="mt-1 block w-full uppercase" required autofocus />
        <x-input-error :messages="$errors->get('code')" class="mt-2" />

        <x-primary-button class="mt-4 w-full justify-center">
            Accéder à mon espace
        </x-primary-button>
    </form>
</x-guest-layout>