<?php

namespace Mentor\Http\Controllers;

use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Hash;
use Mentor\Models\User;
use Illuminate\Support\Facades\Auth;
use Mentor\Http\Controllers\Controller;
use Mockery\Exception;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function auth(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials, true)):
            return redirect()->route('app.index');
        endif;
        $request->session()->flash('error', 'Login e/ou senha inválido');
        return redirect()->back();
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('login.index');
    }

    public function register(){
        return view('auth.register');
    }

    public function create(Request $request){
        try{
            $dadosUsuario = $request->all();
            $dadosUsuario['password'] = Hash::make($dadosUsuario['password']);
            User::create($dadosUsuario);
            return redirect()->route('login.index');
        }catch (QueryException $e){
//            Salva a mensagem de erro na variavel
            $error = strtolower($e->getMessage());
//            Deixa toda a mensagem de erro em minusculo
            $usuarioDuplicado = strpos($error, 'integrity constraint violation');

//          Verifica se o erro é porque já existe outro usuario com o mesmo e-mail no banco de dados,
//          se o erro não foi de usuario duplicado, irá cair no if;
//          Se o erro for por causa de dados duplicados, irá cair no else.
            if($usuarioDuplicado === false){
                $request->session()->flash('error', 'Ocorreu um erro.');
            }else{
                $request->session()->flash('error', 'Usuário já cadastrado.');
            }
            return view('auth.register');
        }
    }
}
