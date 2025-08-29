<?php

namespace Database\Factories;

use App\Models\Vehicle;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vehicle>
 */
class VehicleFactory extends Factory
{
    protected $model = Vehicle::class;

    public function definition(): array
    {
        return [
            'company_id' => '4bc42572-1add-4867-97f6-27216e72492d',
            'type' => $this->faker->numberBetween(1, 4),
            'model' => Str::title($this->faker->word()),
            'registration_number' => $this->faker->regexify('[A-Z]{5}[0-4]{3}'),
            'number_plate' => $this->faker->regexify('[A-Z]{5}[0-4]{3}'),
            'mileage' => $this->faker->randomFloat(2, 1000, 12000),
            'payload' => $this->faker->randomFloat(2, 100, 4500),
            'manufacture_year' => $this->faker->numberBetween(1930, 2025),
            'status_id' => $this->faker->numberBetween(8, 11),
        ];
    }
}
