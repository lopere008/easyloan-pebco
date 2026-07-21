<?php
namespace App\Http\Controllers\ChargeCredit;

use App\Http\Controllers\Controller;
use App\Models\DemandePret;

class DemandeController extends Controller
{
    public function index()
    {
        $demandes = DemandePret::with('compte.user')->latest()->get();
        return view('charge.demandes', compact('demandes'));
    }

    public function show(DemandePret $demande)
    {
        $demande->load('compte.user', 'observations.auteur', 'decision');
        return view('charge.demande-detail', compact('demande'));
    }

    public function dashboard()
    {
        $stats = [
            'total' => DemandePret::count(),
            'en_attente' => DemandePret::where('statut', 'en_attente')->count(),
            'acceptees' => DemandePret::where('statut', 'acceptee')->count(),
            'refusees' => DemandePret::where('statut', 'refusee')->count(),
        ];
        return view('charge.dashboard', compact('stats'));
    }
}    
