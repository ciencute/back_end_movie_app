<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comment';
    public $timestamps = false;

    protected $casts = [
        'id' => 'int',
        'userId' => 'int',
        'movieId'=>'int'
    ];
    protected $dates = [
        'createdAt'
    ];
    protected $fillable = [
        'userId' ,
        'movieId',
        'content',
        'createdAt'
    ];
}
