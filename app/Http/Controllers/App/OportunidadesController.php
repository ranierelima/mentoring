<?php

namespace Mentor\Http\Controllers\App;


use Illuminate\Http\Request;
use Mentor\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use Mentor\Repositories\ActRepositoryEloquent;
use Mentor\Repositories\EventoRepositoryEloquent;
use Mentor\Repositories\PerfomanceRepositoryEloquent;
use Mentor\Repositories\UserRepositoryEloquent;
use Mentor\Services\EventoService;

class OportunidadesController extends Controller
{
	/*private $eventosRepository;
	
    private $userRepository;
	
    private $eventosService;
	
    private $perfomanceRepositoryEloquent;
	
    private $actRepositoryEloquent;
	
    public function __construct(EventoRepositoryEloquent $eventosRepository,
                                UserRepositoryEloquent $userRepository,
                                EventoService $eventosService,
                                PerfomanceRepositoryEloquent $perfomanceRepositoryEloquent,
                                ActRepositoryEloquent $actRepositoryEloquent)
    {

        $this->$eventosRepository = $eventosRepository;
        $this->userRepository = $userRepository;
        $this->$eventosService = $eventosService;
        $this->perfomanceRepositoryEloquent = $perfomanceRepositoryEloquent;
        $this->actRepositoryEloquent = $actRepositoryEloquent;
    }*/
	
	public function index(){
        $oportunidades = DB::select('select * from oportunidades order by id desc');
		return view('oportunidades.index', compact('oportunidades'));
	}
	public function create(){
		return view('oportunidades.cadastrar');
	}

    public function store(Request $request)
    {
		DB::table('oportunidades')->insert( [
                'nome' => $request['nome'],
                'local' => $request['local'],
                'remuneracao' => $request['remuneracao'],
                'descricao' => $request['descricao'],
                'user_id' => Auth::user()->id
		] );
//        $this->demandService->myDemandsCreate($request->all());

        return redirect()->route('app.oportunidades.index');
    }
	
    public function show($id)
    {
        $oportunidade = DB::select('select * from oportunidades where id="'. $id .'"')[0];
		return view('oportunidades.show', compact('oportunidade'));
    }
}
