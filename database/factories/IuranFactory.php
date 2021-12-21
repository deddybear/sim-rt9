<?php

namespace Database\Factories;

use App\Models\Iuran;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Ramsey\Uuid\Uuid;

class IuranFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Iuran::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id'         => Uuid::uuid4(),
            'ket'        => '',
            'jumlah'     => $this->faker->numberBetween(1000, 30000)
        ];
    }
}
