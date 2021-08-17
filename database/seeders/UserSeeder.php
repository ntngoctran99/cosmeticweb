<?php

namespace Database\Seeders;

use App\Models\Role;
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
        $users = [
            [
                'username' => 'trantran',
                'password' => Hash::make('123456789'),
                'role_id' => Role::all()->random()->id,
            ],
            [
                'username' => 'trantran1',
                'password' => Hash::make('123456789'),
                'role_id' => Role::all()->random()->id,
            ]
        ];
        // Delete and Reset Table
        DB::table('users')->delete();
        DB::statement("ALTER TABLE `users` AUTO_INCREMENT = 1");
        // Insert into table
        DB::table('users')->insert($users);
    }
}
