<?php

use TestCase;
use Carbon\Carbon;
use Laravel\Lumen\Testing\DatabaseMigrations;

class UserControllerTest extends TestCase
{

  use DatabaseMigrations;
  
  /** @test **/
  public function index_status_code_should_be_200()
  {
    $this->get('/api/users')->seeStatusCode(200);
  }

  /** @test **/
  public function single_user_status_code_should_be_200()
  {
    $this->get('/api/user/1')->seeStatusCode(200);
  }

  /** @test **/
  public function show_should_return_a_valid_user()
  {
    $this->markTestIncomplete('Pending test');
  }

  /** @test **/
  public function show_should_fail_when_the_user_id_does_not_exist()
  {
    $this->markTestIncomplete('Pending test');
  }

  /** @test **/
  public function show_route_should_not_match_an_invalid_route()
  {
    $this->markTestIncomplete('Pending test');
  }
}