<x-app-layout>
    <x-slot name="header"><h2 class="font-semibold text-xl text-gray-800">Faire une demande de prêt</h2></x-slot>

    <div class="py-12 max-w-3xl mx-auto sm:px-6 lg:px-8">
        <x-dashboard-card title="Nouvelle demande">
            <form method="POST" action="{{ route('client.soumettre-pret') }}" class="space-y-4">
                @csrf
                <div>
                    <x-input-label for="offre_pret_id" value="Type d'offre" />
                    <select name="offre_pret_id" class="mt-1 block w-full rounded border-gray-300" required>
                        @foreach($offres as $offre)
                            <option value="{{ $offre->id }}">{{ $offre->nom }} ({{ $offre->duree_min }}-{{ $offre->duree_max }} mois)</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <x-input-label for="montant" value="Montant souhaité (FCFA)" />
                    <x-text-input name="montant" type="number" class="mt-1 block w-full" required />
                </div>
                <div>
                    <x-input-label for="duree" value="Durée (mois)" />
                    <x-text-input name="duree" type="number" class="mt-1 block w-full" required />
                </div>
                <x-primary-button>Soumettre la demande</x-primary-button>
            </form>
        </x-dashboard-card>
    </div>
</x-app-layout>