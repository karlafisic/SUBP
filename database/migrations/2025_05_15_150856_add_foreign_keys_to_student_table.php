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
        Schema::table('student', function (Blueprint $table) {
            $table->foreign(['id_fakulteta'], 'student_id_fakulteta_fkey')->references(['id'])->on('fakultet')->onUpdate('no action')->onDelete('cascade');
            $table->foreign(['id_sobe'], 'student_id_sobe_fkey')->references(['id'])->on('soba')->onUpdate('no action')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('student', function (Blueprint $table) {
            $table->dropForeign('student_id_fakulteta_fkey');
            $table->dropForeign('student_id_sobe_fkey');
        });
    }
};
