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
@endsection
