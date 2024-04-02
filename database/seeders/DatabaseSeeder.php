<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $this->call(CategoryFileSeeder::class);
        $this->call(StateSeeder::class);
        $this->call(FileTypeSeeder::class);
        $this->call(FileSeeder::class);
        $this->call(CategoryProductSeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(MenuTypeSeeder::class);
        $this->call(MenuSeeder::class);
        $this->call(SocialTypeSeeder::class);
        

        
    }
}
