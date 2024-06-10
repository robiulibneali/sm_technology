<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\Admin\PortfolioManagement\PortfolioCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

class PortfolioCategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PortfolioCategory::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'description' => $this->faker->sentence(15),
            'status' => $this->faker->numberBetween(0, 127),
            'portfolio_category_id' => function () {
                return PortfolioCategory::factory()->create([
                    'portfolio_category_id' => null,
                ])->id;
            },
        ];
    }
}
