<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'name'=>'Admin',
                'email'=>'admin@bookmyshow.com',
                'is_employee'=>'1',
                'password'=> bcrypt('12345678'),
            ],
            [
                'name'=>'User',
                'email'=>'user@user.com',
                'is_employee'=>'0',
                'password'=> bcrypt('123456'),
            ],

        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
