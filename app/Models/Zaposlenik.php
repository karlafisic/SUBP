<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Zaposlenik
 * 
 * @property int $id
 * @property string $ime
 * @property string $prezime
 * @property string $pozicija
 * @property int|null $id_blagajne
 * @property int $id_doma
 * 
 * @property Blagajna|null $blagajna
 * @property StudentskiDom $studentski_dom
 *
 * @package App\Models
 */
class Zaposlenik extends Model
{
	protected $table = 'zaposlenik';
	public $timestamps = false;

	protected $casts = [
		'id_blagajne' => 'int',
		'id_doma' => 'int'
	];

	protected $fillable = [
		'ime',
		'prezime',
		'pozicija',
		'id_blagajne',
		'id_doma'
	];

	public function blagajna()
	{
		return $this->belongsTo(Blagajna::class, 'id_blagajne');
	}

	public function studentski_dom()
	{
		return $this->belongsTo(StudentskiDom::class, 'id_doma');
	}
}
