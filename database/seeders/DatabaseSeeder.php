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

        City::create([
            'name'=> 'الخرطوم',
        ]);
        City::create([
            'name'=> 'بحري',
        ]);

        City::create([
            'name'=> 'ام درمان',
        ]);

        City::create([
            'name'=> 'مدني',
        ]);

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



    User::create([
        'name'=> 'نادين',
        'city_id'=> 1,
        'password'=> Hash::make('N0911493546'),
        'type'=> 'admin',
        'address'=> '--',
        'hood'=> '--',
        'phone'=> '0911493546',
        'wa'=> '0911493546',
    ]);


    User::create([
        'name'=> 'مختار',
        'city_id'=> 1,
        'password'=> Hash::make('M0126949107'),
        'type'=> 'admin',
        'address'=> '--',
        'hood'=> '--',
        'phone'=> '0126949107',
        'wa'=> '0126949107',
    ]);
   User::create([
        'name'=> 'نجلاء',
        'city_id'=> 1,
        'password'=> Hash::make('N0119114568'),
        'type'=> 'admin',
        'address'=> '--',
        'hood'=> '--',
        'phone'=> '0119114568',
        'wa'=> '0119114568',
    ]);

    User::create([
        'name'=> 'نسيبة',
        'city_id'=> 1,
        'password'=> Hash::make('N0906202421'),
        'type'=> 'admin',
        'address'=> '--',
        'hood'=> '--',
        'phone'=> '0906202421',
        'wa'=> '0906202421',
    ]);

        // HERE IT
    }
}
