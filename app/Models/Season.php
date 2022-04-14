<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Season
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|Season newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Season newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Season query()
 * @method static \Illuminate\Database\Eloquent\Builder|Season whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Season whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Season whereName($value)
 * @mixin \Eloquent
 */
class Season extends Model
{
	protected $table = 'season';
	public $timestamps = false;

	protected $fillable = [
		'name',
		'description'
	];
}
