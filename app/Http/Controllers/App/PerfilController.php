<?php

namespace Mentor\Http\Controllers\App;

use Illuminate\Http\Request;
use Mentor\Http\Controllers\Controller;
use Mentor\Repositories\UserRepositoryEloquent;

class PerfilController extends Controller
{

    /**
     * @var eloquent
     */
    private $eloquent;

    public function __construct(UserRepositoryEloquent
     $eloquent)
    {
        $this->eloquent = $eloquent;
    }

    public function index()
    {
        return view('edit-perfil');
    }

    public function store(Request $request)
    {

    }

    public function update(Request $request, $id)
    {

    }

}
