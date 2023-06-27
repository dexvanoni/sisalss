@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Novo usuário</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">Selecione o tipo de usuário</label>
                            <div class="col-md-8">
                                <div class="input-field">
                                    <select name="perfil" id="seleciona">
                                      <option value="" disabled selected>Clique aqui...</option>
                                      <option value="0">Pres. AALMACG</option>
                                      <option value="1">Encarregado ALOF</option>
                                      <option value="2">Encarregado ALSS</option>
                                      <option value="3">Encarregado ALCTS</option>
                                      <option value="4">Diretor</option>
                                      <option value="5">Sócio</option>
                                      <option value="6">Dependente</option>
                                      <option value="7">Prestador de Serviço</option>
                                  </select>
                              </div>
                          </div>
                      </div> 

                      <div id="dep">
                          <!--SE FOR DEPENDENTE, PROCURA O SÓCIO-->
                          <div class="form-group row">
                            <label for="socio_id" class="col-md-4 col-form-label text-md-right">Sócio</label>

                            <div class="col-md-8">
                                <input id="socio_id" type="text" class="form-control{{ $errors->has('socio_id') ? ' is-invalid' : '' }}" name="socio_id" list="datalistOptions" oninput="updateText()">

                                <datalist id="datalistOptions">
                                    @php
                                        $lista_socios = App\User::where('categoria', 'SÓCIO')->get();
                                    @endphp
                                    @foreach ($lista_socios as $l)
                                        <option value="{{$l->id}}">{{$l->saram}} - {{$l->posto}} {{$l->nguerra}}</option>
                                    @endforeach
                                </datalist>
                            </div>
                        </div>
                    </div>
                      
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-right">Selecione a área</label>
                        <div class="col-md-8">
                            <div class="input-field">
                                <select name="perfil" id="seleciona">
                                  <option value="" disabled selected>Clique aqui...</option>
                                  <option value="0">ALOF</option>
                                  <option value="1">ALSS</option>
                                  <option value="2">ALCTS</option>
                              </select>
                          </div>
                      </div>
                  </div> 

                  <hr>                       

                  <div class="form-group row" id="posto">
                    <label class="col-md-4 col-form-label text-md-right">Posto/Grad.</label>
                    <div class="col-md-8">
                        <div class="input-field">
                            <select name="posto">
                              <option value="" disabled selected>Clique aqui...</option>
                              <option value="Brig">Brig</option>
                              <option value="Cel">Cel</option>
                              <option value="Ten Cel">Ten Cel</option>
                              <option value="Maj">Maj</option>
                              <option value="Cap">Cap</option>
                              <option value="1º Ten">1º Ten</option>
                              <option value="2º Ten">2º Ten</option>
                              <option value="Asp">Asp</option>
                              <option value="SO">SO</option>
                              <option value="1S">1S</option>
                              <option value="2S">2S</option>
                              <option value="3S">3S</option>
                              <option value="CB">CB</option>
                              <option value="TM">TM</option>
                              <option value="S1">S1</option>
                              <option value="T1">T1</option>
                              <option value="S2">S2</option>
                              <option value="T2">T2</option>
                              <option value="CV">CV</option>
                          </select>
                      </div>
                  </div>
              </div> 

              <div class="form-group row" id="nguerra">
                <label for="nguerra" class="col-md-4 col-form-label text-md-right">Nome de guerra</label>

                <div class="col-md-8">
                    <input id="nguerra" type="text" class="form-control{{ $errors->has('nguerra') ? ' is-invalid' : '' }}" name="nguerra" autofocus>

                    @if ($errors->has('nguerra'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('nguerra') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right">Nome completo</label>

                <div class="col-md-8">
                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                    @if ($errors->has('name'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="cpf" class="col-md-4 col-form-label text-md-right">CPF</label>

                <div class="col-md-8">
                    <input id="cpf" type="text" class="form-control{{ $errors->has('cpf') ? ' is-invalid' : '' }}" name="cpf" value="{{ old('cpf') }}" required autofocus>

                    @if ($errors->has('cpf'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('cpf') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="saram" class="col-md-4 col-form-label text-md-right">SARAM</label>

                <div class="col-md-8">
                    <input id="saram" type="text" class="form-control{{ $errors->has('saram') ? ' is-invalid' : '' }}" name="saram" value="{{ old('saram') }}" required autofocus>

                    @if ($errors->has('saram'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('saram') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="identidade" class="col-md-4 col-form-label text-md-right">Identidade</label>

                <div class="col-md-8">
                    <input id="identidade" type="text" class="form-control{{ $errors->has('identidade') ? ' is-invalid' : '' }}" name="identidade" value="{{ old('identidade') }}" required autofocus>

                    @if ($errors->has('identidade'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('identidade') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>

                <div class="col-md-8">
                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                    @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <input type="hidden" name="status" value="A">

            <div class="form-group row" id="funcao">
                <label class="col-md-4 col-form-label text-md-right">Função</label>
                <div class="col-md-8">
                    <div class="input-field">
                        <select name="funcao">
                          <option value="" disabled selected>Clique aqui...</option>
                          <option value="1">Presidente AALMACG</option>
                          <option value="2">Encarregado</option>
                          <option value="3">Diretor Administrativo</option>
                          <option value="4">Diretor de Esporte</option>
                          <option value="5">Diretor Financeiro</option>
                          <option value="6">Diretor de Patrimônio</option>
                          <option value="7">Diretor de Infraestrutura</option>
                          <option value="8">Diretor de Eventos</option>
                          <option value="9">Diretor de Pub/Propaganda</option>
                          <option value="10">Diretor de Esporte</option>
                      </select>
                  </div>
              </div>
          </div>

          <div class="form-group row">
            <label class="col-md-4 col-form-label text-md-right">Validade</label>
            <div class="col-md-8">
              <input type="date" class="datepicker">
          </div>
      </div> 

      <!--TERMINA PRESIDENTE-->

      <!--COMUM-->
      <div class="form-group row">
        <label for="foto" class="col-md-4 col-form-label text-md-right">Foto</label>

        <div class="col-md-8">
            <div class="file-field input-field">
              <div class="btn">
                  <i class="material-icons">add_a_photo</i>
                  <input type="file" id="foto">
              </div>
              <div class="file-path-wrapper">
                <input class="file-path validate" type="text">
            </div>
        </div>
        <span id="error-msg" style="color: red;"></span>
    </div>
</div>

<div class="form-group row">
    <label for="password" class="col-md-4 col-form-label text-md-right">Senha</label>

    <div class="col-md-8">
        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }} validate" name="password" value="@!T1q2w3e4r" required>

        <i class="material-icons toggle-password">visibility</i>

        @if ($errors->has('password'))
        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('password') }}</strong>
        </span>
        @endif
    </div>
</div>

<div class="form-group row">
    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirma senha</label>

    <div class="col-md-8">
        <input id="password-confirm" type="password" class="form-control validate" name="password_confirmation" value="@!T1q2w3e4r" required>
        <i class="material-icons toggle-password">visibility</i>
    </div>
</div>

<div class="form-group row mb-0">
    <div class="col-md-8 offset-md-4">
        <button type="submit" class="btn btn-primary">
            CADASTRAR
        </button>
    </div>
</div>
</form>
</div>
</div>
</div>
</div>
</div>

<script type="text/javascript">
    $('#seleciona').change(function() {
    var selectedOption = $(this).val();
    
    // Lógica para mostrar ou ocultar as divs com base na opção selecionada
    if (selectedOption === '6') {
      $('#dep').show();
      $('#posto').hide();
      $('#nguerra').hide();
      $('#funcao').hide();
    } else {
      $('#dep').hide();
      $('#posto').show();
      $('#nguerra').show();
      $('#funcao').show();
    }
  });
</script>
  <script>
    function updateText() {
      var inputField = document.getElementById('socio_id');
      var datalistOptions = document.getElementById('datalistOptions');
      var selectedOption = null;

      for (var i = 0; i < datalistOptions.options.length; i++) {
        var option = datalistOptions.options[i];

        if (option.value === inputField.value) {
          selectedOption = option;
          break;
        }
      }

      if (selectedOption) {
        inputField.value = selectedOption.innerText;
      }
    }
  </script>

@endsection
