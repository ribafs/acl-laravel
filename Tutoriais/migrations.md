Aqui temos as migrations

Permissions
Roles
Clients
Usamos a migrate User existente

Temos também as mirations de tabelas pivot:

Tabelas pivot são aquelas que utem duas tabelas com relacionamento muitos para muitos.
Exemplo: autores e livros então a tabela pivot autores_livros.

CreateUserPermissionTable

    public function up()
    {
        Schema::create('user_permission', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('permission_id')->constrained()->onDelete('cascade');
 
            $table->primary(['user_id','permission_id']);// Veja que tem uma chave primária composta
        });
    }

CreateUserRoleTable

    public function up()
    {
        Schema::create('user_role', function (Blueprint $table) {
           $table->foreignId('user_id')->constrained()->onDelete('cascade');
           $table->foreignId('role_id')->constrained()->onDelete('cascade');

           $table->primary(['user_id','role_id']);
        });
    }

CreateRolePermissionTable

    public function up()
    {
        Schema::create('role_permission', function (Blueprint $table) {
             $table->foreignId('role_id')->constrained()->onDelete('cascade');
             $table->foreignId('permission_id')->constrained()->onDelete('cascade');

             $table->primary(['role_id','permission_id']);
        });
    }




