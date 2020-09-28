<?php


//use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Laravel\Lumen\Testing\DatabaseMigrations;

class UserControllerTest extends TestCase
{

  use DatabaseMigrations;

  /** @test **/
  public function all_users_status_code_should_be_200()
  {
    $user = factory('App\User')->make();
    
   // $token = 'Bearer ' . json_decode($response->getContent())->token;

    $this->actingAs($user)
    //print($auth_user);
         ->get('/api/users', ['HTTP_Authorization' => $token])->seeStatusCode(200);
    //$this->get('/api/users')->seeStatusCode(200);
  }

  /** @test **/
  public function single_user_status_code_should_be_200()
  {

    $user = factory('App\User')->make();

    $this->actingAs($user)
         ->get('/api/user/1')->seeStatusCode(200);
  
  }

  /** @test **/
  public function authenticated_user_status_code_should_be_200()
  {

    $user = factory('App\User')->create();

    $this->actingAs($user)
         ->get('/api/user/1')->seeStatusCode(200);
  }

  /** @test **/
  public function show_should_return_a_valid_user()
  {
    
  }

  /** @test **/

  public function users_should_return_a_collection_of_records()
  {
        $users = factory('App\User', 2)->make();

        $this->get('/api/users');

        $content = json_decode($this->response->getContent(), true);
        $this->assertArrayHasKey('data', $content);

        foreach ($users as $user) {
            $this->seeJson([
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->description,
                'created' => $user->created_at->toIso8601String(),
                'updated' => $user->updated_at->toIso8601String(),
            ]);
        }
  }

  /** @test **/
  public function show_should_fail_when_the_user_id_does_not_exist()
  {
    
  }

  /** @test **/
  public function show_route_should_not_match_an_invalid_route()
  {
    
  }
}