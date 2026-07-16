<x-layouts.dashboard title="Paramétrage des offres de prêt">
    <x-dashboard-card title="Créer une nouvelle offre">
        @if(session('success'))
            <p class="text-green-600 text-sm mb-3">{{ session('success') }}</p>
        @endif
        <form method="POST" action="{{ route('admin.offres.store') }}" class="space-y-3">
            @csrf
            <input name="nom" placeholder="Nom de l'offre" class="w-full rounded border-gray-300" required>
            <div class="grid grid-cols-2 gap-3">
                <input name="montant_min" type="number" placeholder="Montant min" class="rounded border-gray-300" required>
                <input name="montant_max" type="number" placeholder="Montant max" class="rounded border-gray-300" required>
                <input name="duree_min" type="number" placeholder="Durée min (mois)" class="rounded border-gray-300" required>
                <input name="duree_max" type="number" placeholder="Durée max (mois)" class="rounded border-gray-300" required>
            </div>
            <input name="taux" type="number" step="0.01" placeholder="Taux (%)" class="w-full rounded border-gray-300" required>
            <x-primary-button>Créer l'offre</x-primary-button>
        </form>
    </x-dashboard-card>

    <x-dashboard-card title="Offres existantes">
        @forelse($offres as $offre)
            <div class="border-b py-2">
                <p class="font-semibold">{{ $offre->nom }}</p>
                <p class="text-sm text-gray-500">{{ number_format($offre->montant_min) }} - {{ number_format($offre->montant_max) }} FCFA · {{ $offre->taux }}% · {{ $offre->duree_min }}-{{ $offre->duree_max }} mois</p>
            </div>
        @empty
            <p class="text-gray-400">Aucune offre configurée pour l'instant.</p>
        @endforelse
    </x-dashboard-card>
</x-layouts.dashboard>