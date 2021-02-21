<?php

namespace Database\Factories;
use App\Models\Event;
use App\Models\Model;
use Illuminate\Database\Eloquent\Factories\Factory;

class EventsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Event::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(2),
            'date' => $this->faker->date("2021-m-d "),
            'description' => $this->faker->text(),
            'state' => $this->faker->randomElement(['activo','finalizado']),
            'id_user' =>$this->faker->randomElement('1','2','3'),
            'created_at' => $this->faker->date("2020-m-d "),
        ];
    }
}
