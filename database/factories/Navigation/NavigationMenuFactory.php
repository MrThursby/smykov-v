<?php

namespace Database\Factories\Navigation;

use App\Models\Navigation\NavigationMenu;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class NavigationMenuFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = NavigationMenu::class;

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
            'slug' => Str::slug($title)
        ];
    }
}
