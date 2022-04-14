<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class MovieActor
 *
 * @property int $id
 * @property int $actorId
 * @property int $movieId
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|MovieActor newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MovieActor newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MovieActor query()
 * @method static \Illuminate\Database\Eloquent\Builder|MovieActor whereActorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MovieActor whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MovieActor whereMovieId($value)
 * @mixin \Eloquent
 */
class MovieActor extends Model
{
	protected $table = 'movie_actor';
	public $timestamps = false;

	protected $casts = [
		'actorId' => 'int',
		'movieId' => 'int'
	];

	protected $fillable = [
		'actorId',
		'movieId'
	];
}
