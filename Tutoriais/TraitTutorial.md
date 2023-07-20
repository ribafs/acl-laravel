# Trait HasPermissionsTrait

O trait HasPermissionsTrait é peça fundamental do nosso aplicativo, com as principais funções para o controle de acesso.

/app/Traits/HasPermissionsTrait.php

Vejamos oo início do trait

<?php
namespace App\Traits;

use App\Models\Permission;
use App\Models\Role;

trait HasPermissionsTrait {

   public function roles() {
      return $this->belongsToMany(Role::class,'user_role');

   }

   public function permissions() {
      return $this->belongsToMany(Permission::class,'user_permission');

   }

    // ROLES

    // Parâmetro: roles. Ex: $user->hasRole('admin', 'super')
    // Checar se o user atual detem uma das roles especificadas
    // Retorno: true/false
   public function hasRole( ... $roles ) {
       foreach ($roles as $role) {
       if ($this->roles->contains('slug', $role)) {
             return true;
          }
       }
       return false;
    }


Este trait interage com os users através do modell User. Veja:

<?php

namespace App\Models;

...
use App\Traits\HasPermissionsTrait; // AQUI

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use HasPermissionsTrait; // AQUI


