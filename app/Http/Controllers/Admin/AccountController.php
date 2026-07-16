<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Compte;
use Illuminate\Http\Request;
use Illuminate\Support\Str;



class AccountController extends Controller
{
    public function index()
    {
        $users = User::with('compte')->whereIn('role', ['client', 'charge_credit'])->get();
        return view('admin.comptes', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'role' => 'required|in:client,charge_credit',
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt(Str::random(16)),
            'role' => $request->role,
        ]);

        if ($request->role === 'client') {
            Compte::create([
                'user_id' => $user->id,
                'code' => Compte::genererCode(),
                'date_ouverture' => now(),
            ]);
        }

        return back()->with('success', 'Compte créé avec succès.');
    }
}