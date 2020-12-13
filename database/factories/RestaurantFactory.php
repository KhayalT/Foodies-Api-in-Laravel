<?php

namespace Database\Factories;

use App\Models\Restaurant;
use Illuminate\Database\Eloquent\Factories\Factory;

class RestaurantFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Restaurant::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'category_id' => $this->faker->numberBetween(1, 3),
            'restaurant_name' => $this->faker->company(),
            'image' => $this->faker->imageUrl(640, 480),
            'price' => $this->faker->randomNumber(2),
            'delivery_time' => $this->faker->numberBetween(15, 60),
        ];
    }
}
