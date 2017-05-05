@extends('layouts.app')

@section('content')

    <section class="content-header">
        <h1>
            Demandas
            <small>detalhes</small>
        </h1>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Listagem de demandas</h3>

                        @if(Auth::check())
                            @if(Auth::user()->roles == 1)
                                <a href="{{ route('app.demand.create') }}" class="btn btn-success pull-right" style="margin: 5px;">Nova demanda</a>
                            @endif
                        @endif

                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        @if(count($demands) > 0)
                            <table class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Email</th>
                                    <th>Assunto</th>
                                    <th>Status</th>
                                    <th>Ações</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($demands as $demand)
                                    <tr>
                                        <td>{{ $demand->id }}</td>
                                        <td>{{ $demand->email }}</td>
                                        <td>{{ $demand->subject }}</td>
                                        <td>
                                            @if($demand->status == 1)
                                                <div class="label label-info">
                                                    {{ "Em espera" }}
                                                </div>
                                            @elseif($demand->status == 2)
                                                <div class="label label-primary">
                                                    {{ "Encaminhado" }}
                                                </div>
                                            @else
                                                <div class="label label-success">
                                                    {{ "Avaliado" }}
                                                </div>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('app.demand.show', $demand->id)  }}"><button class="btn btn-success btn-sm">Visualizar</button></a>

                                            @if(Auth::check())
                                                @if(Auth::user()->roles == 3 && $demand->status == 1)
                                                    <a href="{{ route('app.demand.encaminhar', $demand->id)  }}"><button class="btn btn-primary btn-sm">Encaminhar</button></a>
                                                @endif
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <!-- Paginação apenas para administrador ou mentor  !! Atualização 04/05 by jm !!  -->
                            @if(Auth::check())
                                @if(Auth::user()->roles == 3)
                                    {{ $demands->render() }}
                                @endif
                            @endif

                        @else
                            <h2 class="text-center"> Não há solicitação de demandas.</h2>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
