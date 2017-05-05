@extends('layouts.app')

@section('content')
    <h2>Logado como:

        @if(Auth::check())

                @if(Auth::user()->roles == 1)
                    {{ "Aluno" }}



                @endif

                @if(Auth::user()->roles == 2)
                    {{ "Mentor" }}

                @endif

                @if(Auth::user()->roles == 3)
                    {{ "Administrador" }}

                @endif
        @endif

    </h2>



    @if(Auth::check())

        @if(Auth::user()->roles == 1)

            <div class="container">
                <div class="row">
                    <h2>OI ALUNO</h2>
                </div>
            </div>

        @endif

        @if(Auth::user()->roles == 2)

            <div class="container">
                <div class="row">
                    <h2>OI mentor</h2>
                </div>
            </div>

        @endif

        @if(Auth::user()->roles == 3)

            <div class="container">
                <div class="row">
                    <h2>OI adm</h2>
                </div>
            </div>

        @endif

    @endif








@endsection
