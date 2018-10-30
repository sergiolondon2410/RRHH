<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Evaluation;
use App\Application;
use App\User;
use App\Competence;
use App\Compromise;
use App\Recognition;
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
		$completed = Application::where('evaluation_id', $request->evaluation)->where('status', 'completed')->get()->count();
		$uninitialized = Application::where('evaluation_id', $request->evaluation)->where('status', 'uninitialized')->get()->count();
		$started = Application::where('evaluation_id', $request->evaluation)->where('status', 'started')->get()->count();
		return view('admin.applications.report', compact('evaluation', 'completed', 'uninitialized', 'started'));
	}

	public function results(Evaluation $evaluation){

		$evaluation_id = $evaluation->id;
		$competences = $this->evaluationCompetences(1, $evaluation_id);
		$indicators = $this->evaluationCompetences(2, $evaluation_id);
		$users_completed = User::whereHas('applications', $filter = function($query) use ($evaluation_id){
			$query->where('evaluation_id', $evaluation_id)->where('status', 'completed');
		})
		->get();
		$users_competences = [];
		// $summation = [];
		foreach($users_completed as $user){
			$user_array = $this->userResult($user, $evaluation, 1);//con el parámetro se obtienen los valores de las competencias
			array_push($users_competences, $user_array);
		}

		$users_indicators = [];
		foreach($users_completed as $user){
			$user_array = $this->userResult($user, $evaluation, 2);
			array_push($users_indicators, $user_array);
		}

		return view('admin.applications.results', compact('evaluation', 'users_competences', 'users_indicators', 'competences', 'indicators'));
	}

	public function detail(Application $application){
		$average = [];
		$evaluation_id = $application->evaluation->id;
		$competence_type_id_comp = 1; //Competencias
		$competence_type_id_ind = 2; //Indicadores de productividad
		$preguntas = $this->questionsCompetenceType($competence_type_id_comp, $application->evaluation->id);

		$competences = $this->evaluationCompetences($competence_type_id_comp, $evaluation_id);
		$indicators = $this->evaluationCompetences($competence_type_id_ind, $evaluation_id);

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

	public function userComputation($user_id, Evaluation $evaluation){
		$user = User::find($user_id);
		$competence_type_id_comp = 1; //Competencias
		$competence_type_id_ind = 2; //Indicadores de productividad
		$competences = $this->evaluationCompetences($competence_type_id_comp, $evaluation->id);
		$indicators = $this->evaluationCompetences($competence_type_id_ind, $evaluation->id);
		$user_competences = $this->userResult($user, $evaluation, $competence_type_id_comp);
		$user_indicators = $this->userResult($user, $evaluation, $competence_type_id_ind);
		$compromises = Compromise::where('user_id', $user_id)->get();
		$recognitions = Recognition::where('user_id', $user_id)->get();
		//------------------
		$answers = [];
		$questions = $evaluation->questions->sortBy('competence_id');
		$applications = Application::where('user_id', $user->id)
									->where('status', 'completed')
									->where('evaluator_id', '<>', $user->id)
									->where('evaluation_id', $evaluation->id)
									->get();
		$autoevaluation = Application::where('user_id', $user->id)
									->where('status', 'completed')
									->where('evaluator_id', $user->id)
									->where('evaluation_id', $evaluation->id)
									->first();
		$output = [];
		foreach($questions as $question){
			$output = [
				"competence" => $question->competence->name,
				"text" => $question->text,
				"value" => 0
			];
			if($autoevaluation != null){
				$answer = $autoevaluation->answer($question->id);
				$output["value"] = $answer->measure->numeric_value;
			}
			$hetero = [];
			foreach($applications as $application){
				$heteroanswer = $application->answer($question->id);
				array_push($hetero, $heteroanswer->measure->numeric_value);
			}
			$output["heteroevaluation"] = round(collect($hetero)->avg(), 4);
			array_push($answers, $output);

		}
		//-----------------
		return view('admin.applications.usercomputation', compact('user', 'evaluation', 'user_competences', 'user_indicators', 'competences', 'indicators', 'compromises', 'recognitions', 'questions', 'answers'));
	}

	public function userAnswers(User $user, Evaluation $evaluation){
		$answers = [];
		$questions = $evaluation->questions->sortBy('competence_id');
		$applications = Application::where('user_id', $user->id)
									->where('status', 'completed')
									->where('evaluator_id', '<>', $user->id)
									->where('evaluation_id', $evaluation->id)
									->get();
		$autoevaluation = Application::where('user_id', $user->id)
									->where('status', 'completed')
									->where('evaluator_id', $user->id)
									->where('evaluation_id', $evaluation->id)
									->first();
		$output = [];
		foreach($questions as $question){
			$output = [
				"competence" => $question->competence->name,
				"text" => $question->text,
				"value" => 0
			];
			if($autoevaluation != null){
				$answer = $autoevaluation->answer($question->id);
				$output["value"] = $answer->measure->numeric_value;
			}
			$hetero = [];
			foreach($applications as $application){
				$heteroanswer = $application->answer($question->id);
				array_push($hetero, $heteroanswer->measure->numeric_value);
			}
			$output["heteroevaluation"] = round(collect($hetero)->avg(), 4);
			array_push($answers, $output);

		}
		return view('admin.applications.useranswers', compact('user', 'evaluation', 'questions', 'answers'));
	}

	public function userResult(User $user, Evaluation $evaluation, $competence_type){
		$output = [
			"user_id" => $user->id,
			"user_fullname" => $user->name.' '.$user->last_name,
			"user_position" => $user->position,
		];
		$user_id = $user->id;
		$evaluation_id = $evaluation->id;
		$competences = $this->evaluationCompetences($competence_type, $evaluation_id);//si es 1 es competencias, si es 2 es indicadores de productividad

		$applications = Application::whereHas('user', $filter = function($query) use ($user_id){
			$query->where('user_id', $user_id);
		})
		->whereHas('evaluation', $filter = function($query) use ($evaluation_id){
			$query->where('id', $evaluation_id);
		})
		->where('status', 'completed')
		->get();

		$competences_avg = [];
		foreach($competences as $competence){
			$competences_avg[$competence->id]['total'] = 0;
			$competences_avg[$competence->id]['hetero'] = 0;
			$competences_avg[$competence->id]['auto'] = 0;
			$application_avg = [];
			$application_hetero_avg = [];
			foreach($applications as $application){
				$currently_avg = $this->competenceAverage($application, $competence);
				array_push($application_avg, $currently_avg);
				//este condicional asigna el promedio si es autoevaluación o agrega un valor a la heteroevaluación si es falso
				if($application->evaluator_id == $user_id){
					$competences_avg[$competence->id]['auto'] = round($currently_avg, 4);
				}
				else{
					array_push($application_hetero_avg, $currently_avg);
				}
			}
			$competences_avg[$competence->id]['total'] = round(collect($application_avg)->avg(), 4);
			$competences_avg[$competence->id]['hetero'] = round(collect($application_hetero_avg)->avg(), 4);
		}

		$output["competences_avg"] = $competences_avg;
		return $output;
	}

	public function averageByCompetence(Application $application, $competences){//deprecado - reemplazar en details
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
		$preguntas = Question::whereHas('competence', $filter = function($query) use ($competence_type_id){
			$query->where('competence_type_id', $competence_type_id);
		})
		->whereHas('evaluations', $filter = function($query) use ($evaluation_id){
			$query->where('evaluations.id', $evaluation_id);
		})
		->get();

		return $preguntas;
	}

	public function competenceAverage(Application $application, Competence $competence){
		//Devuelve el promedio del valor de las respuestas en una aplicación por competencia
		$promedio = [];
		foreach($application->answers as $answer){
			if($competence->id == $answer->question->competence_id){//mejorar con una consulta que 
				array_push($promedio, $answer->measure->numeric_value);
			}
		}
		return round(collect($promedio)->avg(), 4);
	}

	public function evaluationCompetences($competence_type_id, $evaluation_id){
		//Devuelve un arreglo de objetos de las competencias o indicadores en una evaluación
		$preguntas = $this->questionsCompetenceType($competence_type_id, $evaluation_id);
		$precompetences = $preguntas->groupBy('competence_id');
		$competences = [];
		foreach ($precompetences as $key => $value) {
			array_push($competences, Competence::find($key));
		}

		return $competences;
	}


}
