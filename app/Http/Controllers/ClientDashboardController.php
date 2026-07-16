<?php

namespace App\Http\Controllers;

use App\Models\DemandePret;
use Illuminate\Http\Request;

class ClientDashboardController extends Controller
{
    public function index()
    {
        $compte = auth()->user()->compte;
        $demandes = $compte ? $compte->demandePrets()->latest()->get() : collect();
        return view('client.dashboard', compact('demandes'));
    }

    public function informations()
    {
        return view('client.informations');
    }

    public function formulairePret()
    {
        $compte = auth()->user()->compte;

        if (!$compte || !$compte->estEligible()) {
            return redirect()->route('client.dashboard')
                ->withErrors(['eligibilite' => 'Vous n\'êtes pas encore éligible à un prêt.']);
        }

    $offres = \App\Models\OffrePret::all();
    return view('client.faire-pret', compact('offres'));
    }
    public function soumettrePret(Request $request)
    {
        $request->validate([
            'montant' => 'required|numeric|min:1',
            'duree' => 'required|integer|min:1',
        ]);

        $compte = auth()->user()->compte;

        if (!$compte->estEligible()) {
            return redirect()->route('client.dashboard')
                ->withErrors(['eligibilite' => 'Vous n\'êtes pas éligible à un prêt.']);
        }

        DemandePret::create([
            'compte_id' => $compte->id,
            'offre_pret_id' => $request->offre_pret_id,
            'montant' => $request->montant,
            'duree' => $request->duree,
            'statut' => 'en_attente',
        ]);

        return redirect()->route('client.suivre-demande')
            ->with('success', 'Votre demande a été soumise avec succès.');
    }

    public function suivreDemande()
    {
        $demandes = auth()->user()->compte
            ->demandePrets()
            ->with('observations')
            ->latest()
            ->get();

        return view('client.suivre-demande', compact('demandes'));
    }
}