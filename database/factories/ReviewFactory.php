<?php

namespace Database\Factories;

use App\Models\Restaurant;
use App\Models\Review;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReviewFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Review::class;

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
            'customer' => $this->faker->name,
            'review' => $this->faker->paragraph(2),
            'star' => $this->faker->numberBetween(1, 5),
        ];
    }
}
