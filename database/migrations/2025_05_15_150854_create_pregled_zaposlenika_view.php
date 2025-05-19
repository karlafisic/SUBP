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
        DB::statement("CREATE VIEW \"pregled_zaposlenika\" AS SELECT ime,
    prezime,
    pozicija,
    id_blagajne
   FROM zaposlenik
  WHERE (id_blagajne IS NOT NULL);");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("DROP VIEW IF EXISTS \"pregled_zaposlenika\"");
    }
};
