<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Admin;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'user@gmail.com',
            'password' => bcrypt('password')
        ]);
        Admin::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => \Hash::make('password'),
        ]);
        Role::create(['name' => 'super_admin']);
        $this->call([ExampleBlogSeder::class]);
    }
}
