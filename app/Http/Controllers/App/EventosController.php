<?php

namespace Mentor\Http\Controllers\App;

use Illuminate\Http\Request;
use Mentor\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Mentor\Repositories\EventosRepositoryEloquent;
use Mentor\Repositories\UserRepositoryEloquent;
use Mentor\Services\EventosService;
use Mockery\Exception;

class EventosController extends Controller
{
    private $eventosService;

    /**
     * EventosController constructor.
     * @param EventosRepositoryEloquent $eventosRepository
     * @param UserRepositoryEloquent $userRepository
     */
    public function __construct(EventosService $eventosService)
    {
        $this->eventosService = $eventosService;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $eventos = $this->eventosService->listarEventos();
		return view('eventos.index', compact('eventos'));
	}

	public function pendentes(){
	    $eventos = $this->eventosService->eventosPendentes();
        return view('eventos.pendentes', compact('eventos'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
		return view('eventos.cadastrar');
	}

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $this->eventosService->criarEvento($request->all());
        return redirect()->route('app.eventos.index');
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $evento = $this->eventosService->findById($id);
		return view('eventos.show', compact('evento'));
    }

    public function edit($id)
    {
        $evento = $this->eventosService->findById($id);
		return view('eventos.edit', compact('evento'));
    }

    public function update(Request $request)
    {
        $this->eventosService->atualizarEvento($request->all());
        return redirect()->route('app.eventos.index');
    }

    public function delete(Request $request){
        $this->eventosService->deletarEvento($request->all());
        return redirect()->route('app.eventos.index');
    }

    public function aprovar(Request $request){
        $this->eventosService->aprovarEvento($request->all());
        return redirect()->route('app.eventos.pendentes');
    }

    public function rejeitar(Request $request){
        $this->eventosService->rejeitarEvento($request->all());
        return redirect()->route('app.eventos.pendentes');
    }
}
