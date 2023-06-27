@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">

<!--CASO O USUÁRIO LOGADO SEJA DIRETOR OU ENCARREGADO-->
@if(Auth::user()->perfil < 2)

    @include('homes.diretor')

@else
<!--CASO O USUÁRIO LOGADO SEJA OUTRO-->
    @include('homes.usuario')

@endif

    </div>
</div>
@endsection
