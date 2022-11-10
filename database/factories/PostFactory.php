<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;



class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    { 
        return [
        'title'=>fake()->sentence,
        'content'=>fake()->paragraph,
        'created_at'=>now(),
    ];
    }

}
