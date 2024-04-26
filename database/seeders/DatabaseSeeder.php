<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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
        $this->call(LaratrustSeeder::class);
            
        \App\Models\User::factory()->create([
                 'name' => 'Admin',
                 'username' => 'mynameiszone',
                 'email' => 'zone@gmail.com',
                 'password' => Hash::make('1234567890')
            ])->attachRole('admin');

            \App\Models\User::factory()->create([
                'name' => 'Kasir',
                'username' => 'cashierzone.com',
                'email' => 'uding@gmail.com',
                'password' => Hash::make('1234567890'),
           ])->attachRole('kasir');
    }
}
