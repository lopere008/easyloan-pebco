<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ClientAuthController;
use App\Http\Controllers\ClientDashboardController;
use App\Http\Controllers\Admin\AccountController;
use App\Http\Controllers\ChargeCredit\DemandeController;
use App\Http\Controllers\ChargeCredit\ObservationController;
use App\Http\Controllers\ChargeCredit\DecisionController;
use App\Http\Controllers\Admin\OffreController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;

// 1. Page d'accueil avec redirection automatique si déjà connecté
Route::get('/', function () {
    if (auth()->check()) {
        return redirect()->route('dashboard');
    }
    return view('welcome');
});

// 2. Redirection Dashboard selon le rôle
Route::get('/dashboard', function () {
    $user = auth()->user();

    return match($user->role) {
        'charge_credit' => redirect()->route('charge.dashboard'),
        'admin' => redirect()->route('admin.dashboard'),
        default => redirect()->route('client.dashboard'),
    };
})->middleware(['auth'])->name('dashboard');

// 3. Profil utilisateur
Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

// 4. Inclusion des routes d'authentification (y compris votre Volt::route pour le client)
require __DIR__.'/auth.php';

// On ne garde QUE le POST pour le traitement de la connexion client
Route::get('/espace-client', [ClientAuthController::class, 'showForm'])->name('client.login');
Route::post('/espace-client', [ClientAuthController::class, 'login'])->name('client.login.submit');

// 5. Espace Chargé de Crédit (Regroupé)
Route::prefix('charge-credit')->name('charge.')->middleware(['auth', 'role:charge_credit'])->group(function () {
    Route::get('/dashboard', [DemandeController::class, 'dashboard'])->name('dashboard');
    Route::get('/demandes', [DemandeController::class, 'index'])->name('demandes');
    Route::get('/demandes/{demande}', [DemandeController::class, 'show'])->name('demandes.show');
    Route::post('/demandes/{demande}/observations', [ObservationController::class, 'store'])->name('observations.store');
    Route::post('/demandes/{demande}/decisions', [DecisionController::class, 'store'])->name('decisions.store');
});

// 6. Espace Administrateur (Regroupé et sécurisé)
Route::prefix('admin')->name('admin.')->middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::get('/offres', [OffreController::class, 'index'])->name('offres');
    Route::post('/offres', [OffreController::class, 'store'])->name('offres.store');
    Route::get('/comptes', [AccountController::class, 'index'])->name('comptes');
    Route::post('/comptes', [AccountController::class, 'store'])->name('comptes.store');
});

// 7. Espace Client (Connecté)
Route::middleware(['auth', 'role:client'])->prefix('client')->name('client.')->group(function () {
    Route::get('/dashboard', [ClientDashboardController::class, 'index'])->name('dashboard');
    Route::get('/informations', [ClientDashboardController::class, 'informations'])->name('informations');
    Route::get('/faire-pret', [ClientDashboardController::class, 'formulairePret'])->name('faire-pret');
    Route::post('/faire-pret', [ClientDashboardController::class, 'soumettrePret'])->name('soumettre-pret');
    Route::get('/suivre-demande', [ClientDashboardController::class, 'suivreDemande'])->name('suivre-demande');
});