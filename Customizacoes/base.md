# Criar aplicativo usando os arquivos base

Usando a base de arquivos. Todos estes aplicativos foram criados instalando o laravel do zero e copiando os arquivos base. Os arquivos base vieram do pacote laravel-acl - https://github.com/ribafs/laravel-acl

Copiar tudo de uma vez

A cópia dos arquivos pode ser feita de uma única vez
- Abrir uma seção do gerenciador de arquivos
- Selecionar todos os arquivos
- Ctrl+C
- Abrir outra seção do gerenciador de arquivos
- Abrir a pasta do aplicativo
- Ctrl+V
- Mesclar todos e sobrescrever todos

Podemos fazer isso por que organizei a pasta dos arquivos-base numa estrutura similar à dos aplicativos do laravel

Copiar um a um

Também podemos copiar de um a um ou cada sub pasta.


Scaffold de autenticação com

composer require laravel/jetstream
php artisan jetstream:install livewire
npm install && npm run dev

ou

composer require laravel/ui
php artisan ui bootstrap --auth
npm install && npm run dev

Configuração do

config/app.php

array provision

        App\Providers\PermissionsServiceProvider::class,

