<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
{
    Schema::create('demande_prets', function (Blueprint $table) {
        $table->id();
        $table->foreignId('compte_id')->constrained()->cascadeOnDelete();
        $table->foreignId('offre_pret_id')->nullable()->constrained()->nullOnDelete();
        $table->decimal('montant', 12, 2);
        $table->integer('duree');
        $table->enum('statut', ['en_attente', 'acceptee', 'refusee'])->default('en_attente');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('demande_prets');
    }
};
