# Model User

...
use App\Traits\HasPermissionsTrait;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use HasPermissionsTrait;

...
    // Nas versões 8 e 9 do laravel não existe uma segunda linha aqui abaixo, somente na versão 10
    protected $casts = [
        'email_verified_at' => 'datetime', 
    ];

}
