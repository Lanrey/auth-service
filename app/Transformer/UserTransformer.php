<?php

namespace App\Transformer;

use App\User;
use League\Fractal;

class UserTransformer extends Fractal\TransformerAbstract
{
	public function transform(User $user)
	{
	    return [
	        'id'      => (int) $user->id,
	        'name'   => $user->product_name,
          'email'    =>  $user->email,
          'created'     => $user->created_at->toIso8601String(),
          'updated'     => $user->updated_at->toIso8601String(),
	    ];
	}
}