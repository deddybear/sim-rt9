<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Ramsey\Uuid\Uuid;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id'       => Uuid::uuid4(),
            'nama'     => $this->faker->name,
            'email'    => $this->faker->unique()->safeEmail,
            'password' => Hash::make('qwerty'),
            'roles'    => 1,
        ];
    }
}
