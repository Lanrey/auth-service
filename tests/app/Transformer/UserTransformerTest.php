<?php

namespace Tests\App\Transformer;

use TestCase;

use App\User;
use App\Transformer\UserTransformer;
use League\Fractal\TransformerAbstract;
use Laravel\Lumen\Testing\DatabaseMigrations;
//use Illuminate\Foundation\Testing\DatabaseMigrations;
//use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserTransformerTest extends TestCase
{
    use DatabaseMigrations;

    /** @test **/
    public function it_can_be_initialized()
    {
        $subject = new UserTransformer();
        $this->assertInstanceOf(TransformerAbstract::class, $subject);
    }

    /** @test **/
    public function it_transforms_a_user_model()
    {
        $user = factory('App\User', 1)->make();;
        $subject = new UserTransformer();

        $transform = $subject->transform($user);

        $this->assertArrayHasKey('id', $transform);
        $this->assertArrayHasKey('name', $transform);
        $this->assertArrayHasKey('email', $transform);
        $this->assertArrayHasKey('created', $transform);
        $this->assertArrayHasKey('updated', $transform);
    }
}
