@extends('layouts.app')

@section('content')
<div class="section"></div>
  <main>
    <center>
        <img class="circle responsive-img" width="180px" src="imagens/alma.png">
      <div class="section"></div>

      <div class="container">
        <div class="z-depth-1 grey lighten-4 row" style="display: inline-block; padding: 32px 48px 0px 48px; border: 1px solid #EEE; width: 400px;">

          <form method="POST" action="{{ route('login') }}">
                        @csrf
            <div class='row'>
              <div class='col s12'>
              </div>
            </div>

            <div class='row'>
              <div class='input-field col s12'>
                <input class='validate' type='text' name='cpf' id='cpf' />
                <label for='cpf'>CPF</label>
              </div>
            </div>

            <div class='row'>
              <div class='input-field col s12'>
                <input class='validate' type='password' name='password' id='password' />
                <label for='password'>Entre com sua senha</label>
              </div>
            </div>

             <div class='row'>
              <div class='input-field col s12'>
                <label>
                <a class='pink-text' href='#!'><b>Esqueceu a senha?</b></a>
              </label>
              </div>
            </div> 
            

            <br />
            <center>
              <div class='row'>
                <button type='submit' name='btn_login' class='col s12 btn btn-large waves-effect indigo'>Login</button>
              </div>
            </center>
          </form>
        </div>
      </div>
      <a href="{{route('register')}}">Create account</a>
    </center>

    <div class="section"></div>
    <div class="section"></div>
  </main>

@endsection
