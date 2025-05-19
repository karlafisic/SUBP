<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TipSobe
 * 
 * @property int $id
 * @property string $naziv
 * 
 * @property Collection|Soba[] $sobas
 *
 * @package App\Models
 */
class TipSobe extends Model
{
	protected $table = 'tip_sobe';
	public $timestamps = false;

	protected $fillable = [
		'naziv'
	];

	public function sobas()
	{
		return $this->hasMany(Soba::class, 'id_tipa_sobe');
	}
}
