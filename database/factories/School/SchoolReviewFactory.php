<?php

namespace Database\Factories\School;

use App\Models\School\SchoolReview;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class SchoolReviewFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SchoolReview::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'course_id' => 1,
            'author_id' => 2,
            'src' => 'asd',
            'cover_src' => $this->faker->imageUrl($width = 640, $height = 480),
            'approved' => rand(0,1) == 1
        ];
    }
}
