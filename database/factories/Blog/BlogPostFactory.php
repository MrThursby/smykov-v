<?php

namespace Database\Factories\Blog;

use App\Models\Blog\BlogPost;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class BlogPostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = BlogPost::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $content = $this->faker->paragraphs(5, true);
        return [
            'author_id' => 2,
            'title' => $this->faker->sentence,
            'content' => $content,
            'excerpt' => Str::limit($content, 70, '...')
        ];
    }
}
