<?php

namespace Mentor\Http\Controllers\App;

use Mentor\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        return view('home');
    }

}
