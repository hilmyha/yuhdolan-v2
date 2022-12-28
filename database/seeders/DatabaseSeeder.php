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
            'name' => 'Kebumen',
            'slug' => 'kebumen',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod ex nisi doloremque dolore reiciendis eligendi velit, ullam inventore itaque?',
        ]);
        City::create([
            'name' => 'Purwokerto',
            'slug' => 'purwokerto',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod ex nisi doloremque dolore reiciendis eligendi velit, ullam inventore itaque?',
        ]);
        City::create([
            'name' => 'Cilacap',
            'slug' => 'cilacap',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod ex nisi doloremque dolore reiciendis eligendi velit, ullam inventore itaque?',
        ]);
        City::create([
            'name' => 'Semarang',
            'slug' => 'semarang',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod ex nisi doloremque dolore reiciendis eligendi velit, ullam inventore itaque?',
        ]);

        Wisata::factory(20)->create();
        Blog::factory(10)->create();
    }
}
