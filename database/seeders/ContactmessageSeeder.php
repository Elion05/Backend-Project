<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Contactmessage;
use Carbon\Carbon;

class ContactmessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        $namen = ['Alice', 'Bob', 'Charlie', 'Diana', 'Eve'];
        $emails = ['alice@test.com', 'bob@test.com', 'charlie@test.com', 'diana@test.com', 'eve@test.com'];

        //snel een seeder gemaaakt met behulp van chatgpt zodat ik niet 
        //steeds accounts moest aanmaken en berichten moest schrijven
        foreach (range(0, 4) as $i) {
            
            foreach (range(1, rand(1, 5)) as $j) {
                Contactmessage::create([
                    'naam' => $namen[$i],
                    'email' => $emails[$i],
                    'bericht' => 'Testbericht ' . $j . ' van ' . $namen[$i],
                    'created_at' => Carbon::now()->subDays(rand(0, 10)),
                    'updated_at' => Carbon::now(),
                ]);
            }
        }
    }
}
