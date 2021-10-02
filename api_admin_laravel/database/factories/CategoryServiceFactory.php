<?php

namespace Database\Factories;

use App\Models\CategoryService;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryServiceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CategoryService::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $imgPath = $this->faker->image(storage_path('app/public/images/categories_service'), $width = 640, $height = 480, 'cats', false);
        return [
            //
            'name_cate_service' => $this->faker->name(),
            'image' => 'images/categories_service/'. $imgPath,
            'note' => $this->faker->text(),
        ];
    }
}
