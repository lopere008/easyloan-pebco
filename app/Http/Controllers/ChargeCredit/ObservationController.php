<?php
namespace App\Http\Controllers\ChargeCredit;

use App\Http\Controllers\Controller;
use App\Models\DemandePret;
use Illuminate\Http\Request;

class ObservationController extends Controller
{
    public function store(Request $request, DemandePret $demande)
    {
        $request->validate(['contenu' => 'required|string']);

        $demande->observations()->create([
            'user_id' => auth()->id(),
            'contenu' => $request->contenu,
        ]);

        return back()->with('success', 'Observation ajoutée.');
    }
}