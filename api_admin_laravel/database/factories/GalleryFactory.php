<?php

namespace Database\Factories;

use App\Models\Gallery;
use App\Models\GalleryCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

class GalleryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Gallery::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $imgPath = $this->faker->image(storage_path('app/public/images/url_gallery'), $width = 640, $height = 480, 'cats', false);
        return [
            'cate_gl_id' =>  GalleryCategory::all()->random()->id,
            'url' => 'images/url_gallery/' . $imgPath,
        ];
    }
}
