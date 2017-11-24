<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (DB::table('users')->count() > 0) {
            return;
        }
        DB::table('users')->insert([
            [
                'name' => 'Gyogre',
                'email' => 'paulin.trognon@gmail.com',
                'password' => '$2y$10$JouktwZ/sqc5iAhy.B45guZf1Rwauoze9WQz/SlT8G4cvUJlBySmm',
                'isAdmin' => true,
            ],
        ]);
    }
}
