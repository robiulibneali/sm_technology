<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\Admin\ServiceManagement\OurServiceCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

class OurServiceCategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = OurServiceCategory::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'icon_class' => $this->faker->text(255),
            'descripton' => $this->faker->text(),
            'status' => $this->faker->numberBetween(0, 127),
        ];
    }
}
