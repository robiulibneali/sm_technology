<?php

namespace Database\Factories;

use App\Models\Admin\AdditionalFeaturesManagement\OurCustomer;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class OurCustomerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = OurCustomer::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'company_name' => $this->faker->text(255),
            'person_name' => $this->faker->text(255),
            'company_logo' => $this->faker->text(),
            'description' => $this->faker->text(),
            'status' => $this->faker->numberBetween(0, 127),
        ];
    }
}
