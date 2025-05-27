<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Nieuws;
use Carbon\Carbon;

class NieuwsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Nieuws::create([
            'titel' => 'Seedr voor de nIuewezsw',
            'nieuws' => 'eedffdrste',
            'foto' => 'news_images/11imZxl1N5KjbgjbtQvgDzXl0O5fvGeIXMFtvESo.jpg',
            'verzondenOp' => Carbon::now(),
        ]);

      
    }
}
