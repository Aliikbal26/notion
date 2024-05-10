<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        //
        $user = new User();
        $user->id = "1";
        $user->name = "ali";
        $user->email = "ali@localhost";
        $user->password = bcrypt("ali");
        $user->save();
        $user = new User();
        $user->id = "2";
        $user->name = "dua";
        $user->email = "dua@localhost";
        $user->password = bcrypt("dua");
        $user->save();
    }
}
