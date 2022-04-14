<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Tag
 *
 * @property int $id
 * @property string $name
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|Tag newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Tag newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Tag query()
 * @method static \Illuminate\Database\Eloquent\Builder|Tag whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tag whereName($value)
 * @mixin \Eloquent
 */
class Tag extends Model
{
	protected $table = 'tag';
	public $timestamps = false;

	protected $fillable = [
		'name'
	];
}
