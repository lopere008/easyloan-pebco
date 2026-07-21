<x-layouts.dashboard title="Tableau de bord Chargé de crédit">

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        {{-- ... tes cards existantes (Demandes à analyser, Total, Statistiques) ... --}}
    </div>

    <x-dashboard-card title="Répartition des demandes">
        <div class="max-w-xs mx-auto">
            <canvas id="chargeChart"></canvas>
        </div>
    </x-dashboard-card>

    @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        new Chart(document.getElementById('chargeChart'), {
            type: 'pie',
            data: {
                labels: ['Approuvées', 'En attente', 'Refusées'],
                datasets: [{
                    data: [{{ $stats['acceptees'] }}, {{ $stats['en_attente'] }}, {{ $stats['refusees'] }}],
                    backgroundColor: ['#16a34a', '#f59e0b', '#dc2626'],
                }]
            },
            options: { plugins: { legend: { position: 'bottom' } } }
        });
    </script>
    @endpush
</x-layouts.dashboard>