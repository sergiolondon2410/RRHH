<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Training;
use App\Evaluation;
use App\User;
use App\Organization;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Carbon\Carbon;

class TrainingController extends Controller
{
	public function index()
	{
		$title = "Requerimientos de capacitación";
		$user = Auth::user();
		$status = [
			"undefined" => "Buscar por estado",
			"pending" => "Pendiente",
			"achieved" => "Cumplido",
			"unsuccessful" => "No cumplido"
		];
		$organizations = Organization::all()->pluck('name', 'id');
		$organizations->prepend('Buscar por empresa', 'undefined');

		$training_list = (new Training)->newQuery();

		if(!is_null(Input::get('organization')) && (Input::get('organization') != 'undefined')){
			$organization_id = Input::get('organization');
			$training_list->whereHas('user', $filter = function($query) use ($organization_id){
				$query->where('organization_id', $organization_id);
			}); // | trainings | --> | users | --> | organizations |  (join)
		}
		if(!is_null(Input::get('status')) && (Input::get('status') != 'undefined')){
			$training_list->where('status', Input::get('status'));
		}
		$trainings = $training_list->get();
		return view('admin.trainings.index', compact('trainings', 'title', 'status', 'organizations'));
		
	}

	public function show(Training $training)
	{
		$status = [
			"pending" => "Pendiente",
			"achieved" => "Cumplido",
			"unsuccessful" => "No cumplido"
		];
		return view('admin.trainings.show', compact('training', 'title', 'status'));
	}

	public function edit(Training $training)
	{
		$title = 'Editar Requerimiento';
		$status = [
			"pending" => "Pendiente",
			"achieved" => "Cumplido",
			"unsuccessful" => "No cumplido"
		];

		return view('admin.trainings.edit', compact('title','training', 'status'));
	}

	public function update(Request $request, Training $training)
	{
		$title = 'Editar Requerimiento';
		$status = [
			"pending" => "Pendiente",
			"achieved" => "Cumplido",
			"unsuccessful" => "No cumplido"
		];
		
		if(is_null($request->observation)){
			$request->session()->flash('danger', '*Requerimiento: debe ingresar el requerimiento de capacitación solicitado para este usuario');
			return \View::make('admin.trainings.edit', compact('title', 'training','status'));
		}
		else{
			$training->observation = $request->observation;
		}
		$training->status = $request->status;
		$training->save();
		$request->session()->flash('success', 'Requerimiento editado correctamente');
		return view('admin.trainings.show', compact('training', 'title', 'status'));
	}

    public function create(Request $request, User $user, Evaluation $evaluation)
	{
		return view('admin.trainings.create', compact('user', 'evaluation'));
	}

	public function store(Request $request, User $user, Evaluation $evaluation){
		$data = request()->validate(
			[
				'observation' => 'required',
			],
			[
				'observation.required' => '*Requerimiento de capacitación: Describa un aspecto en el cual el empleado requiera un proceso de capacitación',
			]
		);

		$registro = Training::create([
			'observation' => ucfirst($data['observation']),
			'user_id' => $user->id
		]);

		$request->session()->flash('success', 'El requerimiento de capacitación fue creado correctamente');
		return redirect()->action('ApplicationController@userComputation', ['user' => $user, 'evaluation' => $evaluation]);
	}
}

