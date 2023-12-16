<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            ColorSeeder::class,
            SizeSeeder::class,
            CategorySeeder::class,
            ProductSeeder::class,
            RoleSeeder::class,
        ]);
        //seed tài khoản admin 
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'lequocphaikql@gmail.com',
            'password' => Hash::make('123456'),
            'role_id' => '1',
        ]);
    }
}
