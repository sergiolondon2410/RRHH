<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Training;
use App\Evaluation;
use App\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class TrainingController extends Controller
{
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

