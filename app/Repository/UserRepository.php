<?php

namespace App\Repository;

use App\Models\User;

class UserRepository
{
    public function get($id) {
        return User::find($id);
    }
    public function update($id ,$data) {
        return User::find($id)->update($data);
    }
}
