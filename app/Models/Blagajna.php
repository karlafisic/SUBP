<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Blagajna
 * 
 * @property int $id
 * @property float $saldo
 * @property int $id_doma
 * 
 * @property StudentskiDom $studentski_dom
 * @property Collection|Zaposlenik[] $zaposleniks
 * @property Collection|Racun[] $racuns
 *
 * @package App\Models
 */
class Blagajna extends Model
{
	protected $table = 'blagajna';
	public $timestamps = false;

	protected $casts = [
		'saldo' => 'float',
		'id_doma' => 'int'
	];

	protected $fillable = [
		'saldo',
		'id_doma'
	];

	public function studentski_dom()
	{
		return $this->belongsTo(StudentskiDom::class, 'id_doma');
	}

	public function zaposleniks()
	{
		return $this->hasMany(Zaposlenik::class, 'id_blagajne');
	}

	public function racuns()
	{
		return $this->hasMany(Racun::class, 'id_blagajne');
	}
}
