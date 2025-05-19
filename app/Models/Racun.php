<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Racun
 * 
 * @property int $id
 * @property int $id_studenta
 * @property int $id_blagajne
 * @property float $iznos
 * @property string $naziv
 * @property Carbon $datum_uplate
 * 
 * @property Student $student
 * @property Blagajna $blagajna
 *
 * @package App\Models
 */
class Racun extends Model
{
	protected $table = 'racun';
	public $timestamps = false;

	protected $casts = [
		'id_studenta' => 'int',
		'id_blagajne' => 'int',
		'iznos' => 'float',
		'datum_uplate' => 'datetime'
	];

	protected $fillable = [
		'id_studenta',
		'id_blagajne',
		'iznos',
		'naziv',
		'datum_uplate'
	];

	public function student()
	{
		return $this->belongsTo(Student::class, 'id_studenta');
	}

	public function blagajna()
	{
		return $this->belongsTo(Blagajna::class, 'id_blagajne');
	}
}
