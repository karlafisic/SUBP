<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class LogPromjenaSobe
 * 
 * @property int $id_log
 * @property int|null $id_studenta
 * @property int|null $stara_soba
 * @property int|null $nova_soba
 * @property Carbon|null $datum_promjene
 * @property string|null $korisnik
 *
 * @package App\Models
 */
class LogPromjenaSobe extends Model
{
	protected $table = 'log_promjena_sobe';
	protected $primaryKey = 'id_log';
	public $timestamps = false;

	protected $casts = [
		'id_studenta' => 'int',
		'stara_soba' => 'int',
		'nova_soba' => 'int',
		'datum_promjene' => 'datetime'
	];

	protected $fillable = [
		'id_studenta',
		'stara_soba',
		'nova_soba',
		'datum_promjene',
		'korisnik'
	];
}
