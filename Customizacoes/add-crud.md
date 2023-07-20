Vamos adicionar um CRUD para nosso aplicativo com laravel 10

O procedimento é similar para as demais versões

Alternativas:

- Podemos criar o CRUD manualmente
- Ou usar um gerador de CRUDs

Irei usar um gerador

Adicionarei um CRUD products, com apenas o campo name, para simplificar

create table products(
    id int primary key auto_increment,
    name varchar(50) not null
)

composer require appzcoder/crud-generator --dev

php artisan vendor:publish --provider="Appzcoder\CrudGenerator\CrudGeneratorServiceProvider"

php artisan crud:generate Products --fields='name#string;' --view-path=admin --controller-namespace=App\\Http\\Controllers\\Admin --route-group=admin --form-helper=html

É uma boa prática após a criaçãodo CRUD efetuar ajustes na miration, no caso de products

Route::resource('products', 'App\Http\Controllers\Admin\ProductsController');

Ajusutar as permissões no controller Product    


Lista para criação manual de CRUD

- Criação da migration
- Criação do conroller
- Criação das views
- Entrada nas rotas
- Entrada no seeders Permissions (também quando usando gerador de CRUDs)
- Criação do seeders (opcional)
- Enrada no menu principal

Acho mais prático criar CRUDs coom um bom gerador de CRUDs.

