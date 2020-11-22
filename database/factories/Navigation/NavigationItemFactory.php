<?php

namespace Database\Factories\Navigation;

use App\Models\Navigation\NavigationItem;
use App\Models\Page;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class NavigationItemFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = NavigationItem::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'menu_id' => 1,
            'title' => $this->faker->word,
            'menuable_type' => Page::class,
            'fa-icon' => 'user',
            'menuable_id' => 1
        ];
    }
}
