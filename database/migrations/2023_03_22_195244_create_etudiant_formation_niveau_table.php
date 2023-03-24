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
        Schema::create('etudiant_formation_niveau', function (Blueprint $table) {
            $table->id();
            $table->integer('etudiant_phone');
            $table->foreign('etudiant_phone')->references('phone')->on('etudiants');
            $table->string('niveau_code')->nullable();
            $table->foreign('niveau_code')->references('code')->on('niveaux');
            $table->foreignId('formation_id')->constrained('formations');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('etudiant_formation_niveau');
    }
};
