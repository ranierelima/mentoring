@extends('layouts.app')

@section('content')

    <section class="content-header">
        <h1>
            Eventos
            <small>detalhes</small>
        </h1>
	</section>
	
	<section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Listagem de eventos</h3>  <a href="{{ route('app.eventos.create') }}" class="btn btn-success pull-right"> Cadastrar Evento </a>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        @if(count($eventos) > 0)
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nome do Evento</th>
                                        <th>Local</th>
                                        <th>Data do Evento</th>
                                        <th>Telefone do Evento</th>
                                        <th>Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                        @foreach($eventos as $demand)
                                            <tr>
												
                                                <td>{{ $demand->id }}</td>
                                                <td>{{ $demand->nome }}</td>
                                                <td>{{ $demand->local }}</td>
                                                <td>{{ $demand->data_do_evento }}</td>
                                                <td>{{ $demand->telefone }}</td>
                                               <!-- <td> {{ $demand->telefone }}
                                                    @if($demand->status == 1)
                                                        <div class="label label-info">
                                                            {{ "Em espera" }}
                                                        </div>
                                                    @else
                                                        <div class="label label-success">
                                                            {{ "Avaliado" }}
                                                        </div>
                                                    @endif
                                                </td>-->
                                                <td>
                                                   <a href="{{ route('app.eventos.show', $demand->id)  }}"><button class="btn btn-success btn-sm">Visualizar</button></a>

                                                    @if(Auth::check())
                                                        @if(Auth::user()->roles == 1)

                                                    <a href="{{ route('app.eventos.edit', $demand->id)  }}"><button class="btn btn-info btn-sm">Editar</button></a>
                                                        @endif
                                                    @endif

                                                    @if(Auth::check())
                                                        @if(Auth::user()->roles == 2)
                                                    <a href=""><button class="btn btn-primary btn-sm">Avaliar</button></a>
                                                        @endif
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                </tbody>
                            </table>
                        @else
                            <h2 class="text-center"> Não há eventos.</h2>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection