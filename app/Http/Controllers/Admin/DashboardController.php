<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\DemandePret;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'clients' => User::where('role', 'client')->count(),
            'charges' => User::where('role', 'charge_credit')->count(),
            'demandes_total' => DemandePret::count(),
            'montant_total' => DemandePret::where('statut', 'acceptee')->sum('montant'),
        ];
        return view('admin.dashboard', compact('stats'));
        
    }
}