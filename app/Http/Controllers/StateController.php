<?php

namespace App\Http\Controllers;

use App\State;

class StateController extends Controller
{
    public function index()
    {
        return State::all();
    }

    public function show(State $state)
    {
        return $state;
    }
}
