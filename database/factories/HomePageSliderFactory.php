<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\Admin\HomePageManagement\HomePageSlider;
use Illuminate\Database\Eloquent\Factories\Factory;

class HomePageSliderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = HomePageSlider::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->text(),
            'note' => $this->faker->text(),
            'slider_image' => $this->faker->text(),
            'service_link' => $this->faker->text(),
            'status' => $this->faker->numberBetween(0, 127),
        ];
    }
}
