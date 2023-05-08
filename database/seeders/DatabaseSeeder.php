<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run(): void
    {
        $this->call(RolSeeder::class);
       User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@gmail.com',
            'password'=>bcrypt('admin1234'),
        ])->assignRole('Admin');
    }
}
