<?php

namespace Database\Factories;

use App\Models\Admin\PortfolioManagement\Portfolio;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class PortfolioFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Portfolio::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->text(),
            'short_descriptoin' => $this->faker->text(),
            'long_descriptoin' => $this->faker->text(),
            'author_name' => $this->faker->text(255),
            'fb_link' => $this->faker->text(),
            'twitter_link' => $this->faker->text(),
            'instagram_link' => $this->faker->text(),
            'linkedin_link' => $this->faker->text(),
            'status' => $this->faker->numberBetween(0, 127),
        ];
    }
}
