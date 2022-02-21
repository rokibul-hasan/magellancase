<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UsersInfo;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Rokibul Hasan',
            'email' => 'rokibulhasan.356@gmail.com',
            'password' => Hash::make('12345678'),
            'isAdmin' => 'yes'
        ]);
        UsersInfo::create([
            'user_id' => $user->id
        ]);

    }
}
