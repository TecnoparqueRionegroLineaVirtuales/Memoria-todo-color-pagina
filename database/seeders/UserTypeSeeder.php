<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\UserType;

class UserTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userType = new UserType();
        $userType->description = "admin";
        $userType->save();

        $userType = new UserType();
        $userType->description = "usuario";
        $userType->save();

        $userType = new UserType();
        $userType->description = "artista";
        $userType->save();
    }
}
