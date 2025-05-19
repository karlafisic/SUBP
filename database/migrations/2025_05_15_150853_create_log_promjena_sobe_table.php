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
        Schema::create('log_promjena_sobe', function (Blueprint $table) {
            $table->increments('id_log');
            $table->integer('id_studenta')->nullable();
            $table->integer('stara_soba')->nullable();
            $table->integer('nova_soba')->nullable();
            $table->timestamp('datum_promjene')->nullable()->useCurrent();
            $table->string('korisnik', 100)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('log_promjena_sobe');
    }
};
