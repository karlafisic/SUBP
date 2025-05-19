<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Student
 * 
 * @property int $id
 * @property string $ime
 * @property string $prezime
 * @property Carbon $datum_rodenja
 * @property int $id_fakulteta
 * @property int $id_sobe
 * 
 * @property Fakultet $fakultet
 * @property Soba $soba
 * @property Collection|Racun[] $racuns
 *
 * @package App\Models
 */
class Student extends Model
{
	protected $table = 'student';
	public $timestamps = false;

	protected $casts = [
		'datum_rodenja' => 'datetime',
		'id_fakulteta' => 'int',
		'id_sobe' => 'int'
	];

	protected $fillable = [
		'ime',
		'prezime',
		'datum_rodenja',
		'id_fakulteta',
		'id_sobe'
	];

	public function fakultet()
	{
		return $this->belongsTo(Fakultet::class, 'id_fakulteta');
	}

	public function soba()
	{
		return $this->belongsTo(Soba::class, 'id_sobe');
	}

	public function racuns()
	{
		return $this->hasMany(Racun::class, 'id_studenta');
	}
}
