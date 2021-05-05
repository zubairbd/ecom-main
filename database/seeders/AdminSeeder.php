<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        DB::table('admins')->insert([
//            ['name' => 'MR. Admin ',
//            'email' =>'admin@gmail.com',
//            'password' => Hash::make('1234'),
//            'phone' => '01714836029',],
//            'name' => 'MR. Zubair ',
//            'email' =>'zubair@gmail.com',
//            'password' => Hash::make('1234'),
//            'phone' => '01714836029',
//        ]);

//    }

        // check if table users is empty
        if(DB::table('admins')->count() == 0){

            DB::table('admins')->insert([

                [
                    'name' => 'Administrator',
                    'email' => 'admin@gmail.com',
                    'password' => bcrypt('1234'),
                    'phone' => '01714836029',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Agency',
                    'email' => 'agency@gmail.com',
                    'password' => bcrypt('1234'),
                    'phone' => '01714836029',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name' => 'Zubair',
                    'email' => 'zubair@gmail.com',
                    'password' => bcrypt('1234'),
                    'phone' => '01714836029',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ]

            ]);

        } else { echo "\e[31mTable is not empty, therefore NOT "; }

    }
}
