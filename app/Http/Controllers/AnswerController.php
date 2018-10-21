<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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

    public function create(Request $request, Application $application, $contador)
    {
        $questions_array = $application->evaluation->questions->sortBy('competence_id')->pluck('id');
        if($contador >= $questions_array->count()){
            $application->status = 'completed';
            $application->save();
            return redirect()->action('ApplicationController@complete', compact('application'));
        }
        else{
            if($application->status == 'uninitialized'){
                $application->status = 'started';
                $application->save();
            }
            
            
            $question = Question::find($questions_array[$contador]);
            $measures = $question->scale->measures->sortBy('numeric_value')->pluck('qualification','id');
            $total = count($questions_array);
            $percent = ceil((($contador)*100)/$total);
            return view('admin.answers.create', compact('contador', 'application', 'question', 'measures', 'total', 'percent'));
        }
    }

    public function store(Request $request, Application $application, Question $question, $contador)
    {
        $data = request()->validate(
            [
                'measure' => 'required'
            ],
            [
                'measure.required' => 'Debe seleccionar una de las opciones de la escala evaluativa'
            ]
        );

        $actual = Answer::where('application_id', $application->id)->where('question_id', $question->id)->get();
        if($actual->count() == 0){
            $answer = Answer::create([
                'measure_id' => $data['measure']['0'],
                'application_id' => $application->id,
                'question_id' => $question->id
            ]);
        }

        $questions_array = $application->evaluation->questions->sortBy('competence_id')->pluck('id');

        $contador++;
        return redirect()->action('AnswerController@create', compact('application', 'contador'));
    }

}
