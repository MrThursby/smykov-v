<?php

namespace Database\Factories\School;

use App\Models\School\SchoolCourse;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class SchoolCourseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SchoolCourse::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->word;
        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'preview_src' => 'https://picsum.photos/'. 600 .'/'. 480 .'?random='.rand(1,100000),
            'description' => $this->faker->paragraphs(4, true),
            'use_fork' => 1,
            'commentable' => 1,
            'single_price' => null,
            'published_at' => rand(0,5) == 5 ? now() : null
        ];
    }
}
