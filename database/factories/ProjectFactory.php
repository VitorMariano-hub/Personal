<?php

namespace Database\Factories;
use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;

class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->sentence(3),
            'description' => $this->faker->paragraph(3),
            'languages_used' => $this->faker->words(3, true),
            'image_path' => $this->faker->imageUrl(640, 480),
        ];
    }
}
