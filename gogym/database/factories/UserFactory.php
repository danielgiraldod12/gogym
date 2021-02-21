<?php

namespace Database\Factories;

use App\Models\User;
use Carbon\Carbon as CarbonCarbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
            'name' => $this->faker->name,
            'typeOfIdentification' => $this->faker->randomElement(['T.I','C.C','Pasaporte','Carnet de Extranjeria']),
            'identification_num' => $this->faker->unique()->randomNumber,
            'email' => $this->faker->unique()->safeEmail,
            'id_record_num' => $this->faker->randomElement(['1','2']),
            'id_training_program' =>$this->faker->randomElement(['1','2']),
            'id_training_center'=>$this->faker->randomElement(['1']),
            'id_rol'=>$this->faker->randomElement(['1','2','3']),
            'created_at' => $this->faker->date("2020-m-d H:i:s"),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ];
    }
}
