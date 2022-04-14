<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Slider
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $imageUrl
 * @property int $displayOrder
 * @property string $targetUrl
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|Slider newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Slider newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Slider query()
 * @method static \Illuminate\Database\Eloquent\Builder|Slider whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slider whereDisplayOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slider whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slider whereImageUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slider whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slider whereTargetUrl($value)
 * @mixin \Eloquent
 */
class Slider extends Model
{
	protected $table = 'slider';
	public $timestamps = false;

	protected $casts = [
		'displayOrder' => 'int'
	];

	protected $fillable = [
		'name',
		'description',
		'imageUrl',
		'displayOrder',
		'targetUrl'
	];
}
