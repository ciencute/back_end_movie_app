<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class MovieRating
 *
 * @property int $id
 * @property int $movieId
 * @property int $userId
 * @property Carbon|null $createdAt
 * @property Carbon|null $updatedAt
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|MovieRating newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MovieRating newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MovieRating query()
 * @method static \Illuminate\Database\Eloquent\Builder|MovieRating whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MovieRating whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MovieRating whereMovieId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MovieRating whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MovieRating whereUserId($value)
 * @mixin \Eloquent
 */
class MovieRating extends Model
{
	protected $table = 'movie_rating';
	public $timestamps = false;

	protected $casts = [
		'movieId' => 'int',
		'userId' => 'int'
	];

	protected $dates = [
		'createdAt',
		'updatedAt'
	];

	protected $fillable = [
		'movieId',
		'userId',
		'createdAt',
		'updatedAt'
	];
}
