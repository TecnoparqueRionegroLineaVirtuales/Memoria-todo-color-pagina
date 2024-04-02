<?php

namespace Database\Seeders;

use App\Models\SocialType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SocialTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $socialType = new SocialType();
        $socialType->description = 'Facebook';
        $socialType->icon_link = 'fa-brands fa-facebook-f fa-lg';
        $socialType->save();

        $socialType2 = new SocialType();
        $socialType2->description = 'Youtube';
        $socialType2->icon_link = 'fa-brands fa-youtube fa-lg';
        $socialType2->save();

        $socialType3 = new SocialType();
        $socialType3->description = 'Instagram';
        $socialType3->icon_link = 'fa-brands fa-instagram fa-lg';
        $socialType3->save();

        $socialType4 = new SocialType();
        $socialType4->description = 'Twitter';
        $socialType4->icon_link = 'fa-brands fa-twitter fa-lg';
        $socialType4->save();
    }
}
