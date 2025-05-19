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
        Schema::table('blagajna', function (Blueprint $table) {
            $table->foreign(['id_doma'], 'blagajna_id_doma_fkey')->references(['id'])->on('studentski_dom')->onUpdate('no action')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('blagajna', function (Blueprint $table) {
            $table->dropForeign('blagajna_id_doma_fkey');
        });
    }
};
