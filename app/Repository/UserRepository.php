<?php

namespace App\Repository;

use App\Models\User;

class UserRepository
{
    public function get($id) {
        return User::find($id);
    }
}
