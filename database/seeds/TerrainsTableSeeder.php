<?php

use Illuminate\Database\Seeder;

class TerrainsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (DB::table('terrains')->count() > 0) {
            return;
        }
        DB::table('terrains')->insert([
            [
                'name' => 'Herbe',
                'slug' => 'grass',
                'color' => '71aa1d',
                'isWalkable' => true,
                'movement' => 2,
            ],
            [
                'name' => 'Eau',
                'slug' => 'water',
                'color' => '004dc2',
                'isWalkable' => false,
                'movement' => null,
            ],
            [
                'name' => 'Forêt',
                'slug' => 'forest',
                'color' => '008000',
                'isWalkable' => true,
                'movement' => 3,
            ],
            [
                'name' => 'Sable',
                'slug' => 'sand',
                'color' => 'fff44d',
                'isWalkable' => true,
                'movement' => 4,
            ],
            [
                'name' => 'Route',
                'slug' => 'road',
                'color' => 'aaaaaa',
                'isWalkable' => true,
                'movement' => 1,
            ],
            [
                'name' => 'Ville',
                'slug' => 'city',
                'color' => '333333',
                'isWalkable' => false,
                'movement' => null,
            ],
        ]);
    }
}
