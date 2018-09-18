<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Evaluation;
// use App\EvaluationType;
// use App\Process;
use App\Question;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class EvaluationQuestionController extends Controller
{
	public function create(Evaluation $evaluation)
	{
		// Este código resta dos arrays de preguntas, las que ya están elegidas de las que están disponibles y vuelve a hacer la consulta
		$preguntas = $evaluation->questions->pluck('id');
		$allquestions = Question::where('evaluation_type_id', $evaluation->evaluation_type_id)->get()->pluck('id');
		$questionsarray = $allquestions->diff($preguntas);
		$questions = Question::whereIn('id', $questionsarray)->orderBy('competence_id')->get();

		return view('admin.evaluations.question', compact('evaluation', 'questions'));
	}

	public function store(Request $request, Evaluation $evaluation)
	{
		
		$salida = $request->get('preguntas');// Array de checkbox que elije las preguntas
		$evaluation->questions()->attach($salida);
		$request->session()->flash('success', 'Las preguntas fueron agregadas correctamente');
		return redirect()->route('evaluations.show', ['evaluation' => $evaluation]);
	}

}
