<div class="card">
    <div class="card-header">
        Meu Painel de Sócio
    </div>
    <div class="card-body">
        @if (session('negado'))
        <div class="alert alert-danger" role="alert">
            {{ session('negado') }}
        </div>
        @endif




    </div>
</div>