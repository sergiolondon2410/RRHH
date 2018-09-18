<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EvaluationType;
use App\Question;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class EvaluationTypeController extends Controller
{
	public function index()
	{
		$evaluationtypes = EvaluationType::all();
		$title = "Tipos de evaluaciones";
		return view('admin.evaluationtypes.index', compact('evaluationtypes', 'title'));
	}

	public function show($id)
	{
		$evaluationtype = EvaluationType::find($id);
		$questions = Question::where('evaluation_type_id',$id)->get();
		return view('admin.evaluationtypes.show', compact('evaluationtype', 'questions'));
	}

	public function create(Request $request)
	{
		return view('admin.evaluationtypes.create');
	}

	public function store(Request $request)
	{
		$data = request()->validate(
			[
				'name' => 'required',
				'description' => 'required'
			],
			[
				'name.required' => 'Ingrese el nombre del tipo de evaluación',
				'description.required' => 'Ingrese la descripción del tipo de evaluación'
			]
		);

		$registro = EvaluationType::create([
			'name' => $data['name'],
			'description' => $data['description']
		]);

		$request->session()->flash('success', 'Tipo de evaluación creada correctamente');

		return redirect()->route('evaluationtypes.index');
	}

	public function edit($id)
	{
		$evaluationtype = EvaluationType::find($id);
		$title = 'Editar Tipo de evaluación';
		return view('admin.evaluationtypes.edit', compact('title','evaluationtype'));
	}

	public function update(Request $request, $id)
	{
		$data = request()->validate(
			[
				'name' => 'required',
				'description' => 'required'
			],
			[
				'name.required' => 'Ingrese el nombre del tipo de evaluación',
				'description.required' => 'Ingrese la descripción del tipo de evaluación'
			]
		);
		$evaluationtype = EvaluationType::find($id);
		$evaluationtype->name = $data['name'];
		$evaluationtype->description = $data['description'];
		$evaluationtype->save();

		$request->session()->flash('success', 'El tipo de evaluación fue editado correctamente');

		return redirect()->route('evaluationtypes.show', ['evaluationtype' => $evaluationtype]);
	}

}
