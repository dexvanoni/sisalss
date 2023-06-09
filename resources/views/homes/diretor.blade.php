        <div class="card">
            <div class="card-header">
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

            <div class="card-body">
                @if (session('negado'))
                <div class="alert alert-danger" role="alert">
                    {{ session('negado') }}
                </div>
                @endif

                <!--RESERVAS-->
                <div class="row">
                    <div class="col s4">
                        <div class="card" style="height: 300px; ; overflow-y: auto; border-radius: 30px;">
                            <div class="card-header" style="background-color: #00b8d4;">
                                <label style="color: white; font-size: 20px;">Reservas em aberto</label>
                            </div>

                            @php
                            if (Auth::user()->area == 'ALOF') {
                                $reservas = App\Reserva::where('status', '=', 'A')->where('area', '=', 'ALOF')->get();    
                            }elseif (Auth::user()->area == 'ALSS') {
                                $reservas = App\Reserva::where('status', '=', 'A')->where('area', '=', 'ALSS')->get();    
                            }else{
                                $reservas = App\Reserva::where('status', '=', 'A')->where('area', '=', 'ALCTS')->get();
                            }
                            @endphp

                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Data do Evento</th>
                                        <th>Local</th>
                                        <th>Sócio</th>
                                        <th>PG</th>
                                        <th>Ação</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($reservas as $r)
                                    <tr>
                                        <td>{{date('d/m/Y', strtotime($r->dt_evento))}}</td>
                                        <td>{{$r->espaco}}</td>
                                        @php $socio = App\User::where('id', '=', $r->user_id)->first() @endphp
                                        <td>{{$socio->posto}} {{$socio->nguerra}} @if(is_null($socio->nguerra)) {{$socio->name}} @endif</td>
                                        <td>{{$r->status_pg}}</td>
                                        <td>
                                            <a title="Atender Reserva" href="{{ route('reserva.edit', [$r->id]) }}">
                                               <i class="material-icons">alarm_on</i>
                                           </a>
                                       </td>
                                   </tr>
                                   @endforeach
                               </tbody>
                           </table>
                       </div>
                   </div>
                   <div class="col s4">
                     <div class="card scrolling-wrapper-flexbox" style="height: 300px; overflow-y: auto; border-radius: 30px;">
                        <div class="card-header" style="background-color: #00b8d4;">
                            <label style="color: white; font-size: 20px;">Eventos de Hoje</label>
                        </div>

                        @php
                        $dt = Carbon\Carbon::now()->format('Y-m-d');

                        if (Auth::user()->area == 'ALOF') {
                            $eventos_hoje = DB::table('reservas')->where([
                                ['status', '=', 'C'],
                                ['status_pg', '=', 'SIM'],
                                ['dt_evento', '=', $dt],
                                ['area', '=', 'ALOF'],
                            ])->get();
                        }elseif (Auth::user()->area == 'ALSS') {
                            $eventos_hoje = DB::table('reservas')->where([
                                ['status', '=', 'C'],
                                ['status_pg', '=', 'SIM'],
                                ['dt_evento', '=', $dt],
                                ['area', '=', 'ALSS'],
                            ])->get();
                        }elseif (Auth::user()->area == 'ALCTS') {
                            $eventos_hoje = DB::table('reservas')->where([
                                ['status', '=', 'C'],
                                ['status_pg', '=', 'SIM'],
                                ['dt_evento', '=', $dt],
                                ['area', '=', 'ALCTS'],
                            ])->get();
                        }
                        @endphp

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Data do Evento</th>
                                    <th>Local</th>
                                    <th>Sócio</th>
                                    <th>Ação</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(!empty($eventos_hoje))
                                    @foreach ($eventos_hoje as $e)
                                    <tr>
                                        <td>{{date('d/m/Y', strtotime($e->dt_evento))}}</td>
                                        <td>{{$e->espaco}}</td>
                                        @php $socio = App\User::where('id', '=', $e->user_id)->first() @endphp
                                        <td>{{$socio->posto}} {{$socio->nguerra}} @if(is_null($socio->nguerra)) {{$socio->name}} @endif</td>
                                        <td>
                                            <a title="Candelar Reserva" href="{{ route('reserva.edit', [$e->id]) }}">
                                               <i class="material-icons" style="color: red">close</i>
                                           </a>
                                       </td>
                                   </tr>
                                   @endforeach
                               @else
                               Sem evento hoje!
                               @endif
                           </tbody>
                       </table>
                   </div> 
               </div>
               <div class="col s4">
                <div class="card" style="height: 300px; ; overflow-y: auto; border-radius: 30px;">
                    <div class="card-header"  style="background-color: #00b8d4;">
                        <label style="color: white; font-size: 20px;">Cautelas em uso</label>
                    </div>

                    @php
                    if (Auth::user()->area == 'ALOF') {
                        $cautelas = App\Cautela::where('status', '=', 'EM USO')->where('area', '=', 'ALOF')->where('validade', '>=', Carbon\Carbon::now()->format('Y-m-d'))->get();    
                    }elseif (Auth::user()->area == 'ALSS') {
                        $cautelas = App\Cautela::where('status', '=', 'EM USO')->where('area', '=', 'ALSS')->where('validade', '>=', Carbon\Carbon::now()->format('Y-m-d'))->get();    
                    }else{
                        $cautelas = App\Cautela::where('status', '=', 'EM USO')->where('area', '=', 'ALCTS')->where('validade', '>=', Carbon\Carbon::now()->format('Y-m-d'))->get();
                    }
                    @endphp

                    <table class="table">
                        <thead>
                            <tr>
                                <th>Sócio/Dep.</th>
                                <th>Item</th>
                                <th>Qnt</th>
                                <th>Validade</th>
                                <th>Ação</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($cautelas as $r)
                            <tr>
                                @php $socio = App\User::where('id', '=', $r->user_id)->first() @endphp
                                <td>{{$socio->posto}} {{$socio->nguerra}} @if(is_null($socio->nguerra)) {{$socio->name}} @endif</td>
                                @php $material = App\Material::where('id', '=', $r->material_id)->first() @endphp
                                <td>{{$material->produto}}</td>
                                <td>{{$r->qtn}}</td>
                                <td>{{date('d/m/Y', strtotime($r->validade))}}</td>
                                <td>
                                    <a title="Devolução" href="{{ route('cautela.edit', [$r->id]) }}">
                                       <i class="material-icons">loop</i>
                                   </a>
                               </td>
                           </tr>
                           @endforeach
                       </tbody>
                   </table>
               </div>
           </div>
           <div class="col s4">
            <div class="card scrolling-wrapper-flexbox" style="height: 300px; overflow-y: auto; border-radius: 30px;">
                <div class="card-header" style="background-color: #ef9a9a;">
                    <label style="color: black; font-size: 20px;">Cautelas VENCIDAS</label>
                </div>

                @php
                if (Auth::user()->area == 'ALOF') {
                    $vencidas = App\Cautela::where('status', '=', 'EM USO')->where('area', '=', 'ALOF')->where('validade', '<', Carbon\Carbon::now()->format('Y-m-d'))->get();    
                }elseif (Auth::user()->area == 'ALSS') {
                    $vencidas = App\Cautela::where('status', '=', 'EM USO')->where('area', '=', 'ALSS')->where('validade', '<', Carbon\Carbon::now()->format('Y-m-d'))->get();    
                }else{
                    $vencidas = App\Cautela::where('status', '=', 'EM USO')->where('area', '=', 'ALCTS')->where('validade', '<', Carbon\Carbon::now()->format('Y-m-d'))->get();
                }
                @endphp

                <table class="table">
                    <thead>
                        <tr>
                            <th>Sócio/Dep.</th>
                            <th>Item</th>
                            <th>Qnt</th>
                            <th>Validade</th>
                            <th>Ação</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($vencidas as $v)
                        <tr>
                            @php $socio = App\User::where('id', '=', $v->user_id)->first() @endphp
                            <td>{{$socio->posto}} {{$socio->nguerra}} @if(is_null($socio->nguerra)) {{$socio->name}} @endif</td>
                            @php $material = App\Material::where('id', '=', $v->material_id)->first() @endphp
                            <td>{{$material->produto}}</td>
                            <td>{{$v->qtn}}</td>
                            <td>{{date('d/m/Y', strtotime($v->validade))}}</td>
                            <td>
                                <a title="Devolução" href="{{ route('cautela.edit', [$v->id]) }}">
                                   <i class="material-icons" style="color: red">loop</i>
                               </a>
                           </td>
                       </tr>
                       @endforeach
                   </tbody>
               </table>
           </div>
       </div>
   </div>
   <!--FINAL RESERVAS-->
