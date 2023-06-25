# Views

Esta solução de aCL é muito flexível.

Permite controle pelos controllers, pelas rotas e pelas views.

Podemos controlar o acesso até a cerrtas partes de uma view.

Exemplo:

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Clients</div>
                    <div class="card-body">
                        @role('super', 'manager')
                        <a href="{{ url('/admin/clients/create') }}" class="btn btn-success btn-sm" title="Add New Client">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>
                        @endrole

Veja que acima somente permitimos visualização/acesso ao botão New para users das roles super ou manager


