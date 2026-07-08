<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tableau de bord') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- Cartes statistiques -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <div class="bg-white overflow-hidden shadow-sm rounded-lg p-6">
                    <p class="text-sm text-gray-500">Montant emprunté</p>
                    <p class="text-2xl font-bold text-gray-800 mt-2">—</p>
                </div>

                <div class="bg-white overflow-hidden shadow-sm rounded-lg p-6">
                    <p class="text-sm text-gray-500">Statut de la demande</p>
                    <p class="text-2xl font-bold text-gray-400 mt-2">Aucune demande</p>
                </div>

                <div class="bg-white overflow-hidden shadow-sm rounded-lg p-6">
                    <p class="text-sm text-gray-500">Prochaine échéance</p>
                    <p class="text-2xl font-bold text-gray-800 mt-2">—</p>
                </div>
            </div>

            <!-- Historique des demandes -->
            <div class="bg-white overflow-hidden shadow-sm rounded-lg">
                <div class="p-6">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">Historique de mes demandes</h3>

                    <div class="text-center py-8 text-gray-400">
                        Vous n'avez pas encore soumis de demande de prêt.
                        <br>
                        
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>