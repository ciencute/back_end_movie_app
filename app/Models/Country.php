<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Country
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $slug
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|Country newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Country newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Country query()
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereSlug($value)
 * @mixin \Eloquent
 */
class Country extends Model
{
	protected $table = 'country';
	public $timestamps = false;

	protected $fillable = [
		'name',
		'description',
		'slug'
	];
}
