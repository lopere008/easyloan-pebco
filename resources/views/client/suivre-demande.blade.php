<x-app-layout>
    <x-slot name="header"><h2 class="font-semibold text-xl text-gray-800">Suivre ma demande</h2></x-slot>

    <div class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8">
        @forelse($demandes as $demande)
            <x-dashboard-card title="Demande #{{ $demande->id }}" subtitle="Statut : {{ $demande->statut }}">
                <p>{{ number_format($demande->montant) }} FCFA sur {{ $demande->duree }} mois</p>

                @if($demande->observations->count())
                    <div class="mt-4 border-t pt-4">
                        <h4 class="font-semibold text-sm mb-2">Observations du chargé de crédit</h4>
                        @foreach($demande->observations as $obs)
                            <p class="text-sm text-gray-600 mb-1">— {{ $obs->contenu }} <span class="text-gray-400">({{ $obs->created_at->format('d/m/Y') }})</span></p>
                        @endforeach
                    </div>
                @endif
            </x-dashboard-card>
        @empty
            <x-dashboard-card title="Aucune demande">
                <p class="text-gray-400">Vous n'avez pas encore soumis de demande de prêt.</p>
            </x-dashboard-card>
        @endforelse
    </div>
</x-app-layout>