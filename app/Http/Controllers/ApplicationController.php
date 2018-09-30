<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Evaluation;
use App\Application;
use App\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class ApplicationController extends Controller
{
	public function index(Evaluation $evaluation)
	{
		$users = User::where('organization_id', $evaluation->process->organization_id)->get();
		$title = "Usuarios asignados a la evaluación: ".$evaluation->name;
		return view('admin.applications.index', compact('evaluation', 'users', 'title'));
	}

	public function edit($user_id, $evaluation_id)
	{
		$evaluation = Evaluation::find($evaluation_id);
		$user = User::find($user_id);
		// $mates = User::where('organization_id',$user->organization_id)
		// 			->where('id', '<>', $user_id)
		// 			->get();
		$mates = User::where('organization_id',$user->organization_id)->get()->except(['id', $user_id]);
		$title = 'Editar evaluación';
		return view('admin.applications.edit', compact('title','evaluation', 'user','mates'));
	}

	public function store(Request $request, $user_id, $evaluation_id)
	{
		$evaluadores = $request->get('evaluadores');
		if($evaluadores){	
			foreach ($evaluadores as $evaluador) {
				$app = Application::where('evaluation_id', $evaluation_id)
									->where('evaluator_id', $evaluador)
									->where('user_id', $user_id)
									->get();
				if($app->isEmpty()){
					Application::create([
						'evaluation_id' => $evaluation_id,
						'user_id' => $user_id,
						'evaluator_id' => $evaluador
					]);
				}
			}
		}
		$autoevaluacion = $request->get('autoevaluacion');
		if($autoevaluacion){
			$auto = Application::where('evaluation_id', $evaluation_id)
								->where('evaluator_id', $autoevaluacion)
								->where('user_id', $user_id)
								->get();
			if($auto->isEmpty()){
				Application::create([
					'evaluation_id' => $evaluation_id,
					'user_id' => $user_id,
					'evaluator_id' => $user_id
				]);
			}
		}
		// else
		// {
			
		// }

		$request->session()->flash('success', 'Asignaciones realizadas correctamente');
		return redirect()->route('applications.index', ['evaluation' => Evaluation::find($evaluation_id)]);
	}

	public function show()
	{
		$user = Auth::user();
		$autoevaluations = Application::where('evaluator_id', $user->id)
										->where('user_id', $user->id)
										->where('status', '<>', 'completed')
										->get();
		$heteroevaluations = Application::where('evaluator_id', $user->id)
										->where('user_id', '<>',$user->id)
										->where('status', '<>', 'completed')
										->get();
		return view('admin.applications.show', compact('user', 'autoevaluations', 'heteroevaluations'));
	}

	public function complete(Application $application){
		// dd();
		return view('admin.applications.complete', compact('application'));
	}
}
