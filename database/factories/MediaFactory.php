<?php

namespace Database\Factories;

use App\Models\Media;
use Illuminate\Database\Eloquent\Factories\Factory;

class MediaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Media::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // $faker = FakerFactory::create();
        return [
            'file_name' => $this->faker->image('storage/app/public/media',640,480, null, false),
            'file_type' => '',
            'file_size' => '',
        ];
    }
}
