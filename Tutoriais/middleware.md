O middleware

app/Http/Middlewares/RoleMiddleware.php

Cria as diretivas role e can

    public function handle(Request $request, Closure $next, $role, $permission = null)

    {
        if(!$request->user()->hasRole($role)) {
             abort(404);

        }

        if($permission !== null && !$request->user()->can($permission)) {
              abort(404);
        }

        return $next($request);
    }


