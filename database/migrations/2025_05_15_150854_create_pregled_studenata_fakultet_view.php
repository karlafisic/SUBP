<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement("CREATE VIEW \"pregled_studenata_fakultet\" AS SELECT s.ime,
    s.prezime,
    f.naziv AS naziv_fakulteta
   FROM (student s
     JOIN fakultet f ON ((s.id_fakulteta = f.id)));");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("DROP VIEW IF EXISTS \"pregled_studenata_fakultet\"");
    }
};
