<?php

namespace App\Http\Controllers;

use App\State;

class StateController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return State::all();
    }

    public function show(State $state)
    {
        return $state;
    }
}
