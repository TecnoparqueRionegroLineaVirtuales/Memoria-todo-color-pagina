<?php

namespace Database\Seeders;

use App\Models\CategoryFile;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoryFileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categoryFile = new CategoryFile();
        $categoryFile->description = "Murales 1";
        $categoryFile->save();

        $categoryFile2 = new CategoryFile();
        $categoryFile2->description = "Murales 2";
        $categoryFile2->save();

        $categoryFile3 = new CategoryFile();
        $categoryFile3->description = "Murales 3";
        $categoryFile3->save();
    }
}
