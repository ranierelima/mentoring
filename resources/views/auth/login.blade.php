@extends('layouts.app-auth')

@section('content')

    <!-- Login -->
    <div class="mt-login">
        <div class="mt-logo">
            <div class="mentoring-icon logoicon logoicon--mentoring"></div>
            <h2 class="mt-heading">Mentoring</h2>
        </div>

        <div class="mt-login-content">
            <form method="POST" action="{{ route('login.auth') }}">
                {{ csrf_field() }}
                <div class="form-email{{ $errors->has('email') ? ' has-error' : '' }}">
                    <input id="email" name="email" type="text" class="email" placeholder="E-mail" />
                    @if ($errors->has('email'))
                        <span class="help-block"><strong>{{ $errors->first('email') }}</strong></span>
                    @endif
                </div>

                <div class="form-password{{ $errors->has('password') ? ' has-error' : '' }}">
                    <input id="password" name="password" type="password" class="password" placeholder="Senha" />
                    @if ($errors->has('password'))
                        <span class="help-block"><strong>{{ $errors->first('password') }}</strong></span>
                    @endif
                </div>
            

                <div class="mt-login-btn">
                    <div class="submit">
                        <input type="submit" value="ENTRAR"/>
                    </div>


            
                    <div class="clear"></div>
                </div>
            </form>
        </div>
    </div>

    <div class="clear"></div>

    <div class="mt-registro">
        <ul>
            <li><p>Não possui <a href="{{ url('/register') }}">conta?</a></p></li>
            <span>|</span>
            <li><p>Esqueceu a <a href="{{ url('/password/reset') }}">senha?</a></p></li>
            <div class="clear"></div>
        </ul>
    </div>

@endsection