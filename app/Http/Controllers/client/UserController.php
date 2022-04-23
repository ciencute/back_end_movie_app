<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Actor;
use App\Models\Director;

class UserController extends Controller
{
    /**
     * Lấy danh sách các diễn viên phân trang 10
     * @authenticated
     */
    public function getAllActor()
    {
        return Actor::paginate(10);
    }
    /**
     * Lấy danh sách các đạp diễn phân trang 10
     * @authenticated
     */
    public function getAllDirector()
    {
        Director::paginate(10);

    }
}
