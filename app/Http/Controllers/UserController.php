<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Transformer\UserTransformer;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use  App\User;

class UserController extends Controller
{
     /**
     * Instantiate a new UserController instance.
     *
     *  @return void
     */
    public function __construct()
    {
      $this->middleware('auth');
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
            $data = $this->item($auth_user, new UserTransformer());

            return response()->json(
                $data, 200
            );

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
            
            $all_users = User::all();
            $data = $this->collection($all_users, new UserTransformer());

            return response()->json($data, 200);

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
            $data = $this->item($user, new UserTransformer());

            return response()->json($data, 200);

        } catch (\ModelNotFoundException $e) {

            return response()->json([
                'error' => [
                    'message' => 'Users not found'
                ]
                ], 404);
                
        }

    }

}