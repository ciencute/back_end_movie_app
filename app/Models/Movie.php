<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Movie
 *
 * @property int $id
 * @property string $title
 * @property string $original_title
 * @property string $img
 * @property string $url
 * @property string|null $embededCode
 * @property string|null $trailerKey
 * @property int|null $directorId
 * @property string $bgImg
 * @property string $description
 * @property string|null $countryId
 * @property int $duration
 * @property int $viewCount
 * @property int $categoryId
 * @property string $slug
 * @property float $imdb
 * @property int $isMovie18
 * @property int $isFinished
 * @property int $isMovieSeries
 * @property int $totalEpisode
 * @property string $quality
 * @property string|null $publishedAt
 * @property Carbon|null $createdAt
 * @property Carbon|null $updatedAt
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|Movie newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Movie newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Movie query()
 * @method static \Illuminate\Database\Eloquent\Builder|Movie whereBgImg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Movie whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Movie whereCountryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Movie whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Movie whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Movie whereDirectorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Movie whereDuration($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Movie whereEmbededCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Movie whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Movie whereImdb($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Movie whereImg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Movie whereIsFinished($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Movie whereIsMovie18($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Movie whereIsMovieSeries($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Movie whereOriginalTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Movie wherePublishedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Movie whereQuality($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Movie whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Movie whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Movie whereTotalEpisode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Movie whereTrailerKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Movie whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Movie whereUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Movie whereViewCount($value)
 * @mixin \Eloquent
 */
class Movie extends Model
{
	protected $table = 'movie';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id' => 'int',
		'directorId' => 'int',
		'duration' => 'int',
		'viewCount' => 'int',
		'categoryId' => 'int',
        'countryId' => 'int',
        'imdb' => 'float',
		'isMovie18' => 'int',
		'isFinished' => 'int',
		'isMovieSeries' => 'int',
		'totalEpisode' => 'int',
        'url' =>'string'
	];

	protected $dates = [
		'createdAt',
		'updatedAt'
	];

	protected $fillable = [
		'title',
		'original_title',
		'img',
		'url',
		'embededCode',
		'trailerKey',
		'directorId',
		'bgImg',
		'description',
		'countryId',
		'duration',
		'viewCount',
		'categoryId',
		'slug',
		'imdb',
		'isMovie18',
		'isFinished',
		'isMovieSeries',
		'totalEpisode',
		'quality',
		'publishedAt',
		'createdAt',
		'updatedAt'
	];
}
