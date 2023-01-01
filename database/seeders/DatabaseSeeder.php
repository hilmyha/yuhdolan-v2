<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Blog;
use App\Models\City;
use App\Models\User;
use App\Models\Wisata;
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
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'name' => 'Hilmy Haidar',
            'username' => 'haidar',
            'email' => 'haidar@haidar.com',
            'password' => bcrypt('admin123'),
        ]);

        User::factory(4)->create();

        City::create([
            'title' => 'Kebumen',
            'user_id' => 1,
            'slug' => 'kebumen',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod ex nisi doloremque dolore reiciendis eligendi velit, ullam inventore itaque?',
        ]);
        City::create([
            'title' => 'Purwokerto',
            'slug' => 'purwokerto',
            'user_id' => 1,
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod ex nisi doloremque dolore reiciendis eligendi velit, ullam inventore itaque?',
        ]);
        City::create([
            'title' => 'Cilacap',
            'slug' => 'cilacap',
            'user_id' => 1,
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod ex nisi doloremque dolore reiciendis eligendi velit, ullam inventore itaque?',
        ]);
        City::create([
            'title' => 'Semarang',
            'slug' => 'semarang',
            'user_id' => 1,
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod ex nisi doloremque dolore reiciendis eligendi velit, ullam inventore itaque?',
        ]);

        Wisata::factory(20)->create();
        Blog::factory(10)->create();
    }
}
