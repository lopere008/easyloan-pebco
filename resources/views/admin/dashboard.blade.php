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