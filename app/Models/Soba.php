<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Soba
 * 
 * @property int $id
 * @property int $broj_sobe
 * @property int $id_doma
 * @property int $id_tipa_sobe
 * 
 * @property StudentskiDom $studentski_dom
 * @property TipSobe $tip_sobe
 * @property Collection|Student[] $students
 *
 * @package App\Models
 */
class Soba extends Model
{
	protected $table = 'soba';
	public $timestamps = false;

	protected $casts = [
		'broj_sobe' => 'int',
		'id_doma' => 'int',
		'id_tipa_sobe' => 'int'
	];

	protected $fillable = [
		'broj_sobe',
		'id_doma',
		'id_tipa_sobe'
	];

	public function studentski_dom()
	{
		return $this->belongsTo(StudentskiDom::class, 'id_doma');
	}

	public function tip_sobe()
	{
		return $this->belongsTo(TipSobe::class, 'id_tipa_sobe');
	}

	public function students()
	{
		return $this->hasMany(Student::class, 'id_sobe');
	}
}
