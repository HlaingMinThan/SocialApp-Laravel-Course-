<?php

namespace Database\Factories;

use App\Models\ContactMessage;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContactMessageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ContactMessage::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // username 	email 	messages 	
        return [
            'username'=>$this->faker->name,
            'email'=> $this->faker->unique()->safeEmail,
            'messages'=>$this->faker->sentence
        ];
    }
}
