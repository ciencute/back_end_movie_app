<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class MovieTag
 *
 * @property int $id
 * @property int $movieId
 * @property int $tagId
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|MovieTag newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MovieTag newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MovieTag query()
 * @method static \Illuminate\Database\Eloquent\Builder|MovieTag whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MovieTag whereMovieId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MovieTag whereTagId($value)
 * @mixin \Eloquent
 */
class MovieTag extends Model
{
	protected $table = 'movie_tag';
	public $timestamps = false;

	protected $casts = [
		'movieId' => 'int',
		'tagId' => 'int'
	];

	protected $fillable = [
		'movieId',
		'tagId'
	];
}
