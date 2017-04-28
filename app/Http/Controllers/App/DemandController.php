<?php

namespace Mentor\Http\Controllers\App;


use Illuminate\Http\Request;
use Mentor\Http\Controllers\Controller;
use Mentor\Repositories\ActRepositoryEloquent;
use Mentor\Repositories\DemandRepositoryEloquent;
use Mentor\Repositories\PerfomanceRepositoryEloquent;
use Mentor\Repositories\UserRepositoryEloquent;
use Mentor\Services\DemandService;


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
        $act = $this->actRepositoryEloquent->findByField('demand_id', $id);

        return view('demandas.show', compact('demand', 'act'));
    }
}
