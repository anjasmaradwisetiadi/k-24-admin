<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class MemberFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id'=> Str::uuid(),
            'name' => $this->faker->name(),
            'email'=> $this->faker->email(),
            'password' => bcrypt('memberdefault'),
            'no_hp'=>$this->faker->phoneNumber(),
            'date_birth'=>$this->faker->dateTimeBetween('-17 year', '+120 year'),
            'gender'=>$this->faker->randomElement(['male','female']),
            'no_ktp'=> $this->faker->nik(),
            'photo'=>'https://images.ygoprodeck.com/images/cards_small/6983839.jpg',
            'position'=>$this->faker->randomElement(['administator','member']),
            'status'=>$this->faker->boolean()
        ];
    }
}
