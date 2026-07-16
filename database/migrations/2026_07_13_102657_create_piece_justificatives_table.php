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
        Schema::create('piece_justificatives', function (Blueprint $table) {
            $table->id();
            $table->foreignId('demande_pret_id')->constrained()->cascadeOnDelete();
            $table->string('type');
            $table->string('chemin_fichier');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('piece_justificatives');
    }
};
