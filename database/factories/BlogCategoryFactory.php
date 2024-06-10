<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\Admin\BlogManagement\BlogCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

class BlogCategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = BlogCategory::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'about' => $this->faker->text(),
            'status' => $this->faker->numberBetween(0, 127),
        ];
    }
}
