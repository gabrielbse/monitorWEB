<?php

use Illuminate\Database\Seeder;
use App\Permission;
class PermissionTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */

    /*
    *Os usuários do sistema serão os docentes, os funcionários do audiovisual (isto inclui: secretário, coordenador, 
estagiários) e o administrador geral.Os docentes poderão acessar o sistema para solicitar as reservas além de visualizá-las. Os funcionários do setor terão acesso ao sistema para liberar as reservas solicitadas pelos professores além de visualizar todos os usuários, equipamentos e salas. O administrador geral do sistema poderá ter acesso irrestrito a todas as informações.
    */

    public function run() {
        $permission = [
        //1 a 4
            [
                'name' => 'role-list',
                'display_name' => 'Listagem de papeis',
                'description' => 'Listar papeis'
            ],
            [
                'name' => 'role-create',
                'display_name' => 'Cadastrar papel',
                'description' => 'Cadastrar novo papel'
            ],
            [
                'name' => 'role-edit',
                'display_name' => 'Editar papel',
                'description' => 'Editar papel'
            ],
            [
                'name' => 'role-delete',
                'display_name' => 'Excluir papel',
                'description' => 'Excluir papel'
            ],
            // 5 a 8
            [
                'name' => 'usuario-list',
                'display_name' => 'Listagem de usuários',
                'description' => 'Listar usuários'
            ],
            [
                'name' => 'usuario-create',
                'display_name' => 'Cadastrar usuário',
                'description' => 'Cadastrar novo usuário'
            ],
            [
                'name' => 'usuario-edit',
                'display_name' => 'Editar usuário',
                'description' => 'Editar usuário'
            ],
            [
                'name' => 'usuario-delete',
                'display_name' => 'Excluir usuário',
                'description' => 'Excluir usuário'
            ],
            //9 a 12
            [
                'name' => 'temperatura-list',
                'display_name' => 'Ver registros de temperatura',
                'description' => 'Ver temperatura'
            ],
            [
                'name' => 'temperatura-create',
                'display_name' => 'Registrar temperatura',
                'description' => 'Registrar nova temperatura'
            ],
            [
                'name' => 'temperatura-edit',
                'display_name' => 'Corrigir temperatura',
                'description' => 'Corrigir temperatura'
            ],
            [
                'name' => 'temperatura-delete',
                'display_name' => 'Excluir temperatura',
                'description' => 'Excluir temperatura'
            ],
            //13 a 16
            [
                'name' => 'umidade-list',
                'display_name' => 'Ver registros de umidade',
                'description' => 'Ver umidade'
            ],
            [
                'name' => 'umidade-create',
                'display_name' => 'Registrar umidade',
                'description' => 'Registrar nova umidade'
            ],
            [
                'name' => 'umidade-edit',
                'display_name' => 'Corrigir umidade',
                'description' => 'Corrigir umidade'
            ],
            [
                'name' => 'umidade-delete',
                'display_name' => 'Excluir umidade',
                'description' => 'Excluir umidade'
            ],
            //17 a 20
            [
                'name' => 'pressao-list',
                'display_name' => 'Ver registros de pressao',
                'description' => 'Ver pressao'
            ],
            [
                'name' => 'pressao-create',
                'display_name' => 'Registrar pressao',
                'description' => 'Registrar nova pressao'
            ],
            [
                'name' => 'pressao-edit',
                'display_name' => 'Corrigir pressao',
                'description' => 'Corrigir pressao'
            ],
            [
                'name' => 'pressao-delete',
                'display_name' => 'Excluir pressao',
                'description' => 'Excluir pressao'
            ],
            //21 a 24
            [
                'name' => 'altitude-list',
                'display_name' => 'Ver registros de altitude',
                'description' => 'Ver altitude'
            ],
            [
                'name' => 'altitude-create',
                'display_name' => 'Registrar altitude',
                'description' => 'Registrar nova altitude'
            ],
            [
                'name' => 'altitude-edit',
                'display_name' => 'Corrigir altitude',
                'description' => 'Corrigir altitude'
            ],
            [
                'name' => 'altitude-delete',
                'display_name' => 'Excluir umidade',
                'description' => 'Excluir umidade'
            ],
            
        ];

        foreach ($permission as $key => $value) {
            Permission::create($value);
        }
        
    }
}