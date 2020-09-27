<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\User;
use App\Transformer\UserTransformer;
use League\Fractal;
use League\Fractal\Manager;
use League\Fractal\Resource\Item;
use League\Fractal\Resource\Collection;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;


class UserController extends Controller
{
    private $fractal;
     /**
     * Instantiate a new UserController instance.
     *
     *  @return void
     */
    public function __construct()
    {
      $this->middleware('auth');
      $this->fractal = new Manager();
    }

    /**
     * Get the authenticated User.
     *
     * @return Response
     */
    public function authenticatedUser()
    {
        try {

            $auth_user = Auth::user();

            $resource = new Item($auth_user, new UserTransformer);
            return $this->fractal->createData($resource)->toArray();

            //return response()->json(['user' => Auth::user()], 200);
        } catch (\ModelNotFoundException $e) {
            return response()->json([
                'error' => [
                    'message' => 'User not found'
                ]
            ]);
        }
    }

    /**
     * Get all User.
     *
     * @return Response
     */
    public function allUsers()
    {
        try {

            $paginator = User::paginate();
            $users = $paginator->getCollection();
            $resource = new Collection($users, new UserTransformer);
            $resource->setPaginator(new IlluminatePaginatorAdapter($paginator));
            return $this->fractal->createData($resource)->toArray();

        } catch (\ModelNotFoundException $e) {
            
            return response()->json([
                'error' => [
                    'message' => 'Users not found'
                ]
                ], 404);
        }
    }

    /**
     * Get one user.
     *
     * @return Response
     */
    public function singleUser($id)
    {
        try {

            $user = User::findOrFail($id);

            $resource = new Item($user, new UserTransformer);
            return $this->fractal->createData($resource)->toArray();


        } catch (\ModelNotFoundException $e) {

            return response()->json([
                'error' => [
                    'message' => 'Users not found'
                ]
                ], 404);

        }

    }

}