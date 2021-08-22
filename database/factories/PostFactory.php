<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->unique()->sentence(3),
            'category_id' => Category::get()->random()->id,
            'preview' => $this->faker->text(20),
            'content' => $this->faker->text,
            'preview_image' => 'images/default/' . rand(1, 5) . '.jpg',
            'main_image' => 'images/default/' . rand(1, 5) . '.jpg',
            'is_published' => 1,
        ];
    }
}
