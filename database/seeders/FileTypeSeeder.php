<?php

namespace Database\Seeders;

use App\Models\FileType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FileTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fileType = new FileType();
        $fileType->description = "Imagen";
        $fileType->save();

        $fileType2 = new FileType();
        $fileType2->description = "Video";
        $fileType2->save();

        $fileType3 = new FileType();
        $fileType3->description = "Audio";
        $fileType3->save();
    }
}
