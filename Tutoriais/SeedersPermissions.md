# Detalhando o Seeder Permissions

Temos alguns seeders, mas o principal é o PermissionsSeeder.php

O seeder PermissionsSeeder contém uma parte muito importante para garantir o acesso ou bloqueio dos users para o aplicativo.

Nele definimos:

- roles
- permissões de cada role
- usuários vinculados a cada role

E o que cada um pode fazer

Usarei a solução com apenas duas roles para simplificar e cada role com permissões sobre apenas um único CRUD.

<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Permission;
use App\Models\Role;
use App\Models\User;

class PermissionsSeeder extends Seeder
{
    public function run()
    {
        // Roles e permissões
        // admin: users, roles e permissions
        // manager: clients

        // Consultar o banco e guardar em $admin_permission1, 2 e 3 a permissão clients-all
        $admin_permission = Permission::where('slug','users-all')->first();
        $manager_permission1 = Permission::where('slug', 'clients-all')->first();

        // Cadastrar a role admin e anexar a ela suas permissões acima
        $admin_role = new Role();
        $admin_role->slug = 'admin';
        $admin_role->name = 'Admin role';
        $admin_role->save();
        $admin_role->permissions()->attach($admin_permission);

        // Cadastrar a role manager e anexar a ela sua permissão acima
        $manager_role = new Role();
        $manager_role->slug = 'manager';
        $manager_role->name = 'Manager role';
        $manager_role->save();
        $manager_role->permissions()->attach($manager_permission1);

        // Cadastrar no banco a permission user-all e anexar na role admin)
        $users_all = new Permission();
        $users_all->slug = 'users-all';
        $users_all->name = 'Users all';
        $users_all->save();
        $users_all->roles()->attach($admin_role);

        // Cadastrar no banco a permission clients-all e anexar na role manager
        $clients_all = new Permission();
        $clients_all->slug = 'clients-all';
        $clients_all->name = 'Clients all';
        $clients_all->save();
        $clients_all->roles()->attach($manager_role);

        // Consultar e guardar em $admin_role a admin e manager
        $admin_role = Role::where('slug','admin')->first();
        $manager_role = Role::where('slug', 'manager')->first();

        // Consultar e guardar em $admin_perm1, 2 e 3 as permissões users-all, roles-all e permissions-all e em manager clients-all
        $admin_perm = Permission::where('slug','users-all')->first();
        $manager_perm = Permission::where('slug','clients-all')->first();

        // Cadastrar o user Admin no banco e anexar a ele sua(s) respectiva(s) role(s) e permission(s)
        $admin = new User();
        $admin->name = 'Admin user';
        $admin->email = 'admin@mail.org';
        $admin->password = bcrypt('123456');
        $admin->save();
        $admin->roles()->attach($admin_role);
        $admin->permissions()->attach($admin_perm);

        // Cadastrar o user Manager no banco e anexar a ele sua(s) respectiva(s) role(s) e permission(s)
        $manager = new User();
        $manager->name = 'Manager user';
        $manager->email = 'manager@mail.org';
        $manager->password = bcrypt('123456');
        $manager->save();
        $manager->roles()->attach($manager_role);
        $manager->permissions()->attach($manager_perm);
       
        //return redirect()->back();
    }
}

Para exemplos mais comletos veja os exemplos.

