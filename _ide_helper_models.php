<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
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
	class Actor extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Category
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $slug
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|Category newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Category newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Category query()
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereSlug($value)
 * @mixin \Eloquent
 */
	class Category extends \Eloquent {}
}

namespace App\Models{
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
	class Country extends \Eloquent {}
}

namespace App\Models{
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
	class Director extends \Eloquent {}
}

namespace App\Models{
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
	class Episode extends \Eloquent {}
}

namespace App\Models{
/**
 * Class FailedJob
 *
 * @property int $id
 * @property string $uuid
 * @property string $connection
 * @property string $queue
 * @property string $payload
 * @property string $exception
 * @property Carbon $failed_at
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|FailedJob newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FailedJob newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FailedJob query()
 * @method static \Illuminate\Database\Eloquent\Builder|FailedJob whereConnection($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FailedJob whereException($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FailedJob whereFailedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FailedJob whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FailedJob wherePayload($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FailedJob whereQueue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FailedJob whereUuid($value)
 * @mixin \Eloquent
 */
	class FailedJob extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Favorite
 *
 * @property int $id
 * @property int $movieId
 * @property int $userId
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|Favorite newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Favorite newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Favorite query()
 * @method static \Illuminate\Database\Eloquent\Builder|Favorite whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Favorite whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Favorite whereMovieId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Favorite whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Favorite whereUserId($value)
 * @mixin \Eloquent
 */
	class Favorite extends \Eloquent {}
}

namespace App\Models{
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
	class Movie extends \Eloquent {}
}

namespace App\Models{
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
	class MovieActor extends \Eloquent {}
}

namespace App\Models{
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
	class MovieRating extends \Eloquent {}
}

namespace App\Models{
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
	class MovieTag extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Role
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|Role newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Role newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Role query()
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereName($value)
 * @mixin \Eloquent
 */
	class Role extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Season
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|Season newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Season newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Season query()
 * @method static \Illuminate\Database\Eloquent\Builder|Season whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Season whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Season whereName($value)
 * @mixin \Eloquent
 */
	class Season extends \Eloquent {}
}

namespace App\Models{
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
	class Slider extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Tag
 *
 * @property int $id
 * @property string $name
 * @package App\Models
 * @method static \Illuminate\Database\Eloquent\Builder|Tag newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Tag newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Tag query()
 * @method static \Illuminate\Database\Eloquent\Builder|Tag whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tag whereName($value)
 * @mixin \Eloquent
 */
	class Tag extends \Eloquent {}
}

namespace App\Models{
/**
 * Class User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property Carbon|null $createdAt
 * @property Carbon|null $updatedAt
 * @property int $roleId
 * @property string $img
 * @package App\Models
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereImg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRoleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class User extends \Eloquent implements \Tymon\JWTAuth\Contracts\JWTSubject {}
}

