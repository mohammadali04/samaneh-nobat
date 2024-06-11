<?php

namespace Database\Factories;
use App\Models\Comment;
use Illuminate\Support\Str;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    protected $model=Comment::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
           'service_id' => $this->faker->randomNumber(),
           'user_id' => $this->faker->randomNumber(),
           'status' => 1,
           'name' => $this->faker->name(),
           'email' => $this->faker->email(),
           'score' => $this ->faker->randomNumber(),
           'body' => $this->faker->text(),
        ];
    }
}
