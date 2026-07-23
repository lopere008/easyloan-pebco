<x-dashboard-card title="Répartition des comptes">
    <div class="max-w-xs mx-auto relative h-64">
        <canvas id="adminChart"></canvas>
    </div>
</x-dashboard-card>

<div class="table-card bg-white border border-gray-100 rounded-lg overflow-hidden mt-6">
    <div class="flex items-center justify-between px-5 py-4 border-b border-gray-100">
        <div>
            <h3 class="font-semibold text-navy">Comptes créés récemment</h3>
            <p class="text-xs text-gray-500 mt-0.5">10 derniers comptes enregistrés sur la plateforme</p>
        </div>
        <a href="{{ route('admin.comptes') }}" class="text-xs font-semibold text-brand-dark bg-brand-soft px-3 py-1.5 rounded-md hover:bg-brand hover:text-white transition">
            Voir tous les comptes
        </a>
    </div>

    <table class="w-full text-sm">
        <thead>
            <tr class="bg-paper-dim text-gray-500 text-[11px] uppercase tracking-wide">
                <th class="text-left px-5 py-2.5">Utilisateur</th>
                <th class="text-left px-5 py-2.5">Email</th>
                <th class="text-left px-5 py-2.5">Téléphone</th>
                <th class="text-left px-5 py-2.5">Agence</th>
                <th class="text-left px-5 py-2.5">Rôle</th>
                <th class="text-left px-5 py-2.5">Créé le</th>
                <th class="text-left px-5 py-2.5">Email vérifié</th>
            </tr>
        </thead>
        <tbody>
            @forelse($derniersComptes as $compte)
                <tr class="border-t border-gray-100 hover:bg-navy-soft/40">
                    <td class="px-5 py-3">
                        <span class="inline-flex items-center justify-center w-6 h-6 rounded-full bg-navy-soft text-navy text-[11px] font-bold mr-2">
                            {{ strtoupper(substr($compte->name, 0, 1)) }}
                        </span>
                        {{ $compte->name }}
                    </td>
                    <td class="px-5 py-3 text-gray-500">{{ $compte->email }}</td>
                    <td class="px-5 py-3 text-gray-500">{{ $compte->telephone ?? '—' }}</td>
                    <td class="px-5 py-3 text-gray-500">{{ $compte->agence ?? '—' }}</td>
                    <td class="px-5 py-3">
                        <span class="text-[11px] font-semibold px-2.5 py-0.5 rounded-full
                            {{ $compte->role === 'client' ? 'bg-navy-soft text-navy' : 'bg-brand-soft text-brand-dark' }}">
                            {{ ucfirst(str_replace('_', ' ', $compte->role)) }}
                        </span>
                    </td>
                    <td class="px-5 py-3 text-gray-500">{{ $compte->created_at->format('d M Y') }}</td>
                    <td class="px-5 py-3">
                        @if($compte->email_verified_at)
                            <span class="text-[11px] font-semibold px-2.5 py-0.5 rounded-full bg-green-50 text-green-700">Vérifié</span>
                        @else
                            <span class="text-[11px] font-semibold px-2.5 py-0.5 rounded-full bg-red-50 text-red-700">Non vérifié</span>
                        @endif
                    </td>
                </tr>
            @empty
                <tr><td colspan="7" class="px-5 py-6 text-center text-gray-400">Aucun compte pour le moment.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    new Chart(document.getElementById('adminChart'), {
        type: 'pie',
        data: {
            labels: ['Clients', 'Chargés de crédit'],
            datasets: [{
                data: [{{ $stats['clients'] }}, {{ $stats['charges'] }}],
                backgroundColor: ['#22344A', '#C97A45'],
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: { legend: { position: 'bottom' } }
        }
    });
</script>
@endpush