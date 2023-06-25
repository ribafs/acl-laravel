## Adicionar usuário

Supondo que queira usar este aplicativo e nele adicionar vários usuários.

Vou dar o exemplo adicionando 2 usuários na role manager. Lembre que todos terão as mesmas permissões da role manager.

Passos

- Basicamente as alterações serão feitas no seeder Permissions

- Adicionar os users:
    cli1
    cli2

Basta adicionar ao final do seeder Permissions

        $cli1 = new User();
        $cli1->name = 'Cli1 user';
        $cli1->email = 'cli1@mail.org';
        $cli1->password = bcrypt('123456');
        $cli1->save();
        $cli1->roles()->attach($manager_role);
        $cli1->permissions()->attach($manager_perm); // clients

        $cli2 = new User();
        $cli2->name = 'Cli2 user';
        $cli2->email = 'cli2@mail.org';
        $cli2->password = bcrypt('123456');
        $cli2->save();
        $cli2->roles()->attach($manager_role);
        $cli2->permissions()->attach($manager_perm); // clients

Agora já podemos fazer login com
cli1@mail.org
123456

e com cli2

