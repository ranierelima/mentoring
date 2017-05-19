<?php

namespace Mentor\Http\Controllers\App;

use Illuminate\Http\Request;
use Mentor\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Mentor\Repositories\EventosRepositoryEloquent;
use Mentor\Repositories\UserRepositoryEloquent;
use Mockery\Exception;

class EventosController extends Controller
{
	private $eventosRepository;
    private $userRepository;

    /**
     * EventosController constructor.
     * @param EventosRepositoryEloquent $eventosRepository
     * @param UserRepositoryEloquent $userRepository
     */
    public function __construct(EventosRepositoryEloquent $eventosRepository,
                                UserRepositoryEloquent $userRepository)
    {
        $this->eventosRepository = $eventosRepository;
        $this->userRepository = $userRepository;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {

        $eventos = $this->eventosRepository->paginate(5);

		return view('eventos.index', compact('eventos'));
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

        /** Criar um service para isso... não misturar lógica com instâncias... toda persistência no bd usar try/catch */
        try {
            $this->eventosRepository->create([
                'nome' => $request['nome'],
                'local' => $request['local'],
                'data_do_evento' => $request['data_do_evento'],
                'telefone' => $request['telefone'],
                'status' => 'pendente',
                'user_id' => Auth::user()->id
            ]);

        } catch(Exception $exception) {
            $exception->getMessage();
        }

        return redirect()->route('app.eventos.index');
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $evento = $this->eventosRepository->find($id);

		return view('eventos.show', compact('evento'));
    }
}
