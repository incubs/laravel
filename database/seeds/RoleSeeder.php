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
        $roles = ['Admin','User'];

        foreach ($roles as $role ) {
            \App\Models\Role::create(['name' => $role]);
        }
    }
}
