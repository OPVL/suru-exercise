<?php

namespace Database\Factories;

use App\Models\Note;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class NoteFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Note::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'content' => $this->faker->sentence(10),
        ];
    }

    public function fakeDates(): self
    {
        return $this->state(function ($attributes): array {
            $date = $this->faker->date();
            return [
                'created_at' => $date,
                'updated_at' => $date,
            ];
        });
    }
}
