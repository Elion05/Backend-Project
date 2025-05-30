<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

//uitleg voormezelf:
//deze class zorgt ervoor dat de gebruikers automatisch in de database worden gezet
class DatabaseSeeder extends Seeder
{


    
    /**
     * Seed the application's database.
     */
    public function run(): void
    {


        //dit is voor admin users
        User::create([
          'name' => 'TREX',
          'username' => 'wachtwoord is Password!321',
            'email' => 'trex@gmail.com',
            'password' => Hash::make('Password!321'),
            'is_admin' => true,
            'birthday' => '2005-07-22',
            'bio' => 'ik ben admin lol 2',
            'profile_image' => '...',
        ]);



   

        //dit is voor test users
//        User::factory()->create([
//
  //      'name' => 'Jan Pieter',
    //    'username' => 'testuser',
      //  'email' => 'test@gmail.com',
        //'password' => Hash::make('test123456'),
//        'birthday' => '2000-05-20',
  //      'bio' => 'Random woorden hierin',
    //    'profile_image' => '...',
//
  //      ]);
    }
}
