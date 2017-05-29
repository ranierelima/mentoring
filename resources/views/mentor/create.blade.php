@extends('layouts.app')

@section('content')

    <section class="content-header">
        <h1>
            Mentor
            <small>detalhes</small>
        </h1>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <!-- Horizontal Form -->
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Novo mentor</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form class="form-horizontal" method="POST" name="form" action="{{ route('app.mentor.store') }}">

                        <div class="box-body">

                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-2 control-label">Nome</label>

                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="inputPassword3" placeholder="Digite o seu nome" name="name">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-2 control-label">E-mail</label>

                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="inputPassword3" placeholder="Digite o seu e-mail" name="email">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-2 control-label">Senha</label>

                                <div class="col-sm-6">
                                    <input type="password" class="form-control" id="inputPassword3" placeholder="Digite sua senha" name="password">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-2 control-label">Confirmar senha</label>

                                <div class="col-sm-6">
                                    <input type="password" class="form-control" id="inputPassword3" placeholder="Confirme sua senha" name="password_confirm">
                                </div>
                            </div>

                            {{--<div class="form-group">--}}
                                {{--<label for="inputPassword3" class="col-sm-2 control-label">Área de conhecimento:</label>--}}
                                {{--<div class="col-sm-6">--}}
                                    {{--<select class="form-control" name="id">--}}
                                        {{--<option value="">Selecione uma área de conhecimento</option>--}}
                                    {{--</select>--}}
                                {{--</div>--}}
                            {{--</div>--}}

                            <div class="col-md-2">
                                    <button type="submit" class="btn btn-block btn-success btn-flat" style="margin-left: 110%;">Cadastrar</button>
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
