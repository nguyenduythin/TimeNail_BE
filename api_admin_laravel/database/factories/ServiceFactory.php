<?php

namespace Database\Factories;

use App\Models\CategoryService;
use App\Models\Service;
use Illuminate\Database\Eloquent\Factories\Factory;

class ServiceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Service::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'name_service' => $this->faker->name(),
            'price' => 120000,
            'total_time_work' => $this->faker->numberBetween(60,100),
            'short_description' => $this->faker->text(),
            'cate_service_id' => CategoryService::all()->random()->id,
        ];
    }
}
