<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Aplication;
use App\Implementation;
use App\User;

class AplicationController extends Controller
{
    
	public function index()
    {
        $aplications = Aplication::all();
        $implementaciones = Implementation::all();
        // dd($implementacion);
        $title = "Responder Evaluación";
        // return view('admin.aplications.index', compact('users', 'title'));
        return view('admin.aplications.index', compact('title'));
    }

    public function create($id)
    {
    	$title = "Respondiendo Evaluación";
    	$user = User::find(3);
    	$implementation = Implementation::find($id);
    	return view('admin.aplications.create', compact('title', 'user', 'implementation'));
    }

    public function store()
    {
        $data = request()->all();
        $aplication = Aplication::create([
            'implementation_id' => $data['implementation_id'],
            'evaluator_id' => 2,
            'user_id' => 3
        ]);
        $aplication_id = $aplication->id;
        $contador = 0;
        return redirect()->action('AnswerController@create', compact('aplication_id', 'contador'));
    }

}
