<?php

namespace Database\Factories;

use App\Models\Admin\RoleManagement\Role;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class RoleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Role::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(10),
            'note' => $this->faker->text(),
            'slug' => $this->faker->slug(),
            'is_default' => $this->faker->numberBetween(0, 127),
            'status' => $this->faker->numberBetween(0, 127),
        ];
    }
}
