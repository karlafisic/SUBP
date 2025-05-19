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
        Schema::table('soba', function (Blueprint $table) {
            $table->foreign(['id_doma'], 'soba_id_doma_fkey')->references(['id'])->on('studentski_dom')->onUpdate('no action')->onDelete('cascade');
            $table->foreign(['id_tipa_sobe'], 'soba_id_tipa_sobe_fkey')->references(['id'])->on('tip_sobe')->onUpdate('no action')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('soba', function (Blueprint $table) {
            $table->dropForeign('soba_id_doma_fkey');
            $table->dropForeign('soba_id_tipa_sobe_fkey');
        });
    }
};
