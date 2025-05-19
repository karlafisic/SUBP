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
        Schema::table('zaposlenik', function (Blueprint $table) {
            $table->foreign(['id_blagajne'], 'zaposlenik_id_blagajne_fkey')->references(['id'])->on('blagajna')->onUpdate('no action')->onDelete('set null');
            $table->foreign(['id_doma'], 'zaposlenik_id_doma_fkey')->references(['id'])->on('studentski_dom')->onUpdate('no action')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('zaposlenik', function (Blueprint $table) {
            $table->dropForeign('zaposlenik_id_blagajne_fkey');
            $table->dropForeign('zaposlenik_id_doma_fkey');
        });
    }
};
