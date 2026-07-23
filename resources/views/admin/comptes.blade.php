<x-layouts.dashboard title="Gestion des comptes">
    <x-dashboard-card title="Créer un nouveau compte">
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
                <x-input-label for="telephone" value="Téléphone" />
                <x-text-input id="telephone" name="telephone" type="text" class="mt-1 block w-full" placeholder="+229 01 XX XX XX XX" />
            </div>
            <div>
                <x-input-label for="agence" value="Agence" />
                <x-text-input id="agence" name="agence" type="text" class="mt-1 block w-full" placeholder="Ex. Agence Cotonou-Centre" />
            </div>
            <x-primary-button>Créer le compte</x-primary-button>
        </form>
    </x-dashboard-card>

    <x-dashboard-card title="Liste des comptes">
        <table class="w-full text-left">
            <thead>
                <tr class="text-sm text-gray-500">
                    <th>Nom</th><th>Téléphone</th><th>Agence</th><th>Rôle</th><th>Code (si client)</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $u)
                    <tr class="border-t">
                        <td class="py-2">{{ $u->name }}</td>
                        <td>{{ $u->telephone ?? '—' }}</td>
                        <td>{{ $u->agence ?? '—' }}</td>
                        <td>{{ ucfirst(str_replace('_', ' ', $u->role)) }}</td>
                        <td>{{ $u->compte->code ?? '—' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </x-dashboard-card>
</x-layouts.dashboard>