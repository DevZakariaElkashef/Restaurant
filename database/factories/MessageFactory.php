<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MessageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $status = ['sentmail', 'draft', 'mailInbox'];

        return [
            'name' => $this->faker->name(),
            'email'=> $this->faker->unique()->safeEmail(),
            'content' => $this->faker->text('500'),
            'status' => $status[rand(0,2)],
            'tag'=>$this->faker->unique()->word()
        ];
    }
}
