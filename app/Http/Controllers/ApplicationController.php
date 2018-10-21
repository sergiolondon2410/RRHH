<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Evaluation;
use App\Application;
use App\User;
use App\Competence;
use App\Answer;
use App\Question;
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
		return view('admin.applications.complete', compact('application'));
	}

	public function filter(){
		$evaluations = Evaluation::all()->pluck('name','id');;
		return view('admin.applications.filter', compact('evaluations'));
	}

	public function report(Request $request){
		$evaluation = Evaluation::find($request->evaluation);
		$all = $evaluation->applications->count();
		$completed = $this->percentage($all, Application::where('evaluation_id', $request->evaluation)->where('status', 'completed')->get()->count());
		$uninitialized = $this->percentage($all, Application::where('evaluation_id', $request->evaluation)->where('status', 'uninitialized')->get()->count());
		$started = $this->percentage($all, Application::where('evaluation_id', $request->evaluation)->where('status', 'started')->get()->count());
		return view('admin.applications.report', compact('evaluation', 'completed', 'uninitialized', 'started'));
	}

	public function results(Evaluation $evaluation){

		$precompetences = $evaluation->questions->groupBy('competence_id');
		$competences = [];
		foreach ($precompetences as $key => $value) {
			array_push($competences, Competence::find($key));
		}

		$users = User::where('organization_id', $evaluation->process->organization_id)->get();
		foreach ($users as &$user) {
			$competencias = [];
			foreach ($competences as $competence) {
				array_push($competencias, $competence);
			}
			$user->competencias = $competencias;

			$autoevApp = Application::where('evaluation_id', $evaluation->id)
								->where('user_id', $user->id)
								->where('evaluator_id', $user->id)
								->where('status', 'completed')
								->get();
		}
		// --------------------------
		$competencias = [];
		foreach ($competences as $competence) {
			array_push($competencias, $competence);
		}
		// dd($competences);
		$autoevApp = Application::where('evaluation_id', $evaluation->id)
								->where('user_id', 10)
								->where('evaluator_id', 10)
								->where('status', 'completed')
								->get();
		$autoevAnswers = Answer::where('application_id', $autoevApp->first()->id)->get();
		$promedios = [];
		foreach ($competences as $competence) {
			$promedios[$competence->id]['value'] = 0;
			$promedios[$competence->id]['count'] = 0;
		}
		foreach($autoevAnswers as $answer){
			foreach($competences as $competence){
				if($competence->id == $answer->question->competence_id){
					$promedios[$competence->id]['value'] += $answer->measure->numeric_value;
					$promedios[$competence->id]['count']++;
				}
			}
		}
		dd($promedios);
		//-----------------------------------
		return view('admin.applications.results', compact('evaluation', 'users', 'competences'));
	}

	public function detail(Application $application){
		$average = [];
		// $precompetences = $application->evaluation->questions->groupBy('competence_id');
		// $precomp = $application->evaluation->questions->unique('competence_id', function ($item) {
		// 	return $item->competence->id;
		// });
		$evaluation_id = $application->evaluation->id;
		$competence_type_id_comp = 1; //Competencias
		$competence_type_id_ind = 2; //Indicadores de productividad
		$preguntas = $this->questionsCompetenceType($competence_type_id_comp, $application->evaluation->id);
		
		$precompetences = $preguntas->groupBy('competence_id');
		$competences = [];
		foreach ($precompetences as $key => $value) {
			array_push($competences, Competence::find($key));
		}

		if($application->status == 'completed'){
			$competenceav = $this->averageByCompetence($application, $competences);
			if($application->answers->count() != 0){
				$avarray = [];
				foreach($competenceav as $key => $item){
					$avarray[$key] = ($item["value"]/$item["count"])*100;
				}
				$aveout = [];
				foreach($avarray as $key => $value) {
					array_push($aveout, ["competence" => $key, "average" => $value]);
				}
				$average = $aveout;
			}
		}
	
		$state = ["uninitialized" => "Sin responder", "started" => "Sin finalizar", "completed" => "Finalizada"];
		return view('admin.applications.detail', compact('application', 'state', 'average'));
	}

	public function percentage($total, $value){
		return round((($value/$total)*100), 2);
	}

	public function averageByCompetence(Application $application, $competences){
		$promedios = [];
		foreach ($competences as $competence) {
			$promedios[$competence->name]['value'] = 0;
			$promedios[$competence->name]['count'] = 0;
		}
		foreach($application->answers as $answer){
			foreach($competences as $competence){
				if($competence->id == $answer->question->competence_id){
					$promedios[$competence->name]['value'] += $answer->measure->numeric_value;
					$promedios[$competence->name]['count']++;
				}
			}
		}
		return $promedios;
	}

	public function questionsCompetenceType($competence_type_id, $evaluation_id){
		//Filtra las preguntas por el tipo de competencia (competencia o indicador) y por evaluación
		//----------------------------------------------------------
		$preguntas = Question::whereHas('competence', $filter = function($query) use ($competence_type_id){
			$query->where('competence_type_id', $competence_type_id);
		})
		->whereHas('evaluations', $filter = function($query) use ($evaluation_id){
			$query->where('evaluations.id', $evaluation_id);
		})
		->get();

		return $preguntas;
		//-----------------------------------------------------------
	}
}
