# Model User

O model User é importante para nosso sistema de ACL.

Ele interage com o trait.

...
use App\Traits\HasPermissionsTrait;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use HasPermissionsTrait;
...

