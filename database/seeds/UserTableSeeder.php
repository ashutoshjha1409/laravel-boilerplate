<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    public function run()
    {
        $user = new User();
        $user->name = "Ashutosh";
        $user->email = "ashu@gmail.com";
        $user->password = Hash::make("test123");
        $user->save();
    }
}
