<?php

namespace Database\Factories;

use App\Models\Mark;
use App\Models\Page;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class MarkFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Mark::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'markable_type' => Page::class,
            'markable_id' => 1,
            'value' => rand(1,5),
        ];
    }
}
