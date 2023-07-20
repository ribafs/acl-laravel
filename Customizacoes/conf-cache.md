# Configurar cache

Para melhorar a performance, especialmente em produção, adicionar cache

file - driver padrão. Usado quando nenhum é indicado no .env

Para usar adicione ao .env

CACHE_DRIVER=file

Mais rápidoo que o file, requer a instalação da extensão

CACHE_DRIVER=redis

Preferir redis, que é mais rápido

Instalar redis em servidor linux com Debian ou derivada

sudo apt install php8.1-redis

sudo service apache2 restart

Alternativa

composer require predis/predis

When the installation is complete, we can find our Redis configuration settings in config/database.php. In the file, you will see a redis array containing the Redis server. By default, the client is set to phpredis, and since predis is being used in this tutorial, the client will be changed to predis:

'redis' => [

  'client' => env('REDIS_CLIENT', 'predis'),

  'options' => [
      'cluster' => env('REDIS_CLUSTER', 'redis'),
      'prefix' => env('REDIS_PREFIX', Str::slug(env('APP_NAME', 'laravel'), '_').'_database_'),
  ],

  'default' => [
      'url' => env('REDIS_URL'),
      'host' => env('REDIS_HOST', '127.0.0.1'),
      'password' => env('REDIS_PASSWORD', null),
      'port' => env('REDIS_PORT', '6379'),
      'database' => env('REDIS_DB', '0'),
  ],

],

No .env

REDIS_CLIENT=predis

https://github.com/predis/predis
https://www.honeybadger.io/blog/laravel-caching-redis/


