<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Fakultet
 * 
 * @property int $id
 * @property string $naziv
 * @property string $adresa
 * 
 * @property Collection|Student[] $students
 *
 * @package App\Models
 */
class Fakultet extends Model
{
	protected $table = 'fakultet';
	public $timestamps = false;

	protected $fillable = [
		'naziv',
		'adresa'
	];

	public function students()
	{
		return $this->hasMany(Student::class, 'id_fakulteta');
	}
}
