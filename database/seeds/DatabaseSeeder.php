<?php

use Illuminate\Database\Seeder;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        User::create([
            'name' => 'Nain Acero Mamani',
            'email' => 'nain.acero24@gmail.com',
            'password' => bcrypt('secret'),
            'address' => '',
            'role' => 'Cliente'
        ]);

        User::create([
            'name' => 'Nain Acero Mamani',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('secret'),
            'address' => '',
            'role' => 'Admin'
        ]);
    }
}
