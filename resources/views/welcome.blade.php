<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>EasyLoan — PEBCo-BETHESDA</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-white">

    {{-- Navbar --}}
    <nav class="border-b border-gray-200 px-8 py-4 flex justify-between items-center">
        <span class="text-xl font-bold text-gray-800">EasyLoan</span>
        <div class="flex items-center gap-4">
            <span class="text-sm text-gray-500">Vous êtes un agent ?</span>
            <a href="{{ route('login') }}" class="border-2 border-blue-600 text-blue-600 font-semibold text-sm px-5 py-2 rounded-lg hover:bg-blue-50">
                Se connecter
            </a>
        </div>
    </nav>

    {{-- Hero --}}
    <section class="bg-blue-50 px-8 py-16 grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
        <div>
            <h1 class="text-4xl font-bold text-gray-800 leading-tight">
                Votre prêt, digitalisé<br>
                <span class="text-blue-600">de bout en bout.</span>
            </h1>
            <p class="text-gray-500 mt-4 max-w-md">
                PEBCo-BETHESDA rend la demande de prêt accessible en ligne :
                plus besoin de vous déplacer en agence pour suivre votre dossier.
            </p>
            <div class="flex gap-4 mt-6">
                <a href="{{ route('client.login') }}" class="bg-blue-600 text-white font-semibold px-6 py-3 rounded-lg hover:bg-blue-700">
                    Accéder à mon espace client (code)
                </a>
                 
            </div>
        </div>
        {{--section div suivante a modifier...--}}

        <div class="bg-white rounded-xl shadow-md p-6">
            <div class="w-full h-full flex items-center justify-center">
                <img src="{{ asset('images/image.png') }}" 
                alt="Visualisation Prêt et Investissement" 
                class="rounded-xl shadow-md w-full object-cover max-h-[300px]">
            </div>
        </div>
    </section>

    {{-- Comment ça marche --}}
    <section class="px-8 py-16">
        <h2 class="text-2xl font-bold text-gray-800 mb-8">Comment ça marche</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-white border border-gray-200 rounded-xl shadow-sm p-6">
                <p class="text-blue-600 font-semibold mb-2">1. Recevez votre code</p>
                <p class="text-gray-500 text-sm">Votre compte est créé par l'agence, vous recevez un code d'accès personnel.</p>
            </div>
            <div class="bg-white border border-gray-200 rounded-xl shadow-sm p-6">
                <p class="text-blue-600 font-semibold mb-2">2. Faites votre demande</p>
                <p class="text-gray-500 text-sm">Montant, durée, pièces justificatives... le tout en ligne, en quelques minutes.</p>
            </div>
            <div class="bg-white border border-gray-200 rounded-xl shadow-sm p-6">
                <p class="text-blue-600 font-semibold mb-2">3. Suivez en temps réel</p>
                <p class="text-gray-500 text-sm">Statut, observations du chargé de crédit, décision ,tout au même endroit.</p>
            </div>
        </div>
    </section>

    {{-- Footer --}}
    <footer class="bg-gray-800 text-white px-8 py-8">
        <p class="font-semibold">EasyLoan — PEBCo-BETHESDA</p>
        <p class="text-gray-400 text-sm mt-1">Système financier décentralisé béninois</p>
    </footer>

</body>
</html>