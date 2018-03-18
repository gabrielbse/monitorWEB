<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PermissionTableSeeder::class);
        $this->call(RoleTableSeeder::class);

		DB::table('users')->insert([
            'nome' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('123123'),
            'role_id' => 1,
            'role_do_usuario' => 1,
            'status' => 'Ativo', 
        ]);

        DB::table('configuracoes')->insert([
            'intervalo_coleta' => 10,
            'intervalo_relatorio' => 7,
            'intervalo_grafico' => 5,
            'enviar_email' => true,
        ]);

       for ($i=1; $i <= 12 ; $i++) { 
           DB::table('permission_role')->insert([
            'permission_id' => $i,
            'role_id' => '1',
        ]);
       }
        
    }
}
