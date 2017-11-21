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
        DB::table('armies')->insert([
            [
                'name' => 'L\'Alliance Terrestre',
                'code' => 'AT',
            ],
            [
                'name' => 'Le Grand Empire',
                'code' => 'GE',
            ],
        ]);
    }
}
