<x-app-layout>
    <x-slot name="header"><h2 class="font-semibold text-xl text-gray-800">Tableau de bord</h2></x-slot>

    @php $compte = auth()->user()->compte; @endphp

    <div class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <x-dashboard-card title="Mon compte">
                <p class="text-gray-500 text-sm">Code : {{ $compte->code }}</p>
                <p class="text-gray-500 text-sm">Ouvert depuis {{ $compte->anciennete() }} mois</p>
            </x-dashboard-card>

            <x-dashboard-card title="Éligibilité au prêt">
                @if($compte->estEligible())
                    <p class="text-green-600 font-semibold">Vous êtes éligible ✓</p>
                @else
                    <p class="text-red-600 font-semibold">Non éligible</p>
                    <p class="text-sm text-gray-400">Compte ≥ 1 mois + au moins une transaction requis.</p>
                @endif
            </x-dashboard-card>
        </div>

        @if($compte->estEligible())
            <a href="{{ route('client.faire-pret') }}" class="bg-blue-600 text-white px-4 py-2 rounded">Faire une demande de prêt</a>
        @endif
    </div>
</x-app-layout>