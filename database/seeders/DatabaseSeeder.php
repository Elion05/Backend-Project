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
            'name' => 'Admin',
            'username' => 'admin',
            'email' => 'admin@ehb.be',
            'password' => Hash::make('Password!321'),
            'is_admin' => true,
            'birthday' => '2005-07-22',
            'bio' => 'ik ben admin lol',
            'profile_image' => '...',
        ]);



        // User::factory(10)->create();

        //dit is voor test users
        User::factory()->create([

        'name' => 'Test User',
        'username' => 'testuser',
        'email' => 'test@example.com',
        'birthday' => '2000-05-20',
        'bio' => 'Random woorden hierin',
        'profile_image' => '...',

        ]);
    }
}
