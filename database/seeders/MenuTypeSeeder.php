<?php

namespace Database\Seeders;

use App\Models\MenuType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $typeMenu = new MenuType();
        $typeMenu->description = "URL";
        $typeMenu->save();

        $typeMenu2 = new MenuType();
        $typeMenu2->description = "ID";
        $typeMenu2->save();
    }
}
