<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use League\Fractal;
use League\Fractal\Manager;
use League\Fractal\Resource\Item;
use League\Fractal\Resource\Collection;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;

use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
    private $fractal;

    public function __construct()
    {
        $this->fractal = new Manager();
    }


      /**
     * @param $data
     * @param TransformerAbstract $transformer
     * @return array
     */
    public function item($data, TransformerAbstract $transformer)
    {
        $resource = new Item($data, $transformer);

        return $this->fractal->createData($resource)->toArray();
    }

    /**
     * @param $data
     * @param TransformerAbstract $transformer
     * @return array
     */
    public function collection($data, TransformerAbstract $transformer)
    {

        $paginatedData = $data->getCollection();
        $resource = new Collection($paginatedData, $transformer);
        $resource->setPaginator(new IlluminatePaginatorAdapter($paginatedData));
        return $this->fractal->createData($resource)->toArray();
        
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
