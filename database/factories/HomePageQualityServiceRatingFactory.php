<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\Admin\HomePageManagement\HomePageQualityServiceRating;
use Illuminate\Database\Eloquent\Factories\Factory;

class HomePageQualityServiceRatingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = HomePageQualityServiceRating::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(10),
            'rating' => $this->faker->numberBetween(0, 8388607),
            'status' => $this->faker->numberBetween(0, 127),
        ];
    }
}
