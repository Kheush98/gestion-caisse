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
        Schema::create('paiements', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('montant');
            $table->string('type');
            $table->string('modePaiement')->nullable();
            $table->integer('etudiant_phone');
            $table->foreign('etudiant_phone')->references('phone')->on('etudiants');
            $table->string('niveau_code')->nullable();
            $table->foreign('niveau_code')->references('code')->on('niveaux');
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('facture_id')->nullable()->constrained('factures');
            $table->date('date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paiements');
    }
};
