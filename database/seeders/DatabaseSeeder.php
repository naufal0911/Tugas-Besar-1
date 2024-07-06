<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Group;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $group = Group::create([
            'nama_group' => 'SuperAdmin',
            'role_id' => 1
        ]);
        $group = Group::create([
            'nama_group' => 'User Toko',
            'role_id' => 2
        ]);
        $group = Group::create([
            'nama_group' => 'User Gudang',
            'role_id' => 3
        ]);
        User::create([
            'name' => 'admin',
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin123'),
            'group_id' => $group->role_id = 1,
            'hak' => 1
        ]);

        User::create([
            'name' => 'User Toko',
            'username' => 'User Toko',
            'email' => 'toko@gmail.com',
            'password' => bcrypt('tokos123'),
            'group_id' => $group->role_id = 2,
            'hak' => 2
        ]);
        User::create([
            'name' => 'User Gudang',
            'username' => 'User Gudang',
            'email' => 'gudang@gmail.com',
            'password' => bcrypt('gudang123'),
            'group_id' => $group->role_id = 3,
            'hak' => 3
        ]);
    }
}
