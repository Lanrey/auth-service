<?php

use Carbon\Carbon;
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
     DB::table('users')->insert([
       'name' => 'Bode george',
       'email' => 'bodegeorge@gmail.com',
       'password' => 'frahnn###',
       'created_at' => Carbon::now(),
       'updated_at' => Carbon::now()
     ]);

     DB::table('users')->insert([
      'name' => 'georgegraham',
      'email' => 'bodegeorge2@gmail.com',
      'password' => 'frahnnkgk###',
      'created_at' => Carbon::now(),
      'updated_at' => Carbon::now()
    ]);

    DB::table('users')->insert([
      'name' => 'Bodeigigeorge',
      'email' => 'bodegeorge4@gmail.com',
      'password' => 'fratnn###',
      'created_at' => Carbon::now(),
      'updated_at' => Carbon::now()
    ]);

    DB::table('users')->insert([
      'name' => 'Bodrgeorge',
      'email' => 'bodegeorrge@gmail.com',
      'password' => 'frahntt###',
      'created_at' => Carbon::now(),
      'updated_at' => Carbon::now()
    ]);

    DB::table('users')->insert([
      'name' => 'Bodtgeorge',
      'email' => 'bodtegeorge@gmail.com',
      'password' => 'ftrahnn###',
      'created_at' => Carbon::now(),
      'updated_at' => Carbon::now()
    ]);

    DB::table('users')->insert([
      'name' => 'Bodetgeorge',
      'email' => 'bodetgeorge@gmail.com',
      'password' => 'frtahnn###',
      'created_at' => Carbon::now(),
      'updated_at' => Carbon::now()
    ]);

   }
}