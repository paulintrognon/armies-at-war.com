<?php

use Illuminate\Database\Seeder;

class ArmiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (DB::table('armies')->count() > 0) {
            return;
        }
        DB::table('armies')->insert([
            [
                'name' => 'La Démocratie Unie',
                'code' => 'DU',
            ],
            [
                'name' => 'L\'Empire du Levant',
                'code' => 'EL',
            ],
        ]);
    }
}
