<?php

namespace Database\Factories\School;

use App\Models\School\SchoolHomework;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class SchoolHomeworkFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SchoolHomework::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $responsed = rand(0,1) == 1;
        return [
            'lesson_id' => 1,
            'author_id' => 2,
            'content' => $this->faker->paragraph,
            'response' => $responsed ? $this->faker->paragraph : null,
            'mark' => $responsed ? rand(1,5) : null,
        ];
    }
}
