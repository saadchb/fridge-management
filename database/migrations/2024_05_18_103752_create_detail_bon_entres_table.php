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
        Schema::create('detail_bon_entres', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('bon_entre_id');
            $table->foreign('bon_entre_id')->references('id')->on('bon_entres');
            $table->unsignedBigInteger('conditionnement_id');
            $table->foreign('conditionnement_id')->references('id')->on('conditionnements');
            $table->unsignedBigInteger('produit_id');
            $table->foreign('produit_id')->references('id')->on('produits');
            $table->double("qte");
            $table->double("prix");
          
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('_detail_bon_entre');
    }
};
