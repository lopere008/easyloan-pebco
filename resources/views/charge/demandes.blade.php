<x-layouts.dashboard title="Demandes à analyser">
    <x-dashboard-card title="Liste des demandes soumises">
        @forelse($demandes as $demande)
            <a href="{{ route('charge.demandes.show', $demande->id) }}" class="block border-b py-3 hover:bg-gray-50">
                <p class="font-semibold">{{ $demande->compte->user->name }} — {{ number_format($demande->montant) }} FCFA</p>
                <p class="text-sm text-gray-500">{{ $demande->duree }} mois · Statut : {{ $demande->statut }}</p>
            </a>
        @empty
            <p class="text-gray-400">Aucune demande à analyser pour l'instant.</p>
        @endforelse
    </x-dashboard-card>
</x-layouts.dashboard>