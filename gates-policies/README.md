# Controle de acesso com Gates e policies

Esta versão geralmente é para aplicativos mais simples.

Para um controle mais detalhado e com mais recursos use as soluções dos exemplos

composer create-project --prefer-dist laravel/laravel blog

Criar banco e configurar .env

## Criar migration

Para adicionar campo role na tabela users

php artisan make:migration add_role_column_to_users_table

Ajustar

    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->enum('role',  ['user', 'manager', 'admin'])->default('user');
        });
    }


php artisan migrate

## Adicionar dois users usando o tinker ou criar um seeder

php artisan tinker
$user = new App\Models\User;
$user->name = "Ribamar";
$user->email = "ribafs@gmail.com";
$user->password = Hash::make('123456');
$user->role = 'admin';
$user->save();

$user = new App\Models\User;
$user->name = "Elias";
$user->email = "elias@gmail.com";
$user->password = Hash::make('123456');
$user->role = 'manager';
$user->save();


## Adicionar o scaffold da autenticação

composer require laravel/ui

php artisan ui bootstrap --auth

npm install && npm run build

## Definir um gates customizado

app/Providers/AuthServiceProvider.php

<?php
namespace App\Providers;
  
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
  
class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
            
    ];
  
    public function boot()
    {
        $this->registerPolicies();
   
        /* define a admin user role */
        Gate::define('isAdmin', function($user) {
           return $user->role == 'admin';
        });
       
        /* define a manager user role */
        Gate::define('isManager', function($user) {
            return $user->role == 'manager';
        });
      
        /* define a user role */
        Gate::define('isUser', function($user) {
            return $user->role == 'user';
        });
    }
}

## Usar o gates na view home

resources/views/home.blade.php
@extends('layouts.app')
  
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
   
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
  
                    @can('isAdmin')
                        <div class="btn btn-success btn-lg">
                          You have Admin Access
                        </div>
                    @elsecan('isManager')
                        <div class="btn btn-primary btn-lg">
                          You have Manager Access
                        </div>
                    @else
                        <div class="btn btn-info btn-lg">
                          You have User Access
                        </div>
                    @endcan
  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

php artisan serve


Gates in Controller:
You can also check in Controller file as like bellow:
/**
 * Create a new controller instance.
 *
 * @return void
 */
public function delete()
{
    if (Gate::allows('isAdmin')) {
        dd('Admin allowed');
    } else {
        dd('You are not Admin');
    }
}
/**
 * Create a new controller instance.
 *
 * @return void
 */
public function delete()
{
    if (Gate::denies('isAdmin')) {
        dd('You are not admin');
    } else {
        dd('Admin allowed');
    }
}
/**
 * Create a new controller instance.
 *
 * @return void
 */
public function delete()
{
    $this->authorize('isAdmin');
}
/**
 * Create a new controller instance.
 *
 * @return void
 */
public function delete()
{
    $this->authorize('isUser');
}
Gates in Route with Middleware:
You can use role with middleware as like bellow:
Read Also: Laravel Scout Algolia Search Example
Route::get('/posts/delete', 'PostController@delete')->middleware('can:isAdmin')->name('post.delete');
  
Route::get('/posts/update', 'PostController@update')->middleware('can:isManager')->name('post.update');
  
Route::get('/posts/create', 'PostController@create')->middleware('can:isUser')->name('post.create');
I hope it can help you...

https://www.itsolutionstuff.com/post/laravel-gates-and-policies-tutorial-with-exampleexample.html

