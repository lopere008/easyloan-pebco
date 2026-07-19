<x-layouts.dashboard title="Tableau de bord Chargé de crédit">

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">

        <x-dashboard-card title="Demandes à analyser">
            @if($stats['en_attente'] > 0)
                <p class="text-gray-700 font-semibold">{{ $stats['en_attente'] }} demande(s) en attente</p>
            @else
                <p class="text-gray-400">Aucune demande en attente d'analyse.</p>
            @endif
        </x-dashboard-card>

        <x-dashboard-card title="Total des demandes">
            <p class="text-gray-700 font-semibold">{{ $stats['total'] }} demande(s) au total</p>
        </x-dashboard-card>

        <x-dashboard-card title="Statistiques rapides" subtitle="Ce mois-ci">
            @php
                $traitees = $stats['total'] - $stats['en_attente'];
                $taux = $stats['total'] > 0 ? round(($traitees / $stats['total']) * 100) : 0;
            @endphp
            <p class="text-gray-400">{{ $traitees }} dossier(s) traité(s) · Taux de traitement : {{ $taux }}%</p>
        </x-dashboard-card>
    </div>

</x-layouts.dashboard>