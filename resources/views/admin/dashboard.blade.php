<x-layouts.dashboard title="Tableau de bord Administrateur">

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <x-dashboard-card title="Gestion des comptes">
            <p class="text-gray-500">{{ $stats['clients'] }} clients · {{ $stats['charges'] }} chargés de crédit</p>
        </x-dashboard-card>

        <x-dashboard-card title="Paramétrage des offres">
            <p class="text-gray-400">Aucune offre configurée pour l'instant.</p>
        </x-dashboard-card>

        <x-dashboard-card title="Supervision globale">
            <p class="text-gray-500">{{ $stats['demandes_total'] }} demandes au total · {{ number_format($stats['montant_total']) }} FCFA prêtés</p>
        </x-dashboard-card>
    </div>

    <x-dashboard-card title="Répartition des comptes">
        <div class="max-w-xs mx-auto">
            <canvas id="adminChart"></canvas>
        </div>
    </x-dashboard-card>

    @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        new Chart(document.getElementById('adminChart'), {
            type: 'pie',
            data: {
                labels: ['Clients', 'Chargés de crédit'],
                datasets: [{
                    data: [{{ $stats['clients'] }}, {{ $stats['charges'] }}],
                    backgroundColor: ['#2563eb', '#f59e0b'],
                }]
            },
            options: { plugins: { legend: { position: 'bottom' } } }
        });
    </script>
    @endpush

</x-layouts.dashboard>