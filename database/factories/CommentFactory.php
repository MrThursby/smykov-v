<?php

namespace Database\Factories;

use App\Models\Blog\BlogPost;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CommentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Comment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'author_id' => 2,
            'commentable_type' => BlogPost::class,
            'commentable_id' => 1,
            'content' => $this->faker->paragraph()
        ];
    }
}
