<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\Admin\AdditionalFeaturesManagement\ExpertTeamMember;
use Illuminate\Database\Eloquent\Factories\Factory;

class ExpertTeamMemberFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ExpertTeamMember::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'position' => $this->faker->text(255),
            'description' => $this->faker->sentence(15),
            'fb_link' => $this->faker->text(),
            'x_link' => $this->faker->text(),
            'twitter_link' => $this->faker->text(),
            'linkedin_link' => $this->faker->text(),
            'status' => $this->faker->numberBetween(0, 127),
        ];
    }
}
