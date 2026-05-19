<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // ── Admin User ──
        User::create([
            'name' => 'Admin Wolfilium',
            'email' => 'admin@wolfilium.id',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        // ── Customer Users ──
        User::create([
            'name' => 'Budi Santoso',
            'email' => 'budi@example.com',
            'password' => Hash::make('password'),
            'role' => 'customer',
        ]);

        User::create([
            'name' => 'Sari Dewi',
            'email' => 'sari@example.com',
            'password' => Hash::make('password'),
            'role' => 'customer',
        ]);

        $this->call(WolfiliumSeeder::class);
    }
}
