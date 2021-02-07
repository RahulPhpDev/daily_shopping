<?php

use Illuminate\Database\Seeder;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $units = [
            [
                'abbreviation' => 'KG',
                'name' => 'Kilo Gram'
            ],
            [
                'abbreviation' => 'M',
                'name' => 'Meter'
            ],
            [
                'abbreviation' => 'gr',
                'name' => 'Gram'
            ],
            [
                'abbreviation' => 'count',
                'name' => 'Count'
            ],
            [
                'abbreviation' => 'pk',
                'name' => 'Packet'
            ]
        ];

        \App\Models\Unit::insert($units);
    }
}
