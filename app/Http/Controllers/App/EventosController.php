<?php

namespace Mentor\Http\Controllers\App;


use Illuminate\Http\Request;
use Mentor\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use Mentor\Models\Eventos;
use Mentor\Models\User;
use Mentor\Repositories\EventosRepositoryEloquent;
use Mentor\Repositories\UserRepositoryEloquent;

class EventosController extends Controller
{
	private $eventosRepository;
	
    private $userRepository;
	
   /* public function __construct(EventosRepositoryEloquent $eventosRepository,
                                UserRepositoryEloquent $userRepository)
    {

        $this->$eventosRepository = $eventosRepository;
        $this->userRepository = $userRepository;
    }*/
	
	public function index(){
        $eventos = DB::select('select * from eventos order by id desc');
		return view('eventos.index', compact('eventos'));
	}
	public function create(){
		return view('eventos.cadastrar');
	}

    public function store(Request $request)
    {
		DB::table('eventos')->insert( [
                'nome' => $request['nome'],
                'local' => $request['local'],
                'data_do_evento' => $request['data_do_evento'],
                'telefone' => $request['telefone'],
                'status' => 'pendente',
                'user_id' => Auth::user()->id
		] );
//        $this->demandService->myDemandsCreate($request->all());

        return redirect()->route('app.eventos.index');
    }
	
    public function show($id)
    {
//        $evento = $this->$eventosRepository->find($id);
        $evento = DB::select('select * from eventos where id="'. $id .'" order by id desc')[0];
		return view('eventos.show', compact('evento'));
    }
}