</div>
</div>

<!--SEGUNDA LINHA-->
<div class="card">
    <div class="card-body">
        @if (session('negado'))
        <div class="alert alert-danger" role="alert">
            {{ session('negado') }}
        </div>
        @endif

        <!--RESERVAS-->
        <div class="row">
            <div class="col s4"> 
                <div class="card" style="height: 300px; overflow-y: auto;; border-radius: 30px;">
                    <div class="card-header" style="background-color: #00b8d4;">
                        <label style="color: white; font-size: 20px;">Alterações do Serviço passado</label>
                    </div>

                    @php
                    if (Auth::user()->area == 'ALOF') {
                        $livros = App\Livro::whereDate('created_at', Carbon\Carbon::now()->subDay())->where('area', '=', 'ALOF')->get();    
                    }elseif (Auth::user()->area == 'ALSS') {
                        $livros = App\Livro::whereDate('created_at', Carbon\Carbon::now()->subDay())->where('area', '=', 'ALSS')->get();    
                    }else{
                        $livros = App\Livro::whereDate('created_at', Carbon\Carbon::now()->subDay())->where('area', '=', 'ALCTS')->get();    
                    }
                    @endphp

                    <div class="row">
                        <div class="col-md-12">
                            <p><strong>Alteração:</strong></p>
                            @foreach($livros as $liv)
                            <p>{{$liv->alteracao}}</p>
                            @endforeach
                            <hr>
                            <p><strong>Rancho:</strong></p>
                            @foreach($livros as $livr)
                            <p>{{$livr->rancho}}</p>
                            @endforeach
                            <hr>
                            <p><strong>Disciplina:</strong></p>
                            @foreach($livros as $livro)
                            @php $punido = App\User::where('id', $livro->puni_user_id)->first(); @endphp
                            <p>{{$punido->posto}} {{$punido->nguerra}} - {{$punido->name}}</p>
                            <p>{{$livro->punicao}}</p>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="col s4">
             <div class="card scrolling-wrapper-flexbox" style="height: 300px; overflow-y: auto; border-radius: 30px;">
                <div class="card-header" style="background-color: #00b8d4;">
                    <label style="color: white; font-size: 20px;">Materiais (estoque mínimo)</label>
                </div>

                @php
                if (Auth::user()->area == 'ALOF') {
                    $materiais = DB::table('materiais')
                    ->whereRaw('qtn <= estoque_minimo')
                    ->where('area', '=', 'ALOF')
                    ->get(); 

                }elseif (Auth::user()->area == 'ALSS') {
                    $materiais = DB::table('materiais')
                    ->whereRaw('qtn <= estoque_minimo')
                    ->where('area', '=', 'ALSS')
                    ->get();
                }else{
                    $materiais = DB::table('materiais')
                    ->whereRaw('qtn <= estoque_minimo')
                    ->where('area', '=', 'ALCTS')
                    ->get();     
                }
                @endphp

                <table class="table">
                    <thead>
                        <tr>
                            <th>Material</th>
                            <th>Qtn</th>
                            <th>Ação</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($materiais as $mat)
                        <tr>
                            <td>{{$mat->produto}}</td>
                            <td>{{$mat->qtn}}</td>
                            <td>
                                <a title="Editar Material" href="{{ route('material.edit', [$mat->id]) }}">
                                   <i class="material-icons" style="color: green">business_center</i>
                               </a>
                           </td>
                       </tr>
                       @endforeach
                   </tbody>
               </table>
           </div> 
       </div>
       <div class="col s4">
        <div class="card" style="height: 300px; overflow-y: auto; border-radius: 30px;">
            <div class="card-header"  style="background-color: #00b8d4;">
                <label style="color: white; font-size: 20px;">Espaços disponíveis para hoje e amanhã</label>
            </div>

            @php

            if (Auth::user()->area == 'ALOF') {
                $espacos = App\Espaco::where('area', 'ALOF')->get();

                $vagas = DB::table('reservas')
                ->whereBetween('dt_evento', [Carbon\Carbon::now()->format('Y-m-d'), Carbon\Carbon::now()->addDay(1)->format('Y-m-d')])
                ->where('status', '=','C')
                ->get();

                foreach ($espacos as $e) {
                    if (!$vagas->contains('espaco', $e->local)) {
                        $vg[] = $e->local;
                    }
                }

            } elseif (Auth::user()->area == 'ALSS') {
                $espacos = App\Espaco::where('area', 'ALSS')->get();

                $vagas = DB::table('reservas')
                ->whereBetween('dt_evento', [Carbon\Carbon::now()->format('Y-m-d'), Carbon\Carbon::now()->addDay(1)->format('Y-m-d')])
                ->where('status', '=','C')
                ->get();

                foreach ($espacos as $e) {
                    if (!$vagas->contains('espaco', $e->local)) {
                        $vg[] = $e->local;
                    }
                }

            }else{
                $espacos = App\Espaco::where('area', 'ALCTS')->get();

                $vagas = DB::table('reservas')
                ->whereBetween('dt_evento', [Carbon\Carbon::now()->format('Y-m-d'), Carbon\Carbon::now()->addDay(1)->format('Y-m-d')])
                ->where('status', '=','C')
                ->get();

                foreach ($espacos as $e) {
                    if (!$vagas->contains('espaco', $e->local)) {
                        $vg[] = $e->local;
                    }
                }
            }

            @endphp

            <table class="table">
                <thead>
                    <tr>
                        <th>Espaço</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($vg as $v)
                    <tr>
                        <td>{{$v}}</td>
                        <td>
                            <a title="Fazer reserva" href="{{ route('reserva.create') }}">
                               <i class="material-icons">add_location</i>
                           </a>
                       </td>
                   </tr>
                   @endforeach
               </tbody>
           </table>
       </div>
   </div>
   <div class="col s4">
    <div class="card scrolling-wrapper-flexbox" style="height: 300px; overflow-y: auto; border-radius: 30px;">
        <div class="card-header" style="background-color: #ff9800;">
            <label style="color: black; font-size: 20px;">Mensalidades VENCIDAS</label>
        </div>

        @php
        if (Auth::user()->area == 'ALOF') {
            $mens = App\Cautela::where('status', '=', 'EM USO')->where('area', '=', 'ALOF')->where('validade', '<', Carbon\Carbon::now()->format('Y-m-d'))->get();    
        }elseif (Auth::user()->area == 'ALSS') {
            $mes_referencia =  Carbon\Carbon::now()->subMonth(1)->month;
            $mens = App\Mensalidade::where('mes_referente', '<>', $mes_referencia)
                    ->where('area', '=', 'ALSS')
                    ->get();

        }else{
            $vencidas = App\Cautela::where('status', '=', 'EM USO')->where('area', '=', 'ALCTS')->where('validade', '<', Carbon\Carbon::now()->format('Y-m-d'))->get();
        }
        @endphp

        <table class="table">
            <thead>
                <tr>
                    <th>Serviço</th>
                    <th>Sócio/Dep</th>
                    <th>Vencimento</th>
                    <th>Mês REF.</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
                @if(!empty($mens))
                    @foreach ($mens as $b)
                    <tr>
                        @php $s = App\Servico::where('id', $b->servico_id)->first(); @endphp
                        <td>{{$s->servico}}</td>
                        @php $a = App\Aluno::where('user_id', $b->aluno_id_pago)->first(); $u = App\User::where('id', $a->user_id)->first(); @endphp
                        <td>{{$u->name}}</td>
                        <td>{{$s->dt_pg}}</td>
                        <td>{{Carbon\Carbon::now()->subMonth(1)->month}}</td>
                        <td>
                            <a title="PAGAR" href="{{ route('mensalidade.edit', [$b->id]) }}">
                               <i class="material-icons" style="color: red">attach_money</i>
                           </a>
                       </td>
                   </tr>
                   @endforeach
               @endif
           </tbody>
       </table>
   </div>
</div>
</div>
<!--FINAL RESERVAS-->
</div>
</div>
<!--TÉRMINO DA SEGUNDA LINHA-->
