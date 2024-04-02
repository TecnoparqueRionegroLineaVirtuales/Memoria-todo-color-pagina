<?php

namespace Database\Factories;

use App\Models\CategoryFile;
use App\Models\File;
use App\Models\State;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\File>
 */
class FileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'route' => $this->faker->imageUrl(1024, 508),
            'category_file_id' => CategoryFile::inRandomOrder()->first()->id,
            'state_id' => State::inRandomOrder()->first()->id,
            'file_type_id' => 1
        ];
    }
}
