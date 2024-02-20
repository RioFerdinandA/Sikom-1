<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        User::create([
            'username' => 'Rio Ferdinand Adriansyah',
            'password' => bcrypt('12345'),
            'email' => 'rio@gmail.com',
            'nama_lengkap' => 'Rio Ferdinand Adriansyah',
            'alamat' => 'Indrmayu',
            'role' => 'administrator'
        ]);
    }
}
