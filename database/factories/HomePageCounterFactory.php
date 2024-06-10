<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\Admin\HomePageManagement\HomePageCounter;
use Illuminate\Database\Eloquent\Factories\Factory;

class HomePageCounterFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = HomePageCounter::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(10),
            'counter_number' => $this->faker->numberBetween(0, 8388607),
            'status' => $this->faker->numberBetween(0, 127),
        ];
    }
}
