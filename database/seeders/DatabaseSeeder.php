<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\City;
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
            'phone'=> '0919232994',
            'wa'=> '0919232994',
        ]);

        // HERE IT
    }
}
