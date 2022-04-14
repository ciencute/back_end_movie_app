<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Director
 *
 * @property int $id
 * @property string $name
 * @property string $detail
 * @property string $slug
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|Director newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Director newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Director query()
 * @method static \Illuminate\Database\Eloquent\Builder|Director whereDetail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Director whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Director whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Director whereSlug($value)
 * @mixin \Eloquent
 */
class Director extends Model
{
	protected $table = 'director';
	public $timestamps = false;

	protected $fillable = [
		'name',
		'detail',
		'slug'
	];
}
