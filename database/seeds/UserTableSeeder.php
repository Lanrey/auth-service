<?php

use App\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   * 
   * @return void
   */

   public function run()
   {
    // User::factory()->times(50)->create()
           
     factory(App\User::class, 50)->create();
   }
}