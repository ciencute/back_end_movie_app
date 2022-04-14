<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Middleware\ValidateJwtToken;
use App\Models\User;

class UserController extends  Controller
{
    /**
     * @authenticated
     */
    public function getAll() {
        return User::all();
    }
}
