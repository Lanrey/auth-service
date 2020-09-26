<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class AuthController extends Controller 
{

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
      'password' => 'required|confirmed',
    ]);

    try {

      $user = new User;
      $user->name = $request->input('name');
      $user->email = $request->input('email');
      $plainPassword = $request->input('password');
      $user->password = app('hash')->make($plainPassword);

      $user->save();

      return response()->json(['user' => $user, 'message' => 'User Created Sucessfully', 201]);

    } catch (\Exception $e) {
      //return error message
      return response()->json(['message' => 'User Registration Failed!'], 409);
    }

  }

}