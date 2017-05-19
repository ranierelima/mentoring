<?php

namespace Mentor\Http\Controllers\App;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mentor\Http\Controllers\Controller;
use Mentor\Repositories\OportunidadesRepositoryEloquent;
use Mentor\Repositories\UserRepositoryEloquent;
use Mockery\Exception;

class OportunidadesController extends Controller
{
    private $oportunidadesRepository;

    private $userRepository;

    public function __construct(OportunidadesRepositoryEloquent $oportunidadesRepository,
                                UserRepositoryEloquent $userRepository)
    {

        $this->$oportunidadesRepository = $oportunidadesRepository;
        $this->userRepository = $userRepository;
    }

    public function index()
    {
        $oportunidades = DB::select('select * from oportunidades order by id desc');
        return view('oportunidades.index', compact('oportunidades'));
    }

    public function create()
    {
        return view('oportunidades.cadastrar');
    }

    public function store(Request $request)
    {
        DB::table('oportunidades')->insert([
            'nome' => $request['nome'],
            'local' => $request['local'],
            'remuneracao' => $request['remuneracao'],
            'descricao' => $request['descricao'],
            'user_id' => Auth::user()->id
        ]);
//        $this->demandService->myDemandsCreate($request->all());

        return redirect()->route('app.oportunidades.index');
    }

    public function show($id)
    {
        $oportunidade = DB::select('select * from oportunidades where id="' . $id . '"')[0];
        return view('oportunidades.show', compact('oportunidade'));
    }

    public function edit($id)
    {
        $evento = $this->eventosRepository->find($id);

        return view('eventos.edit', compact('evento'));
    }
    public function update(Request $request)
    {
        /** Criar um service para isso... não misturar lógica com instâncias... toda persistência no bd usar try/catch */
        try {
            $this->oportunidadesRepository->update([
                'nome' => $request['nome'],
                'local' => $request['local'],
                'remuneracao' => $request['remuneracao'],
                'descricao' => $request['descricao'],
            ], $request{'oportunidade_id'});

        } catch(Exception $exception) {
            $exception->getMessage();
        }

        return redirect()->route('app.oportunidades.index');
    }

    public function delete(Request $request){
        try{
            $this->oportunidadesRepository->delete($request['oportunidade_id']);
        }catch(Exception $exception) {
            $exception->getMessage();
        }

        return redirect()->route('app.eventos.index');
    }
}
