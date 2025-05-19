<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class StudentskiDom
 * 
 * @property int $id
 * @property string $naziv
 * @property string|null $adresa
 * @property int $kapacitet
 * @property int $kapacitet_menze
 * 
 * @property Collection|Soba[] $sobas
 * @property Collection|Blagajna[] $blagajnas
 * @property Collection|Zaposlenik[] $zaposleniks
 *
 * @package App\Models
 */
class StudentskiDom extends Model
{
	protected $table = 'studentski_dom';
	public $timestamps = false;

	protected $casts = [
		'kapacitet' => 'int',
		'kapacitet_menze' => 'int'
	];

	protected $fillable = [
		'naziv',
		'adresa',
		'kapacitet',
		'kapacitet_menze'
	];

	public function sobas()
	{
		return $this->hasMany(Soba::class, 'id_doma');
	}

	public function blagajnas()
	{
		return $this->hasMany(Blagajna::class, 'id_doma');
	}

	public function zaposleniks()
	{
		return $this->hasMany(Zaposlenik::class, 'id_doma');
	}
}
