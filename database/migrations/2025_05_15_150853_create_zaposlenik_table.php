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
        Schema::create('zaposlenik', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ime', 100);
            $table->string('prezime', 100);
            $table->string('pozicija', 100);
            $table->integer('id_blagajne')->nullable();
            $table->integer('id_doma');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('zaposlenik');
    }
};
