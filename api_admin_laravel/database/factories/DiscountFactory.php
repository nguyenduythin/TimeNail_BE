<?php

namespace Database\Factories;

use App\Models\Discount;
use Illuminate\Database\Eloquent\Factories\Factory;

class DiscountFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Discount::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $imgPath = $this->faker->image(storage_path('app/public/images/discount_avatar'), $width = 640, $height = 480, 'cats', false);
        return [
            //
            'code_discount' => $this->faker->bankAccountNumber(),
            "image" => "images/discount_avatar/" . $imgPath,
            'percent' => $this->faker->numberBetween(20,40),
            'quantity'=> $this->faker->numberBetween(20,40),

        ];
    }
}
