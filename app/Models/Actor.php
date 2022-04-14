<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Actor
 *
 * @property int $id
 * @property string $name
 * @property string $img
 * @property string $slug
 * @property string $detail
 * @property int $gender
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|Actor newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Actor newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Actor query()
 * @method static \Illuminate\Database\Eloquent\Builder|Actor whereDetail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Actor whereGender($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Actor whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Actor whereImg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Actor whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Actor whereSlug($value)
 * @mixin \Eloquent
 */
class Actor extends Model
{
	protected $table = 'actor';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id' => 'int',
		'gender' => 'int'
	];

	protected $fillable = [
		'name',
		'img',
		'slug',
		'detail',
		'gender'
	];
}
