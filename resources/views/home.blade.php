@extends('layouts.app')

@section('content')

    @if(Auth::check())

        @if(Auth::user()->roles == 1)

            <!-- Main content -->
            <section class="content">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-aqua">
                            <div class="inner">
                                <h3>97</h3>

                                <p>Minhas Demandas</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion"></i>
                            </div>
                        </div>


                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-green">
                            <div class="inner">
                                <h3>83<sup style="font-size: 20px">%</sup></h3>

                                <p>Banco de Demandas</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion"></i>
                            </div>
                        </div>
                    </div>
                    <!-- ./col -->

                    <!-- ./col -->
                </div>
                <!-- /.row -->
                <!-- Main row -->
            </section>


            @endif

            @if(Auth::user()->roles == 2)

                <!-- Main content -->
                    <section class="content">
                        <!-- Small boxes (Stat box) -->
                        <div class="row">
                            <div class="col-lg-3 col-xs-6">
                                <!-- small box -->
                                <div class="small-box bg-aqua">
                                    <div class="inner">
                                        <h3>97</h3>

                                        <p>Demandas Abertas</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion"></i>
                                    </div>
                                </div>


                            </div>
                            <!-- ./col -->
                            <div class="col-lg-3 col-xs-6">
                                <!-- small box -->
                                <div class="small-box bg-green">
                                    <div class="inner">
                                        <h3>83<sup style="font-size: 20px">%</sup></h3>

                                        <p>Demandas respondidas</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion"></i>
                                    </div>
                                </div>
                            </div>
                            <!-- ./col -->
                            <!-- ./col -->
                            <div class="col-lg-3 col-xs-6">
                                <!-- small box -->
                                <div class="small-box bg-red">
                                    <div class="inner">
                                        <h3>65</h3>

                                        <p>Banco de Demandas</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion"></i>
                                    </div>
                                </div>
                            </div>
                            <!-- ./col -->

                        </div>
                        <!-- /.row -->
                        <!-- Main row -->
                        <div class="row">
                            <!-- Left col -->



                            <!-- /.Left col -->
                            <!-- right col (We are only adding the ID to make the widgets sortable)-->
                            <section class="col-lg-5 connectedSortable">







                            </section>
                            <!-- right col -->
                        </div>
                        <!-- /.row (main row) -->

                    </section>
                    <!-- /.content -->
                    </div>
                    <!-- /.content-wrapper -->

            @endif

            @if(Auth::user()->roles == 3)
                <!-- Main content -->
                    <section class="content">
                        <!-- Small boxes (Stat box) -->
                        <div class="row">
                            <div class="col-lg-3 col-xs-6">
                                <!-- small box -->
                                <div class="small-box bg-aqua">
                                    <div class="inner">
                                        <h3>97</h3>

                                        <p>Alunos</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-university"></i>
                                    </div>
                                </div>


                            </div>
                            <!-- ./col -->
                            <div class="col-lg-3 col-xs-6">
                                <!-- small box -->
                                <div class="small-box bg-green">
                                    <div class="inner">
                                        <h3>83<sup style="font-size: 20px">%</sup></h3>

                                        <p>Taxa de resposta</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-stats-bars"></i>
                                    </div>
                                </div>
                            </div>
                            <!-- ./col -->
                            <div class="col-lg-3 col-xs-6">
                                <!-- small box -->
                                <div class="small-box bg-yellow">
                                    <div class="inner">
                                        <h3>21</h3>

                                        <p>Mentores</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-ribbon-b"></i>
                                    </div>
                                </div>
                            </div>
                            <!-- ./col -->
                            <div class="col-lg-3 col-xs-6">
                                <!-- small box -->
                                <div class="small-box bg-red">
                                    <div class="inner">
                                        <h3>65</h3>

                                        <p>Banco de Demandas</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-document-text"></i>
                                    </div>
                                </div>
                            </div>
                            <!-- ./col -->
                        </div>

                    </section>
             @endif
         @endif

@endsection