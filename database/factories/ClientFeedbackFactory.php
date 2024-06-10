<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\Admin\AdditionalFeaturesManagement\ClientFeedback;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClientFeedbackFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ClientFeedback::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'client_name' => $this->faker->text(255),
            'client_country' => $this->faker->text(255),
            'user_image' => $this->faker->text(255),
            'feedback' => $this->faker->text(),
            'total_rating' => $this->faker->randomNumber(2),
            'status' => $this->faker->numberBetween(0, 127),
        ];
    }
}
