<?php

namespace Tests\App\Http\Controllers;

use TestCase;


class UsersControllerTest extends TestCase
{

    /** @test **/
    public function index_status_code_should_be_200(){
        
        $this->get('/api/users')->seeStatusCode(200);
    }

}
