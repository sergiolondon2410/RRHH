<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Competence;
use App\Scale;
use App\EvaluationType;
use App\Question;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class QuestionController extends Controller
{
    public function create(Request $request, EvaluationType $evaluationtype)
    {
        $competences = Competence::pluck('name', 'id');
        $scales = Scale::pluck('name', 'id');
        return view('admin.questions.create', compact('evaluationtype', 'competences', 'scales'));
    }

    public function store(Request $request, EvaluationType $evaluationtype)
    {
        $data = request()->validate(
            [
                'text' => 'required|unique:questions,text'
            ],
            [
                'text.required' => 'Ingrese la pregunta a realizar',
                'text.unique' => 'La pregunta que está ingresando ya se encuentra creada'
            ]
        );

        $registro = Question::create([
            'text' => ucfirst($data['text']),
            'competence_id' => $request->competence,
            'scale_id' => $request->scale,
            'evaluation_type_id' => $evaluationtype->id,
        ]);

        $request->session()->flash('success', 'La pregunta fue creada correctamente');
        return redirect()->route('evaluationtypes.show', ['evaluationtype' => $evaluationtype]);
    }

    public function edit(Question $question)
    {
        $competences = Competence::pluck('name', 'id');
        $scales = Scale::pluck('name', 'id');
        $evaluationtype = EvaluationType::find($question->evaluation_type_id);
        $title = 'Editar Pregunta';
        return view('admin.questions.edit', compact('title','question', 'competences', 'scales', 'evaluationtype'));
    }

    public function update(Request $request, $id)
    {
        $data = request()->validate(
            [
                'text' => 'required|unique:questions,text'
            ],
            [
                'text.required' => 'Ingrese la pregunta a realizar'
            ]
        );
        $question = Question::find($id);

        $evaluationtype = EvaluationType::find($question->evaluation_type_id);

        $question->text = ucfirst($data['text']);
        $question->competence_id = $request->competence;
        $question->scale_id = $request->scale;
        $question->save();

        $request->session()->flash('success', 'La pregunta fue editada correctamente');

        return redirect()->route('evaluationtypes.show', ['evaluationtype' => $evaluationtype]);
    }
}
