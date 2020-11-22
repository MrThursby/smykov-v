<?php

namespace Database\Factories\School;

use App\Models\School\SchoolFork;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class SchoolForkFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SchoolFork::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'course_id' => 1,
            'title' => $this->faker->word,
            'price' => rand(1,10).'000',
        ];
    }
}
