<x-layouts.dashboard title="Détail de la demande">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
        <x-dashboard-card title="Informations de la demande">
            <p>Client : {{ $demande->compte->user->name }} (code {{ $demande->compte->code }})</p>
            <p>Montant : {{ number_format($demande->montant) }} FCFA</p>
            <p>Durée : {{ $demande->duree }} mois</p>
            <p>Statut : {{ $demande->statut }}</p>
        </x-dashboard-card>

        <x-dashboard-card title="Vérification automatique">
            <p>Ancienneté du compte : {{ $demande->compte->anciennete() }} mois {{ $demande->compte->anciennete() >= 1 ? '✓' : '✗' }}</p>
            <p>Activité (transactions) : {{ $demande->compte->transactions()->count() }} dépôts {{ $demande->compte->estActif() ? '✓' : '✗' }}</p>
            <p class="font-semibold {{ $demande->compte->estEligible() ? 'text-green-600' : 'text-red-600' }}">
                Éligibilité : {{ $demande->compte->estEligible() ? 'Confirmée' : 'Non remplie' }}
            </p>
        </x-dashboard-card>
    </div>

    <x-dashboard-card title="Observations">
        @foreach($demande->observations as $obs)
            <p class="text-sm text-gray-600 border-b py-2">— {{ $obs->contenu }} <span class="text-gray-400">({{ $obs->created_at->format('d/m/Y') }})</span></p>
        @endforeach

        <form method="POST" action="{{ route('charge.observations.store', $demande->id) }}" class="mt-4">
            @csrf
            <textarea name="contenu" rows="3" class="w-full rounded border-gray-300" placeholder="Votre observation..." required></textarea>
            <x-primary-button class="mt-2">Ajouter</x-primary-button>
        </form>
    </x-dashboard-card>

    @if(!$demande->decision)
        <x-dashboard-card title="Notifier le verdict">
            <form method="POST" action="{{ route('charge.decisions.store', $demande->id) }}" class="flex gap-4">
                @csrf
                <button name="type_decision" value="acceptee" class="bg-green-600 text-white px-4 py-2 rounded">Accepter</button>
                <button name="type_decision" value="refusee" class="bg-red-600 text-white px-4 py-2 rounded">Refuser</button>
            </form>
        </x-dashboard-card>
    @else
        <x-dashboard-card title="Décision déjà prise">
            <p>{{ $demande->decision->type_decision === 'acceptee' ? 'Acceptée' : 'Refusée' }} le {{ $demande->decision->created_at->format('d/m/Y') }}</p>
        </x-dashboard-card>
    @endif
</x-layouts.dashboard>