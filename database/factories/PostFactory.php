<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array //自動生成するシードを定義している
    {
        return [
            'user_id' => User::factory(), //UserFactoryを実行し、生成されたシードと相関する外部キーを作成する
            'category_id' => Category::factory(), //UserFactoryを実行し、生成されたシードと相関する外部キーを作成する
            'title' => fake()->sentence(), //fakeメソッドのうち、sentence,paraglaph,email,name等 用途に近いダミー分を設定
            'slug' => fake()->slug(),
            'excerpt' => fake()->sentence(),
            'body' => fake()->paragraph()
        ];
    }
}
