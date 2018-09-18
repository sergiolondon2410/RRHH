<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Implementation;

class ImplementationController extends Controller
{
    //
	public function index()
    {
        $implementations = Implementation::all();
        $title = "Listado de evaluaciones";
        return view('admin.implementations.index', compact('implementations', 'title'));
    }
}
