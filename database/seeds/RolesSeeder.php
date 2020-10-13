<?php

use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
        	'name' => 'Super Admin'
        ]);

        DB::table('roles')->insert([
        	'name' => 'Admin'
        ]);

        DB::table('roles')->insert([
        	'name' => 'Viewer'
        ]);

        DB::table('roles')->insert([
        	'name' => 'Partner'
        ]);

        DB::table('roles')->insert([
        	'name' => 'Client'
        ]);
    }
}
