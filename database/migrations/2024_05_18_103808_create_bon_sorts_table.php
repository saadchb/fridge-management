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
        Schema::create('bon_sorts', function (Blueprint $table) {
                $table->id();
                $table->date("date");
                $table->text("observation");
                $table->unsignedBigInteger('vendeur_id');
                $table->foreign('vendeur_id')->references('id')->on('vendeurs');
                $table->timestamps();
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bon_sort');
    }
};
