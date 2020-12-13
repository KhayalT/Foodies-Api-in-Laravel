<?php

namespace Database\Factories;

use App\Models\Model;
use App\Models\Restaurant;
use App\Models\Restaurant_Tag;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Factories\Factory;

class Restaurant_TagFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Restaurant_Tag::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'restaurant_id' => function () {
                return Restaurant::all()->random();
            },
            'tag_id' => function () {
                return Tag::all()->random();
            }
        ];
    }
}
