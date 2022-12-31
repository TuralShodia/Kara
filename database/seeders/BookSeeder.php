<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::factory()
        ->has(
            Book::factory(100)
                ->state(function (array $attributes, Category $category) {
                    return ['category_id' => $category->id];
                })
        )
        ->create();
    }
}
