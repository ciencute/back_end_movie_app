<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Favorite
 *
 * @property int $id
 * @property int $movieId
 * @property int $userId
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|FavoriteMovie newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FavoriteMovie newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FavoriteMovie query()
 * @method static \Illuminate\Database\Eloquent\Builder|FavoriteMovie whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FavoriteMovie whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FavoriteMovie whereMovieId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FavoriteMovie whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FavoriteMovie whereUserId($value)
 * @mixin \Eloquent
 */
class FavoriteMovie extends Model
{
	protected $table = 'favorite_movie';
    public $timestamps =false;

	protected $casts = [
		'movieId' => 'int',
		'userId' => 'int'
	];

	protected $fillable = [
		'movieId',
		'userId'
	];
}
