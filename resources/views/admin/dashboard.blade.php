<x-layouts.dashboard title="Tableau de bord Administrateur">
    
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">

            <x-dashboard-card title="Gestion des comptes" subtitle="Agents actifs">
                <p class="text-gray-500">{{ $stats['charges'] }} chargés de crédit</p>

            </x-dashboard-card>

            <x-dashboard-card title="Paramétrage des offres">
                <p class="text-gray-400">Aucune offre configurée pour l'instant.</p>
            </x-dashboard-card>

            <x-dashboard-card title="Supervision globale" subtitle="Statistiques générales">
                <p class="text-gray-500">{{ $stats['charges'] }} chargés de crédit</p>

            </x-dashboard-card>

            <x-dashboard-card title="Journal de sécurité">
                <p class="text-gray-400">Aucune action récente enregistrée.</p>
            </x-dashboard-card>
        </div>    
</x-layouts.dashboard>