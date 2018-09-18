<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Evaluation;
use App\EvaluationType;
use App\Process;
// use App\Question;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class EvaluationController extends Controller
{
    
	public function index()
    {
        $evaluations = Evaluation::all();
        $title = "Listado de evaluaciones";
        return view('admin.evaluations.index', compact('evaluations', 'title'));
    }

    public function show($id)
    {
        $evaluation = Evaluation::find($id);
        // $questions = Evaluation::find($id)->questions;
        // dd($questions);
    	return view('admin.evaluations.show', compact('evaluation'));
    }

    public function create(Process $process)
    {
    	$evaluationtypes = EvaluationType::pluck('name', 'id');
    	return view('admin.evaluations.create', compact('evaluationtypes', 'process'));
    }

    public function store(Request $request, Process $process)
    {
    	$data = request()->validate(
            [
                'name' => 'required',
                'description' => 'required'
            ],
            [
                'name.required' => 'Ingrese el nombre de la evaluación',
                'description.required' => 'Ingrese la descripción de la evaluación'
            ]
        );
        $registro = Evaluation::create([
            'name' => ucfirst($data['name']),
            'description' => ucfirst($data['description']),
            'evaluation_type_id' => $request['type'],
            'process_id' => $process->id,
            'creator_id' => Auth::user()->id,
        ]);
        $request->session()->flash('success', 'La evaluación fue creada correctamente');
        return redirect()->route('processes.show', ['process' => $process->id]);
    }

    public function edit($id)
    {
        $evaluation = Evaluation::find($id);
        $title = 'Editar evaluación';
        return view('admin.evaluations.edit', compact('title','evaluation'));
    }

    public function update(Request $request, $id)
    {
        $data = request()->validate(
            [
                'name' => 'required',
                'description' => 'required'
            ],
            [
                'name.required' => '*Nombre: Ingrese el nombre de la evaluación',
                'description.required' => 'Ingrese la descripción de la evaluación'
            ]
        );
        $evaluation = Evaluation::find($id);
        $evaluation->name = ucfirst($data['name']);
        $evaluation->description = ucfirst($data['description']);
        $evaluation->save();

        $request->session()->flash('success', 'La evaluación fue editada correctamente');

        return redirect()->route('evaluations.show', ['evaluation' => $evaluation]);
    }
    
}
