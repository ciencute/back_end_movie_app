<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;


class FavoriteActor extends Model
{
    protected $table = 'favorite_actor';
    public $timestamps =false;

    protected $casts = [
        'actorId' => 'int',
        'userId' => 'int'
    ];

    protected $fillable = [
        'actorId',
        'userId'
    ];
}
