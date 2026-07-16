<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $title ?? 'Tableau de bord' }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex gap-6">

            {{-- Sidebar agents --}}
            <aside class="w-64 bg-white shadow-sm rounded-lg p-4 h-fit">
                <p class="font-bold text-lg mb-4">EasyLoan</p>
                <nav class="space-y-2">
                   
                    @if(auth()->user()->role === 'charge_credit')
                        <a href="{{ route('charge.dashboard') }}" class="block text-gray-700 hover:text-blue-600">Tableau de bord</a>
                        <a href="{{ route('charge.demandes') }}" class="block text-gray-700 hover:text-blue-600">Demandes à analyser</a>
                    @elseif(auth()->user()->role === 'admin')
                        <a href="{{ route('admin.dashboard') }}" class="block text-gray-700 hover:text-blue-600">Tableau de bord</a>
                        <a href="{{ route('admin.comptes') }}" class="block text-gray-700 hover:text-blue-600">Gestion des comptes</a>
                        <a href="{{ route('admin.offres') }}" class="block text-gray-700 hover:text-blue-600">Offres de prêt</a>
                    @endif
                </nav>
            </aside>

            {{-- Contenu de la page --}}
            <div class="flex-1">
                @if(session('success'))
                    <div class="mb-4 p-3 bg-green-50 text-green-700 rounded">{{ session('success') }}</div>
                @endif
                
            </div>

        </div>
    </div>
</x-app-layout>