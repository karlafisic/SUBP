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
        DB::statement("CREATE VIEW \"privilegije_za_korisnike\" AS SELECT grantee AS korisnik,
    privilege_type AS privilegija,
    table_name AS objekt,
    table_schema AS shema
   FROM information_schema.role_table_grants
  WHERE ((grantee)::name = ANY (ARRAY['karla'::name, 'korisnik'::name]));");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("DROP VIEW IF EXISTS \"privilegije_za_korisnike\"");
    }
};
