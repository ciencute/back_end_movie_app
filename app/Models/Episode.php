<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Episode
 *
 * @property int $id
 * @property string $name
 * @property int $movieId
 * @property string $url
 * @property int $seasonId
 * @property Carbon|null $createdAt
 * @property Carbon|null $updatedAt
 * @property string $slug
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|Episode newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Episode newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Episode query()
 * @method static \Illuminate\Database\Eloquent\Builder|Episode whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Episode whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Episode whereMovieId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Episode whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Episode whereSeasonId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Episode whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Episode whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Episode whereUrl($value)
 * @mixin \Eloquent
 */
class Episode extends Model
{
	protected $table = 'episode';
	public $timestamps = false;

	protected $casts = [
		'movieId' => 'int',
		'seasonId' => 'int'
	];

	protected $dates = [
		'createdAt',
		'updatedAt'
	];

	protected $fillable = [
		'name',
		'movieId',
		'url',
		'seasonId',
		'createdAt',
		'updatedAt',
		'slug'
	];
}
