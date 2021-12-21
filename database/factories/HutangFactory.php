<?php

namespace Database\Factories;

use App\Models\Hutang;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Ramsey\Uuid\Uuid;

class HutangFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Hutang::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id'       => 'bd7c5570-5312-4159-afc9-05f24434d6ce',
            'jumlah'   => $this->faker->numberBetween(1000, 30000),
        ];
    }
}
