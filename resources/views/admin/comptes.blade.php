<x-layouts.dashboard title="Gestion des comptes">
    <x-dashboard-card title="Créer un nouveau compte">

        @if(session('nouveau_code'))
            <div class="mb-4 p-4 bg-green-50 border border-green-200 rounded-lg">
                <p class="text-sm text-green-700">Compte client créé — code à transmettre :</p>
                <p class="text-2xl font-bold text-green-800 tracking-wider mt-1">{{ session('nouveau_code') }}</p>
            </div>
        @elseif(session('success'))
            <p class="text-green-600 text-sm mb-3">{{ session('success') }}</p>
        @endif

        @if($errors->any())
            <div class="mb-4 p-4 bg-red-50 border border-red-200 rounded-lg">
                <ul class="text-sm text-red-700 list-disc list-inside">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('admin.comptes.store') }}" class="space-y-4">
            @csrf
            <div>
                <x-input-label for="role" value="Type de compte" />
                <select name="role" id="role" class="mt-1 block w-full rounded border-gray-300">
                    <option value="client">Client</option>
                    <option value="charge_credit">Chargé de crédit</option>
                </select>
            </div>
            <div>
                <x-input-label for="name" value="Nom complet" />
                <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" required />
            </div>
            <div>
                <x-input-label for="email" value="Email" />
                <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" required />
            </div>
            <div>
                <x-input-label for="password" value="Mot de passe" />
                <x-text-input id="password" name="password" type="password" class="mt-1 block w-full" required />
            </div>
            <x-primary-button>Créer le compte</x-primary-button>
        </form>
    </x-dashboard-card>

    <x-dashboard-card title="Liste des comptes">
        <table class="w-full text-left">
            <thead>
                <tr class="text-sm text-gray-500">
                    <th>Nom</th><th>Rôle</th><th>Code (si client)</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $u)
                    <tr class="border-t">
                        <td class="py-2">{{ $u->name }}</td>
                        <td>{{ $u->role }}</td>
                        <td>{{ $u->compte->code ?? '—' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </x-dashboard-card>
</x-layouts.dashboard>