<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

// use App\Models\Account;
use App\Models\User;
use App\Models\Visitor;
use Illuminate\Database\Seeder;

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

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        User::create([
            'name' => 'admin',
            'email' => 'admin@test.com',
            'password' => bcrypt('admin'),
            'is_admin' => 1,
            'super_admin' => 1,
        ]);

        // Account::create([
        //     'name' => 'admin',
        //     'email' => 'admin@test.com',
        //     'password' => bcrypt('admin'),
        //     'is_admin' => 1,
        // ]);

        Visitor::factory(100)->create();

        Visitor::create([
            'name' => 'adi',
            'address' => 'yogyakarta',
            'institution' => 'asd',
            'type' => 'SD',
            'total_visitors' => 5,
            'is_suggest' => 0,
            // 'suggestion' => '',``
            'instagram' => 'adi'
        ]);

    }
}
