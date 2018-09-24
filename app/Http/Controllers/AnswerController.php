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
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class AnswerController extends Controller
{
    public function index(Application $application)
    {

        return view('admin.answers.index', compact('application'));
    }

    public function create(Application $application, Request $request, $contador = 0)
    {
    	$user = Auth::user()->id; //debe ser la variable de sesion
        $questions_array = $application->evaluation->questions->pluck('id');
        if($application->status == 'uninitialized'){
            $application->status = 'started';
            $application->save();
            // $questions_array = $application->evaluation->questions->pluck('id');
            // session(['questionsarray' => $questions_array]);
            $question = Question::find($questions_array[$contador]);
            $measures = $question->scale->measures->pluck('qualification','id');
            return view('admin.answers.create', compact('contador', 'application', 'question', 'measures'));
        }
        elseif($application->status == 'started'){
            $contador++;
            if($contador == ($questions_array->count())){
                return view('home');
            }
            else{
                $question = Question::find($questions_array[$contador]);
                $measures = $question->scale->measures->pluck('qualification','id');
            return view('admin.answers.create', compact('contador', 'application', 'question', 'measures'));;
            }
        }
    	// $aplication = Aplication::find($aplication_id);
    	// $implementation_id = $aplication->implementation->id;
    	// $implementation_questions = ImplementationQuestion::where('implementation_id', $implementation_id)->get();
    	// $cantidadPreguntas = $questions_array->count();
     //    dd($cantidadPreguntas);
    	
    	// else{

	    // 	$preguntas = [''];
	    // 	$competencias = [''];
	    // 	$preguntas_id = [''];
	    // 	$cont_int = 0;
	    // 	foreach ($implementation_questions as $collection) {
	    // 		$preguntas[$cont_int] = $collection->question->text;
	    // 		$preguntas_id[$cont_int] = $collection->question->id;
	    // 		$competencias[$cont_int] = $collection->question->competence_id;
	    // 		$cont_int++;
	    // 	}
	    // 	$question = $preguntas[$contador];
	    // 	$question_id = $preguntas_id[$contador];
	    // 	$competence = Competence::find($competencias[$contador]);
	    // 	$contador++;

	    // 	$implementation = Implementation::find($implementation_id);

	    // 	$scale_id = $implementation->evaluation->scale_id;

	    // 	$measures = Measure::where('scale_id', $scale_id)->get();

	    // 	foreach ($measures as $value) {
	    // 		$scale[$value->id] = $value->qualification;  
	    // 	}
	    	
	    // 	return view('admin.answers.create', compact('contador', 'aplication_id', 'question', 'question_id', 'competence', 'measures', 'scale'));
    	// }
    }

    public function store(Application $application, Request $request)
    {
        dd($request);
     //    $data = request()->all();
     //    $user = 3; //debe ser la variable de sesion
     //    $aplication_id = $data['aplication_id'];
        $contador = $data['contador'];
    	// $aplication = Aplication::find($aplication_id);
    	// $implementation_id = $aplication->implementation->id;
    	// $implementation_question = ImplementationQuestion::where('implementation_id', $implementation_id)->where('question_id', $data['question_id'])->get();

        $answer = Answer::create([

            'measure_id' => $data['measure_id'],
        	'application_id' => $application->id,
            'implementation_question_id' => 1,
        ]);
        return redirect()->action('AnswerController@create', compact('$application', 'contador'));
    }

}
