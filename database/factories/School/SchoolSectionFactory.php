<?php

namespace Database\Factories\School;

use App\Models\School\SchoolSection;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class SchoolSectionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SchoolSection::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'course_id' => 1,
            'fork_id' => null,
            'title' => $this->faker->words(rand(1,5), true)
        ];
    }
}
