<?php

namespace Database\Factories;

use App\Enums\EmbedType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class EmbedFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "type" => EmbedType::WEBPAGE->value,
            "url" => fake()->imageUrl(),
            "name" => fake()->text(120),
            "description" => fake()->text(240),
        ];
    }
}
