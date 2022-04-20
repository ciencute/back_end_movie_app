<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WatchingHistory extends Model
{
    use HasFactory;

    protected $table = 'watching_history';
    public $timestamps = false;

    protected $fillable = [
        'movieId',
        'userId',
        'createdAt'
    ];
    protected $casts = [
        'movieId' => 'int',
        'userId' => 'int'
    ];
    protected $dates = [
        'createdAt'
    ];

}
