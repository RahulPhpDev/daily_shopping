<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::beginTransaction();
        try {
            $adminSeeder = [
                'name' => 'Admin',
                'email' => 'admin@admin.admin',
                'password' => Hash::make('123456'),
            ];

            $admin = \App\User::create($adminSeeder);
            $admin->roles()->attach(
                \App\Models\Roles::find(1)->id
            );
            DB::commit();
        } catch ( Exception $e)
        {
            DB::rollBack();
            dd($e);
        }


    }
}
