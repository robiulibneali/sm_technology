<?php

namespace Database\Factories;

use App\Models\Admin\AdditionalFeaturesManagement\Contact;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContactFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Contact::class;

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
            'phone' => $this->faker->phoneNumber(),
            'subject' => $this->faker->text(),
            'message' => $this->faker->text(),
            'status' => $this->faker->numberBetween(0, 127),
        ];
    }
}
