<?php

namespace Database\Factories;

use App\Models\Admin\BlogManagement\BlogComment;
use App\Models\Admin\BlogManagement\Blog;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class BlogCommentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = BlogComment::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'comment_content' => $this->faker->text(),
            'status' => $this->faker->numberBetween(0, 127),
            'blog_id' => Blog::factory(),
            'user_id' => User::factory(),
            'blog_comment_id' => function () {
                return BlogComment::factory()->create([
                    'blog_comment_id' => null,
                ])->id;
            },
        ];
    }
}
