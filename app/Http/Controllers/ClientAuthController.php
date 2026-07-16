<?php

namespace App\Http\Controllers; 

class ClientAuthController extends Controller
{
    public function showForm()
    {
        return view('auth.client-login');
    }

    public function login(Request $request)
    {
        $request->validate(['code' => 'required|string']);

        $compte = Compte::where('code', strtoupper($request->code))->first();

        if (!$compte) {
            return back()->withErrors(['code' => 'Code invalide. Vérifiez et réessayez.']);
        }

        Auth::login($compte->user);

        return redirect()->route('dashboard');
    }
}
