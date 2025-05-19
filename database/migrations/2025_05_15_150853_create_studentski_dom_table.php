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
        Schema::create('studentski_dom', function (Blueprint $table) {
            $table->increments('id');
            $table->string('naziv', 100);
            $table->string('adresa')->nullable();
            $table->integer('kapacitet');
            $table->integer('kapacitet_menze');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('studentski_dom');
    }
};
