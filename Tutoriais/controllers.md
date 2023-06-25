# Controllers

Os controllers interagem com as roles controladas pelo trait e também pelos seeders.

...
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');        
    }

    public function index(Request $request)
    {
        $auth = Auth::user()->hasRole('super', 'manager');
        if((!$auth)){
            return view('home');
        }else{
// Aqui abaixo somente será executado o que pertencer à role super ou à role manager. Veja no aplicativo

Cada action tem este trecho:

        $auth = Auth::user()->hasRole('super', 'manager');
        if((!$auth)){
            return view('home');
        }else{

Que define o acesso.

