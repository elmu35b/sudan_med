<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\City;
use App\Models\Medicine;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        // City::create(
        //     ['name' => 'دنقلا'],
        // );
        City::create(
            [
                'name' => 'الخرطوم'
            ]
        );
        City::create(
            [
                'name' => 'ام درمان'
            ]
        );

        City::create(
            [
                'name' => 'بحري'
            ]
        );
        User::create([
            'name'=> 'musab',
            'city_id'=> 2,
            'password'=> Hash::make('123456'),
            'type'=> 'admin',
            'address'=> 'saudi arabia',
            'hood'=> 'not-required',
            'phone'=> '0919232991',
            'wa'=> '0919232991',
        ]);
        User::create([
            'name'=> 'Abdalla',
            'city_id'=> 2,
            'password'=> Hash::make('123456'),
            'type'=> 'admin',
            'address'=> '--',
            'hood'=> '--',
            'phone'=> '0121941942',
            'wa'=> '0121941942',
        ]);

        Category::create([
            'name'=> "Cat 1",
            "desc" => "Heart Disesase , "
        ]);
        Medicine::create([
            'category_id'=> 1,
            'city_id'=> 1,
            'user_id'=> 1,
            'name' => 'name',
            'price_type' => 'not_free',
            'dose' => 'dose',
            'name_en' => 'name_en',
            'ex_date' => 'ex_date',
            'tags' => 'tags',
            'quantity' => 'quantity'
        ]);

        // HERE IT
    }
}
