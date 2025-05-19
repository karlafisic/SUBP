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
        Schema::table('racun', function (Blueprint $table) {
            $table->foreign(['id_blagajne'], 'racun_id_blagajne_fkey')->references(['id'])->on('blagajna')->onUpdate('no action')->onDelete('cascade');
            $table->foreign(['id_studenta'], 'racun_id_studenta_fkey')->references(['id'])->on('student')->onUpdate('no action')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('racun', function (Blueprint $table) {
            $table->dropForeign('racun_id_blagajne_fkey');
            $table->dropForeign('racun_id_studenta_fkey');
        });
    }
};
