<?php

namespace App\Http\Controllers;

use App\Http\Middleware\ValidateJwtToken;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

/**
 * @OA\Info(
 * title="Your super ApplicationAPI",
 * version="1.0.0",
 * )
 */
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
        $this->middleware(ValidateJwtToken::class, ['except' => ['login', 'register']]);
    }
}
