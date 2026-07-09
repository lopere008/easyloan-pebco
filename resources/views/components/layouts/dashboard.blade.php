{{-- resources/views/layouts/dashboard.blade.php --}}
<!DOCTYPE html>
<html lang="fr">
<head>
    <title>EasyLoan - Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="flex">
        {{-- Sidebar dynamique selon le rôle --}}
        <aside class="w-64 bg-gray-100">
            <p class="font-bold">EasyLoan</p>
            <nav>
                @if(auth()->user()->role === 'caissier')
                    <a href="{{ route('caissier.clients') }}">Clients à enregistrer</a>
                    <a href="{{ route('caissier.decaissements') }}">Décaissements</a>
                @elseif(auth()->user()->role === 'charge_credit')
                    <a href="{{ route('charge.demandes') }}">Demandes à analyser</a>
                @elseif(auth()->user()->role === 'admin')
                    <a href="{{ route('admin.comptes') }}">Gestion des comptes</a>
                    <a href="{{ route('admin.offres') }}">Paramétrage des offres</a>
                @endif
            </nav>
        </aside>

        {{-- Contenu propre à chaque page --}}
        <main class="flex-1 p-6">
            {{ $slot }}
        </main>
    </div>
</body>
</html>