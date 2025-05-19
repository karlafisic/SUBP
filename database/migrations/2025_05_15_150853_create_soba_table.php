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
        Schema::create('soba', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('broj_sobe');
            $table->integer('id_doma');
            $table->integer('id_tipa_sobe');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('soba');
    }
};
