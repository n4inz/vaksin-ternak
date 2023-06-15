<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class VaksinatorController extends Controller
{
    public function index()
    {
        return Inertia::render('Vaksinator/User');
    }


    public function addVaksinator()
    {
        return Inertia::render('Vaksinator/UserAdd');
    }
}
