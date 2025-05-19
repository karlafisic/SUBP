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
        Schema::create('racun', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_studenta');
            $table->integer('id_blagajne');
            $table->decimal('iznos', 10);
            $table->string('naziv');
            $table->date('datum_uplate');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('racun');
    }
};
