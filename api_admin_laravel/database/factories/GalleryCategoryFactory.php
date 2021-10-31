<?php

namespace Database\Factories;

use App\Models\GalleryCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

class GalleryCategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = GalleryCategory::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $imgPath = $this->faker->image(storage_path('app/public/images/gallery-category'), $width = 640, $height = 480, 'cats', false);
        return [
            'title' =>  $this->faker->name(),
            'avatar' => 'images/gallery-category/' . $imgPath,
        ];
    }
}
