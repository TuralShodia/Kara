<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // // \App\Models\Book::factory(100)->create();
        // $this->call(class:BookSeeder::class);
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        \App\Models\Contact::factory(1)->create();
        \App\Models\About::factory(1)->create();
        \App\Models\User::factory(1)->create();
//        \App\Models\Book::factory(1)->create();
//        \App\Models\Category::factory(5)->create();
//        \App\Models\News::factory(10)->create();
        $this->call([
//            BookSeeder::class,
        ]);
    }
}
