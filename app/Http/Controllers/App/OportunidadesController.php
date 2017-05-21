<?php

namespace Mentor\Http\Controllers\App;


use Illuminate\Http\Request;
use Mentor\Http\Controllers\Controller;
use Mentor\Services\OportunidadesService;

class OportunidadesController extends Controller
{
    private $oportunidadesService;


    public function __construct(OportunidadesService $oportunidadesService)
    {

        $this->oportunidadesService = $oportunidadesService;
    }

    public function index()
    {
        $oportunidades = $this->oportunidadesService->listarOportunidades();
        return view('oportunidades.index', compact('oportunidades'));
    }

    public function create()
    {
        return view('oportunidades.cadastrar');
    }

    public function store(Request $request)
    {

        $this->oportunidadesService->criarOportunidade($request->all());

        return redirect()->route('app.oportunidades.index');
    }

    public function show($id)
    {
        $oportunidade = $this->oportunidadesService->findById($id);
        return view('oportunidades.show', compact('oportunidade'));
    }

    public function edit($id)
    {
        $oportunidade = $this->oportunidadesService->findById($id);
        return view('oportunidades.edit', compact('oportunidade'));
    }

    public function update(Request $request)
    {
        $this->oportunidadesService->atualizarOportunidade($request->all());
        return redirect()->route('app.oportunidades.index');
    }

    public function delete(Request $request)
    {
        $this->oportunidadesService->deletarOportunidade($request->all());
        return redirect()->route('app.oportunidades.index');
    }
}
