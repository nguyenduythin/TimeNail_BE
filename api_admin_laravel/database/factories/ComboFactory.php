<?php

namespace Database\Factories;

use App\Models\Combo;
use Illuminate\Database\Eloquent\Factories\Factory;

class ComboFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Combo::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $imgPath = $this->faker->image(storage_path('app/public/images/combo_avatar'), $width = 640, $height = 480, 'cats', false);
        return [
            //
            'name_combo' => $this->faker->name(),
            'total_price' => 120000,
            'total_time_work' => $this->faker->numberBetween(60,100),
            'image' => 'images/combo_avatar/' . $imgPath,
            'short_description' => $this->faker->text(),
            'description' => $this->faker->text(),
        ];
    }
}
