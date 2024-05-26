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
        Schema::create('reglement_vendeurs', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->double('montant');
            $table->text('observation');
            $table->unsignedBigInteger('mode_id');
            $table->unsignedBigInteger('vendeur_id');
            $table->foreign('mode_id')->references('id')->on('modes');
            $table->foreign('vendeur_id')->references('id')->on('vendeurs');
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
