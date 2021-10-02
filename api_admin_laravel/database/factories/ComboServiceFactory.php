<?php

namespace Database\Factories;

use App\Models\Combo;
use App\Models\ComboService;
use App\Models\Service;
use Illuminate\Database\Eloquent\Factories\Factory;

class ComboServiceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ComboService::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'service_id' => Service::all()->random()->id,
            'combo_id' => Combo::all()->random()->id
        ];
    }
}
