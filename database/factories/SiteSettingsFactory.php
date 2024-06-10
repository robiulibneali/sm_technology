<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\Admin\AdditionalFeaturesManagement\SiteSettings;
use Illuminate\Database\Eloquent\Factories\Factory;

class SiteSettingsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SiteSettings::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->text(),
            'site_name' => $this->faker->text(),
            'favicon' => $this->faker->text(),
            'logo' => $this->faker->text(),
            'site_banner' => $this->faker->text(),
            'common_meta' => $this->faker->text(),
            'common_seo_header' => $this->faker->text(),
            'common_seo_footer' => $this->faker->text(),
            'meta_description' => $this->faker->text(),
            'footer_description' => $this->faker->text(),
            'phone' => $this->faker->phoneNumber(),
            'email' => $this->faker->email(),
            'address' => $this->faker->text(),
            'google_map_embade_location_link' => $this->faker->text(),
            'fb_link' => $this->faker->text(),
            'twitter_link' => $this->faker->text(),
            'youtube_link' => $this->faker->text(),
            'linkedin_link' => $this->faker->text(),
            'x_link' => $this->faker->text(),
        ];
    }
}
