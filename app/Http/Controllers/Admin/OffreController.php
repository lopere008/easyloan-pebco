<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OffrePret;
use Illuminate\Http\Request;

class OffreController extends Controller
{
    public function index()
    {
        $offres = OffrePret::all();
        return view('admin.offres', compact('offres'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string',
            'montant_min' => 'required|numeric',
            'montant_max' => 'required|numeric|gte:montant_min',
            'taux' => 'required|numeric',
            'duree_min' => 'required|integer',
            'duree_max' => 'required|integer|gte:duree_min',
        ]);

        OffrePret::create($request->all());

        return back()->with('success', 'Offre créée avec succès.');
    }
}