# ACL implementation in applications laravel 10

An implementation entirely with native features. No use of any packages.

Using trait, seeder, provision, middleware, among other features.

Starting with:

Four roles: 

- super
- admin
- manager
- user

Each role has its set of permissions

Super - has full permission on everything in the app.
Admin - full permission on all users, roles and permissions
Manager - full permission on business CRUDs, in case clients
User - permission only on the index of clients

Users belong to one role each. Each user will have all role permissions. If you need different permissions, you will need to create another role

## Customizations

You can customize it to suit your needs without much hassle.

## Install and execute

- Create a database and configure in .env

- composer install

- npm install

- npm run build

php artisan migrate --seed

php artisan serve

http://127.0.0.1:8000/login

Acessar com um dos users:

super@mail.org
123456

admin@mail.org
123456

manager@mail.org
123456

user@mail.org
123456


## See some screens

Each user will only see the items they are entitled to.

Super

![](capturas/super.png)

Admin

![](capturas/admin.png)

Manager

![](capturas/manager.png)

User

![](capturas/user.png)

## License

## Forum



MIT
