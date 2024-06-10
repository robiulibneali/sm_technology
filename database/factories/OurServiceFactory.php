<?php

namespace Database\Factories;

use App\Models\Admin\ServiceManagement\OurService;
use App\Models\Admin\ServiceManagement\OurServiceCategory;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class OurServiceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = OurService::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(10),
            'icon_class' => $this->faker->text(255),
            'thamb_image' => $this->faker->text(),
            'short_description' => $this->faker->text(),
            'long_description' => $this->faker->text(),
            'view_count' => $this->faker->randomNumber(0),
            'status' => $this->faker->numberBetween(0, 127),
            'our_service_category_id' => OurServiceCategory::factory(),
        ];
    }
}
