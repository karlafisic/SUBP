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
        DB::statement("CREATE VIEW \"pregled_soba_studenata\" AS SELECT sb.broj_sobe,
    ts.naziv AS tip_sobe,
    count(s.id) AS ukupno_studenata
   FROM ((soba sb
     JOIN tip_sobe ts ON ((sb.id_tipa_sobe = ts.id)))
     LEFT JOIN student s ON ((s.id_sobe = sb.id)))
  GROUP BY sb.broj_sobe, ts.naziv;");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("DROP VIEW IF EXISTS \"pregled_soba_studenata\"");
    }
};
