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
    Schema::create('offre_prets', function (Blueprint $table) {
        $table->id();
        $table->string('nom');
        $table->decimal('montant_min', 12, 2);
        $table->decimal('montant_max', 12, 2);
        $table->decimal('taux', 5, 2);
        $table->integer('duree_min');
        $table->integer('duree_max');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('offre_prets');
    }
};
