<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Fascades\DB;

class UserSeeder extends Seeder
{
    public function run()
    {
        $user = User::updateOrCreate(
            [
                "name" => "Admin",
                "email" => "admin@transisi.id",
                "password" => bcrypt("transisi")
            ]
        );
    }
}
