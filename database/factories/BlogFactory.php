<?php

namespace Database\Factories;

use App\Models\Admin\BlogManagement\Blog;
use App\Models\Admin\BlogManagement\BlogCategory;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class BlogFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Blog::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->text(),
            'main_image' => $this->faker->text(),
            'short_description' => $this->faker->text(),
            'long_description' => $this->faker->text(),
            'hit_count' => $this->faker->randomNumber(0),
            'status' => $this->faker->numberBetween(0, 127),
            'blog_category_id' => BlogCategory::factory(),
            'user_id' => \App\Models\User::factory(),
        ];
    }
}
