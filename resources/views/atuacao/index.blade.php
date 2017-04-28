@extends('layouts.app')

@section('content')

    <section class="content-header">
        <h1>
            Atuações
            <small>detalhes</small>
        </h1>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Áreas de atuações</h3>
                        @if(Auth::check())
                            @if(Auth::user()->roles == 3)
                                <a href="{{ route('app.area.create') }}" class="btn btn-success pull-right" style="margin: 5px;">Nova área de atuação</a>
                            @endif
                        @endif
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        @if(count($perfomances) > 0)
                            <table class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Área</th>
                                    <th>Tipo</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($perfomances as $perfomance)
                                    <tr>
                                        <td>{{ $perfomance->id }}</td>
                                        <td>{{ $perfomance->area }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{ $perfomances->render() }}
                        @else
                            <h2 class="text-center"> Não há área de atuação cadastrada.</h2>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
