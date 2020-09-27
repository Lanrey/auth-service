<?php

use App\User;
use App\Transformer\UserTransformer;
use League\Fractal\TransformerAbstract;
use Laravel\Lumen\Testing\DatabaseMigrations;

class BookTransformerTest extends TestCase
{
  use DatabaseMigrations;

  /** @test **/

  public function it_can_be_initialized()
  {
    $subject = new UserTransformer();
    $this->assertInstanceOf(TransformerAbstract::class, $subject);
  }
}