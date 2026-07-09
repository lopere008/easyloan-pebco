<div {{ $attributes->merge(['class' => 'bg-white overflow-hidden shadow-sm rounded-lg p-6']) }}>
    <div class="flex items-center justify-between mb-4">
        <div>
            <h3 class="text-lg font-semibold text-gray-800">{{ $title }}</h3>
            @if($subtitle)
                <p class="text-sm text-gray-500 mt-1">{{ $subtitle }}</p>
            @endif
        </div>

        {{-- Slot optionnel pour un bouton d'action en haut à droite de la card --}}
        @isset($action)
            <div>
                {{ $action }}
            </div>
        @endisset
    </div>

    <div class="text-gray-700">
        {{ $slot }}
    </div>
</div>