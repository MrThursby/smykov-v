<?php

namespace Database\Factories\School;

use App\Models\School\SchoolLesson;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class SchoolLessonFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SchoolLesson::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'section_id' => 1,
            'title' => $this->faker->sentence,
            'src' => '',
            'homework' => $this->faker->paragraph,
            'commentable' => 1,
            'local_id' => rand(1,2000),
            'published_at' => rand(0,5) == 5 ? now() : null
        ];
    }
}
