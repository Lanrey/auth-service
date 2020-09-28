<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use League\Fractal;
use League\Fractal\Manager;
use League\Fractal\Resource\Item;
use League\Fractal\Resource\Collection;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;
use App\Transformer\UserTransformer;

use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{

    public function __construct()
    {

    }
    
    // Generate Token Method for all Controllers
    protected function respondWithToken($token)
    {
        return response()->json([
            'token' => $token,
            'token_type' => 'bearer',
            'expires_in' => Auth::factory()->getTTL() * 60
        ], 200);
    }
    
}
