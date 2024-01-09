<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Review;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Review>
 */
class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Review::class;

    public function definition()
    {
        return [
            'court_id' => $this->faker->randomElement([1, 2, 3, 4, 5, 6]),
            'user_id' => $this->faker->randomElement([1, 2, 3]),
            'rating' => $this->faker->randomElement([4, 5]),
            'review' => $this->faker->word,
        ];
    }
}
