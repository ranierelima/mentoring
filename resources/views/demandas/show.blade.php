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
            <div class="col-md-12">
                <!-- Horizontal Form -->
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Visualizar demanda</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form class="form-horizontal" method="POST" name="form" action="{{ route('app.demand.responder') }}">
                        <div class="box-body">
                            <input type="hidden" value="{{ $demand->id }}" name="demand_id">
                            <div class="form-group">

                                <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-2 control-label">E-mail</label>

                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="inputPassword3" placeholder="E-mail" name="email" value="{{ $demand->email }}" disabled>
                                    </div>
                                </div>

                                @if($demand->status == 2)
                                    @if($mentor)
                                        <div class="form-group">
                                            <label for="inputPassword3" class="col-sm-2 control-label">Mentor</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" id="inputPassword3" placeholder="E-mail" name="email" value="{{ $mentor->name }}" disabled>
                                            </div>
                                        </div>
                                    @endif
                                @endif

                                <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-2 control-label">Título</label>

                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="inputPassword3" placeholder="Título" name="title" value="{{ $demand->title }}" disabled>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-2 control-label">Assunto</label>

                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="inputPassword3" placeholder="Assunto" name="subject" value="{{ $demand->subject }}" disabled>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-2 control-label">Dúvida</label>

                                    <div class="col-sm-6">
                                        {{ Form::textarea('doubt', $demand->doubt, ['class' => 'form-control', 'disabled' => 'disabled']) }}
                                    </div>
                                </div>

                                @if($demand->status == 3)
                                    <div class="form-group">
                                        <h3 class="col-md-12" style="margin-left: 250px;">Respondido por:
                                            @if($mentor)
                                                {{ $mentor->name }}
                                            @endif
                                        </h3>
                                        <label for="inputPassword3" class="col-sm-2 control-label">Resposta:</label>

                                        <div class="col-sm-6">
                                            {{ Form::textarea('answer', $demand->answer, ['class' => 'form-control', 'disabled' => 'disabled']) }}
                                        </div>
                                    </div>
                                @endif

                                @if(Auth::check())
                                    @if(Auth::user()->roles == 2)
                                        @if($demand->status == 2)
                                            <div class="col-md-2">
                                                 <button type="submit" class="btn btn-block btn-info btn-flat" style="margin-left: 110%;">Responder</button>
                                            </div>
                                         @endif
                                    @endif
                                @endif

                            </div>
                        </div>
                            <!-- /.box-body -->
                            <!-- /.box-footer -->
                    </form>
                </div>

            </div>

        </div>
    </section>

@endsection
