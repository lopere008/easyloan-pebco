<div class="flex h-screen flex-col justify-between border-e border-gray-100 bg-white">
  <div class="p-4">
    <span class="grid h-12 w-32 place-content-center rounded-lg bg-gray-100 text-sm text-gray-500">EasyLoan</span>

    <ul class="mt-4 space-y-1">
      @if(auth()->user()->role === 'client')
        <li><a href="{{ route('client.dashboard') }}" class="block rounded-lg px-4 py-2 text-sm font-medium text-gray-700 transition-colors hover:bg-gray-100 hover:text-gray-900 {{ request()->routeIs('client.dashboard') ? 'bg-gray-100 text-gray-900' : '' }}">Tableau de bord</a></li>
        <li><a href="{{ route('client.suivre-demande') }}" class="block rounded-lg px-4 py-2 text-sm font-medium text-gray-700 transition-colors hover:bg-gray-100 hover:text-gray-900 {{ request()->routeIs('client.suivre-demande') ? 'bg-gray-100 text-gray-900' : '' }}">Suivre ma demande</a></li>
      @elseif(auth()->user()->role === 'charge_credit')
        <li><a href="{{ route('charge.dashboard') }}" class="block rounded-lg px-4 py-2 text-sm font-medium text-gray-700 transition-colors hover:bg-gray-100 hover:text-gray-900 {{ request()->routeIs('charge.dashboard') ? 'bg-gray-100 text-gray-900' : '' }}">Tableau de bord</a></li>
        <li><a href="{{ route('charge.demandes') }}" class="block rounded-lg px-4 py-2 text-sm font-medium text-gray-700 transition-colors hover:bg-gray-100 hover:text-gray-900 {{ request()->routeIs('charge.demandes') ? 'bg-gray-100 text-gray-900' : '' }}">Demandes à analyser</a></li>
      @elseif(auth()->user()->role === 'admin')
        <li><a href="{{ route('admin.dashboard') }}" class="block rounded-lg px-4 py-2 text-sm font-medium text-gray-700 transition-colors hover:bg-gray-100 hover:text-gray-900 {{ request()->routeIs('admin.dashboard') ? 'bg-gray-100 text-gray-900' : '' }}">Tableau de bord</a></li>
        <li><a href="{{ route('admin.comptes') }}" class="block rounded-lg px-4 py-2 text-sm font-medium text-gray-700 transition-colors hover:bg-gray-100 hover:text-gray-900 {{ request()->routeIs('admin.comptes') ? 'bg-gray-100 text-gray-900' : '' }}">Gestion des comptes</a></li>
        <li><a href="{{ route('admin.offres') }}" class="block rounded-lg px-4 py-2 text-sm font-medium text-gray-700 transition-colors hover:bg-gray-100 hover:text-gray-900 {{ request()->routeIs('admin.offres') ? 'bg-gray-100 text-gray-900' : '' }}">Offres de prêt</a></li>
      @endif
    </ul>
  </div>

  <div class="sticky inset-x-0 bottom-0 border-t border-gray-100"></div>
</div>