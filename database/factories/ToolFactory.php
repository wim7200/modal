<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Condition;
use App\Models\Kind;
use App\Models\Tool;

class ToolFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Tool::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->firstNameFemale,
            'qrTool' => $this->faker->uuid,
            'duetime' => $this->faker->dateTime(),
            'kind_id' => $this->faker->numberBetween(1,3),
            'condition_id' => $this->faker->numberBetween(1,4),
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Tool $tool){
            $tool->clients()->attach(999,['state'=>0]);
        });

    }

}
