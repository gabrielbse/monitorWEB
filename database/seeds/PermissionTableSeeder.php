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
            // 5 a 12
            [
                'name' => 'usuario',
                'display_name' => 'Manipulação de usuários',
                'description' => 'Manupula as informações sobre usuários'
            ],
            [
                'name' => 'temperatura',
                'display_name' => 'Manipulação de temperatura',
                'description' => 'Manupula as informações sobre temperatura'
            ],
            [
                'name' => 'umidade',
                'display_name' => 'Manipulação de umidade',
                'description' => 'Manupula as informações sobre umidade'
            ],
            [
                'name' => 'pressao',
                'display_name' => 'Manipulação de pressao',
                'description' => 'Manupula as informações sobre pressao'
            ],
            [
                'name' => 'altitude',
                'display_name' => 'Manipulação de altitude',
                'description' => 'Manupula as informações sobre altitude'
            ],
            [
                'name' => 'configuracoes',
                'display_name' => 'Manipulação de configurações',
                'description' => 'Manupula as informações sobre configurações'
            ],            
            [
                'name' => 'relatorio',
                'display_name' => 'Manipulação de relatório',
                'description' => 'Manupula as informações sobre relatório'
            ],
            [
                'name' => 'alertas',
                'display_name' => 'Manipulação de alertas',
                'description' => 'Manupula as informações sobre alertas'
            ],             
        ];

        foreach ($permission as $key => $value) {
            Permission::create($value);
        }
        
    }
}