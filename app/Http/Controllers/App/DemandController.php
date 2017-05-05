<?php

namespace Mentor\Http\Controllers\App;


use Illuminate\Http\Request;
use Mentor\Http\Controllers\Controller;
use Mentor\Repositories\ActRepositoryEloquent;
use Mentor\Repositories\DemandRepositoryEloquent;
use Mentor\Repositories\PerfomanceRepositoryEloquent;
use Mentor\Repositories\UserRepositoryEloquent;
use Mentor\Services\DemandService;
use Illuminate\Support\Facades\DB;

class DemandController extends Controller
{
    /**
     * @var DemandRepository
     */
    private $demandRepository;
    /**
     * @var UserRepository
     */
    private $userRepository;
    /**
     * @var DemandService
     */
    private $demandService;
    /**
     * @var PerfomanceRepositoryEloquent
     */
    private $perfomanceRepositoryEloquent;
    /**
     * @var ActRepositoryEloquent
     */
    private $actRepositoryEloquent;

    /**
     * DemandController constructor.
     * @param DemandRepositoryEloquent $demandRepository
     * @param UserRepositoryEloquent $userRepository
     * @param DemandService $demandService
     * @param PerfomanceRepositoryEloquent $perfomanceRepositoryEloquent
     * @param ActRepositoryEloquent $actRepositoryEloquent
     */
    public function __construct(DemandRepositoryEloquent $demandRepository,
                                UserRepositoryEloquent $userRepository,
                                DemandService $demandService,
                                PerfomanceRepositoryEloquent $perfomanceRepositoryEloquent,
                                ActRepositoryEloquent $actRepositoryEloquent)
    {

        $this->demandRepository = $demandRepository;
        $this->userRepository = $userRepository;
        $this->demandService = $demandService;
        $this->perfomanceRepositoryEloquent = $perfomanceRepositoryEloquent;
        $this->actRepositoryEloquent = $actRepositoryEloquent;
    }


    public function index()
    {
        $demands = $this->demandService->myDemands();

        return view('demandas.index', compact('demands'));
    }

    public function create()
    {
        $perfomances = $this->perfomanceRepositoryEloquent->lists('area','area');

        return view('demandas.create', compact('perfomances'));
    }

    public function store(Request $request)
    {
        $this->demandService->myDemandsCreate($request->all());

        return redirect()->route('app.demand.index');
    }

    public function edit($id)
    {
        $demand = $this->demandRepository->find($id);

        $perfomances = $this->perfomanceRepositoryEloquent->lists('area','id');

        return view('demandas.edit', compact('demand', 'perfomances'));
    }

    public function update(Request $request)
    {
        $this->demandService->myDemandsUpdate($request->all());

        return redirect()->route('app.demand.index');
    }

    public function show($id)
    {
        $demand = $this->demandRepository->find($id);
//        $act = $this->actRepositoryEloquent->findByField('demand_id', $id);
        /** COLOCAR NO SERVICE */
        if($demand->mentor):
            $mentor = $this->userRepository->find($demand->mentor);
        endif;

        return view('demandas.show', compact('demand', 'mentor'));
    }


    /** Atualização 04/05 **/

    public function encaminharMe($id)
    {
        $demand = $this->demandRepository->find($id);

        $mentoresFind = $this->userRepository->findByField('roles', 2);

        /** COLOCAR NO SERVICE */
        foreach ($mentoresFind as $mentor) {
            $mentores = $mentor;
        }

        return view('demandas.encaminhar', compact('demand', 'mentores'));
    }

    public function storeMe(Request $request)
    {
        /** COLOCAR NO SERVICE **/
        //encontrar a demanda
        $demandFind = $this->demandRepository
                           ->find($request['demand_id']);
        //atualizar a demanda
        $demandFind->mentor = $request['id'];
        $demandFind->status = 2;
        $demandFind->save();

        //Atualizando a qtd do mentor
        $selectMentor = $this->userRepository->find($request['id']);
        // realmente ?? melhor com att?
        $selectMentor->qtd = $selectMentor->qtd + 1;
        $selectMentor->save();


        return redirect()->route('app.demand.index');


    }

    public function responder(Request $request)
    {
        $demand = $this->demandRepository->find($request['demand_id']);

        return view('demandas.responder', compact('demand'));
    }

    public function askSalve(Request $request)
    {
        /** COLOCAR NO SERVICE */
        $demand = $this->demandRepository->find($request['demand_id']);
        $demand->answer = $request['answer'];
        $demand->status = 3;
        $demand->save();

        return redirect()->route('app.demand.index');
    }
}
