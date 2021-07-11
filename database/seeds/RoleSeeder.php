<?php

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $roles = [
                    [
                        'name' => 'Admin'
                    ],
                    [
                        'name' => 'Truck Driver',
                    ],
                    [
                        'name' => 'Customer'
                    ]
            ];
        \App\Models\Roles::insert($roles);
    }
}
