@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="alert alert-success" role="alert">
              @if(Auth::user()->perfil == 1)
                        Olá Diretor! Este é seu Dashboard
                    @elseif (Auth::user()->perfil == 0)
                        Olá Encarregado! Este é o seu Dashboard
                    @else
                        @php
                            $primeiroNome = explode(" ", Auth::user()->name);
                        @endphp    
                        Olá Sr(a). {{$primeiroNome[0]}}, este é o seu Dashboard!
                @endif
            </div>
            <div class="card">
                <div class="card-header">
                    Meu Painel
                </div>

                <div class="card-body">
                    @if (session('negado'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('negado') }}
                        </div>
                    @endif

                    <a href="{{route('carteira.index')}}">clica</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
