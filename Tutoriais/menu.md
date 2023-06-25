Aqui são separados os usuários, enviando alguns somente para onde tem acesso
No caso, após o login cada usuário poderá acessar/ver somente o que tem acesso

<div class="col-md-2">
<!--
A ESPERA DE UMA UTILIDADE
Para tabelas com mais campos devemos remover o sidebar da view para deixar uma área maior para os mesmos
-->
    <div class="card">
        <div class="card-header">
            Menu
        </div>

        <div class="card-body">
      @role ('super')
            <ul class="nav" role="tablist">
                <li role="presentation">
                    <a href="{{ url('/admin/users') }}">
                        - Users
                    </a>
                </li>
            </ul>
            <ul class="nav" role="tablist">
                <li role="presentation">
                    <a href="{{ url('/admin/roles') }}">
                        - Roles
                    </a>
                </li>
            </ul>
            <ul class="nav" role="tablist">
                <li role="presentation">
                    <a href="{{ url('/admin/permissions') }}">
                        - Permissions
                    </a>
                </li>
            </ul>
            <hr>
            <ul class="nav" role="tablist">
                <li role="presentation">
                    <a href="{{ url('/admin/clients') }}">
                        - Clients
                    </a>
                </li>
            </ul>
      @endrole
      @role('admin')
            <ul class="nav" role="tablist">
                <li role="presentation">
                    <a href="{{ url('/admin/users') }}">
                        - Users
                    </a>
                </li>
            </ul>
            <ul class="nav" role="tablist">
                <li role="presentation">
                    <a href="{{ url('/admin/roles') }}">
                        - Roles
                    </a>
                </li>
            </ul>
            <ul class="nav" role="tablist">
                <li role="presentation">
                    <a href="{{ url('/admin/permissions') }}">
                        - Permissions
                    </a>
                </li>
            </ul>
      @endrole
      @role('manager')
            <ul class="nav" role="tablist">
                <li role="presentation">
                    <a href="{{ url('/admin/clients') }}">
                        - Clients
                    </a>
                </li>
            </ul>
      @endrole
      @role('user')
            <ul class="nav" role="tablist">
                <li role="presentation">
                    <a href="{{ url('/admin/clients') }}">
                        - Clients
                    </a>
                </li>
            </ul>
      @endrole
        </div>
    </div>
</div>
