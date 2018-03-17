<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        
		$role = [
            //1 a 5
            [
                'name' => 'Administrador',
                'display_name' => 'Administrador',
                'description' => 'Administrador do Sistema'
            ]      
                        
        ];

        foreach ($role as $key => $value) {
            Role::create($value);
        }
    }

}
