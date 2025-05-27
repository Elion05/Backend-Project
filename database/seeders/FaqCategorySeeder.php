<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\FaqCategory;

class FaqCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        FaqCategory::create(['name' => 'Random category1']);
        FaqCategory::create(['name' => 'Random category2']);
        FaqCategory::create(['name' => 'Random category3']);
        FaqCategory::create(['name' => 'Random category4']);

    }
}
