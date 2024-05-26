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
        Schema::create('detail_bon_livraisons', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('bon_livraison_id');
            $table->foreign('bon_livraison_id')->references('id')->on('bon_livraisons');
            $table->unsignedBigInteger('conditionnement_id');
            $table->foreign('conditionnement_id')->references('id')->on('conditionnements');
            $table->unsignedBigInteger('produit_id');
            $table->foreign('produit_id')->references('id')->on('produits');
            $table->double("qte");
            $table->double("prix_vente");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_bon_livraison');
    }
};
