<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Aplication;
use App\Application;
use App\Implementation;
use App\User;
use App\Answer;
use App\Question;
use App\ImplementationQuestion;
use App\Competence;
use App\Measure;

class AnswerController extends Controller
{
    public function index(Application $application)
    {
        return view('admin.answers.index', compact('application'));
    }

    public function create($aplication_id, $contador)
    {

    	$user = 3; //debe ser la variable de sesion
    	$aplication = Aplication::find($aplication_id);
    	$implementation_id = $aplication->implementation->id;
    	$implementation_questions = ImplementationQuestion::where('implementation_id', $implementation_id)->get();
    	$cantidadPreguntas = $implementation_questions->count();
    	// dd($cantidadPreguntas - 1);
    	if($contador == ($cantidadPreguntas)){
    		return view('home');
    		// return redirect()->action('UserController@index', compact('aplication_id'));
    	}
    	else{

	    	$preguntas = [''];
	    	$competencias = [''];
	    	$preguntas_id = [''];
	    	$cont_int = 0;
	    	foreach ($implementation_questions as $collection) {
	    		$preguntas[$cont_int] = $collection->question->text;
	    		$preguntas_id[$cont_int] = $collection->question->id;
	    		$competencias[$cont_int] = $collection->question->competence_id;
	    		$cont_int++;
	    	}
	    	$question = $preguntas[$contador];
	    	$question_id = $preguntas_id[$contador];
	    	$competence = Competence::find($competencias[$contador]);
	    	$contador++;

	    	$implementation = Implementation::find($implementation_id);

	    	$scale_id = $implementation->evaluation->scale_id;

	    	$measures = Measure::where('scale_id', $scale_id)->get();

	    	foreach ($measures as $value) {
	    		$scale[$value->id] = $value->qualification;  
	    	}
	    	
	    	return view('admin.answers.create', compact('contador', 'aplication_id', 'question', 'question_id', 'competence', 'measures', 'scale'));
    	}
    }

    public function store()
    {
        $data = request()->all();

        $user = 3; //debe ser la variable de sesion
        $aplication_id = $data['aplication_id'];
        $contador = $data['contador'];
    	$aplication = Aplication::find($aplication_id);
    	$implementation_id = $aplication->implementation->id;
    	$implementation_question = ImplementationQuestion::where('implementation_id', $implementation_id)->where('question_id', $data['question_id'])->get();

        // dd($implementation_question);
        $answer = Answer::create([
        	'user_id' => $user ,
            'implementation_question_id' => 1,
            'measure_id' => $data['measure_id']
        ]);
        // $aplication_id = $aplication->id;
        return redirect()->action('AnswerController@create', compact('aplication_id', 'contador'));
    }

}
