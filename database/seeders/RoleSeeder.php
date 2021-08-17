<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [['name' => 'ADMIN'],['name' => 'USER']];
        // Delete and Reset Table
        DB::table('roles')->delete();
        DB::statement("ALTER TABLE `roles` AUTO_INCREMENT = 1");
        // Insert into table
        DB::table('roles')->insert($roles);
        /*DB::table('roles')->insert([
            'name' => ['ADMIN','USER'],
        ]);*/
    }
}
