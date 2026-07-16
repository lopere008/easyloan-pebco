<?php
namespace App\Http\Controllers\ChargeCredit;

use App\Http\Controllers\Controller;
use App\Models\DemandePret;
use Illuminate\Http\Request;

class DecisionController extends Controller
{
    public function store(Request $request, DemandePret $demande)
    {
        $request->validate(['type_decision' => 'required|in:acceptee,refusee']);

        $demande->decision()->create([
            'user_id' => auth()->id(),
            'type_decision' => $request->type_decision,
        ]);

        $demande->update(['statut' => $request->type_decision]);

        return redirect()->route('charge.demandes')->with('success', 'Décision enregistrée et notifiée au client.');
    }
}