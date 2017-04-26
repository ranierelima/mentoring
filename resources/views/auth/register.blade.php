@extends('layouts.app-auth')

@section('content')

    <!-- Register -->
    <div class="mt-login">
        <div class="mt-logo">
            <div class="mentoring-icon logoicon logoicon--mentoring"></div>
            <h2 class="mt-heading">Mentoring</h2>
        </div>

        <div class="mt-login-content">
            <form method="POST" action="{{ url('/register') }}">
                {{ csrf_field() }}
                <div class="form-nome{{ $errors->has('name') ? ' has-error' : '' }}">
                    <input id="name" name="name" type="text" class="name" placeholder="Seu nome" />
                    @if ($errors->has('name'))
                        <span class="help-block"><strong>{{ $errors->first('name') }}</strong></span>
                    @endif
                </div>

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

                <div class="form-comfirma{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                    <input id="password_confirmation" name="password_confirmation" type="password" class="password-confirm" placeholder="Confirme a senha" />
                    @if ($errors->has('password_confirmation'))
                        <span class="help-block"><strong>{{ $errors->first('password_confirmation') }}</strong></span>
                    @endif
                </div>
            

                <div class="mt-login-btn">
                    <div class="submit">
                        <input type="submit" value="REGISTRAR"/>
                    </div>
                    <ul>
                        <li><a href="#"><span class="face"></span></a></li>
                        <li><a href="#"><span class="twit"></span></a></li>
                        <li><a href="#"><span class="goog"></span></a></li>
                    </ul>
            
                    <div class="clear"></div>
                </div>
            </form>
        </div>
    </div>

    <div class="clear"></div>

    <div class="mt-registro">
        <ul>
            <li><p>Faça <a href="{{ url('/login') }}">login.</a></p></li>
            <span>|</span>
            <li><p>Esqueceu a <a href="{{ url('/password/reset') }}">senha?</a></p></li>
            <div class="clear"></div>
        </ul>
    </div>

@endsection