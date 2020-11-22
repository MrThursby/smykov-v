<?php

namespace Database\Factories\School;

use App\Models\School\SchoolPurchase;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class SchoolPurchaseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SchoolPurchase::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'purchaser_id' => 2,
            'course_id' => 1,
            'fork_id' => null,
            'spent_rubles' => rand(1,10).'000',
        ];
    }
}
