<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cancha;

class MainController extends Controller
{
    public function index()
    {
        $canchas = Cancha::all();
        return view('/index')->with('canchas', $canchas);
    }
}
