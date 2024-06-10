<?php

namespace Database\Factories;

use App\Models\Admin\AdditionalFeaturesManagement\Newsletter;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class NewsletterFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Newsletter::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->email(),
            'mobile' => $this->faker->phoneNumber(),
            'is_valid_email' => $this->faker->numberBetween(0, 127),
            'status' => $this->faker->numberBetween(0, 127),
        ];
    }
}
