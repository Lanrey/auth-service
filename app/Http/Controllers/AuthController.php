<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use League\Fractal;
use League\Fractal\Manager;
use League\Fractal\Resource\Item;
use App\Transformer\UserTransformer;
use App\User;

class AuthController extends Controller 
{

  private $fractal;
  /**
  * Instantiate a new UserController instance.
  *
  *  @return void
  */
  public function __construct()
  {
    $this->fractal = new Manager();
  }


  /**
   * Register and store a new user.
   * 
   * @param Request $request
   * @return Response
   */

  public function register(Request $request)
  {
    //validate incoming request

    $this->validate($request, [
      'name' => 'required|string',
      'email' => 'required|email|unique:users',
      'password' => 'required',
    ]);

    try {


      $user = new User;
      $user->name = $request->input('name');
      $user->email = $request->input('email');
      $plainPassword = $request->input('password');
      $user->password = app('hash')->make($plainPassword);

      $user->save();

      $resource = new Item($user, new UserTransformer);
      return $this->fractal->createData($resource)->toArray();


    } catch (\ModelNotFoundException $e) {

      return response()->json([
        'error' => [
            'message' => 'Authentication Failed!'
        ]
      ]);
    }

  }

  /**
   * retrieve jwt via given credentials.
   * 
   * @param Request $request
   * @return Response
   * 
   */

   public function login(Request $request)
   {
     //validate incoming request

     $this->validate($request, [
       'email' => 'required|string',
       'password' => 'required|string'
     ]);

     try {

      $credentials = $request->only(['email', 'password']);

      if (!$token = Auth::attempt($credentials)) {
        return response()->json(['message' => 'Unauthorized'], 401);
      }
 
      return $this->respondWithToken($token);

     } catch (\ModelNotFoundException $e) {

        return response()->json([
          'error' => [
             'message' => 'Login Failed!'
          ]
        ]);
     }
   }

}