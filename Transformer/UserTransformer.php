<?php


namespace App\Transformer;


use App\User;
use League\Fractal\TransformerAbstract;

class UserTransformer extends TransformerAbstract
{

  /**
   * Transform a User model into an array
   * 
   * @param User $user
   * @return array
   */

   public function transform(User $user)
   {
     return [
       'id'      => $user->id,
       'name'    => $user->name,
       'email'   => $user->email,
       'created' => $user->created_at->toIso8601String(),
       'updated' => $user->udpated_at->toIso8601String(),
     ];
   }

}