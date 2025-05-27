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

         //Nieuws::create([
           // 'titel' => 'tweede',
            //'nieuws' => 'tweede',
            //'foto' => null,
            //'verzondenOp' => Carbon::now()->subDays(2),
        //]);

     //    Nieuws::create([
       //     'titel' => 'derder',
         //   'nieuws' => 'derder',
           // 'foto' => null,
            //'verzondenOp' => Carbon::now()->subDays(3),
        //]);

        // Nieuws::create([
            //'titel' => 'vierde',
            //'nieuws' => 'vierder',
            //'foto' => null,
            //'verzondenOp' => Carbon::now()->subDays(4),
        //]);

       //  Nieuws::create([
            //'titel' => 'vijfde',
            //'nieuws' => 'vijfde',
           // 'foto' => null,
         //   'verzondenOp' => Carbon::now()->subDays(5),
       // ]);
        
    }
}
