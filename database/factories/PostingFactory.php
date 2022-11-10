<?php

namespace Database\Factories;


use Illuminate\Database\Eloquent\Factories\Factory;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Posting>
 */
class PostingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'tittle' => $this->faker->sentence(3),
            'kategori_id' => $this->faker->randomDigitNotNull(1),
            'pengguna_id' => $this->faker->randomDigitNotNull(1),
            'type' => $this->faker->sentence(1),
            'url' => $this->faker->date(),
            'preview' => $this->faker->sentence(5),
            'body' => $this->faker->sentence(10),
            
        ];
    }

    public function unverified(){
    {
        return $this->state(function (array $attributes) {
            return [
                'kategori_id' => null,
            ];
        });
    }
}
}


