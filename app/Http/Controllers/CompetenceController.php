<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Competence;
use App\CompetenceType;
use App\Evaluation;
use App\Question;
use Illuminate\Support\Facades\Validator;

class CompetenceController extends Controller
{

	public function index()
    {
        $competences = Competence::all();
        $title = "Listado de competencias";
        return view('admin.competences.index', compact('competences', 'title'));
    }

    public function show($id)
    {
        $competence = Competence::find($id);
        $questions = Question::where('competence_id',$id)->get();
        return view('admin.competences.show', compact('competence', 'questions'));
    }

    public function create(Request $request)
    {
        $CompetenceTypes = CompetenceType::all();
        $types = CompetenceType::pluck('name', 'id');
        $color = [
            '#f44242' => 'Rojo',
            '#3bb8f7' => 'Azul',
            '#0fdb75' => 'Verde',
            '#cb53ef' => 'Violeta',
            '#f78a36' => 'Naranja',
            '#ffffff' => 'Blanco'
        ];

        return view('admin.competences.create', compact('color', 'types'));
    }

    public function store(Request $request)
    {
        $data = request()->validate(
            [
                'name' => 'required',
                'description' => 'required'
            ],
            [
                'name.required' => 'Ingrese el nombre de la evaluación',
                'description.required' => 'Ingrese la descripción de la evaluación'
            ]
        );
        
        $registro = Competence::create([
            'name' => $data['name'],
            'description' => $data['description'],
            'competence_type_id' => $request['type'],
            'color' => $request['color']
        ]);

        $request->session()->flash('success', 'Competencia creada correctamente');

        return redirect()->route('competences.index');
    }

    public function edit($id)
    {
        $competence = Competence::find($id);
        $types = CompetenceType::pluck('name', 'id');
        $color = [
            '#f44242' => 'Rojo',
            '#3bb8f7' => 'Azul',
            '#0fdb75' => 'Verde',
            '#cb53ef' => 'Violeta',
            '#f78a36' => 'Naranja',
            '#ffffff' => 'Blanco'
        ];
        $title = 'Editar competencia';
        return view('admin.competences.edit', compact('title','competence', 'types', 'color'));
    }

    public function update(Request $request, $id)
    {
        $data = request()->validate(
            [
                'name' => 'required',
                'description' => 'required',
                'type' => 'required',
                'color' => 'required'
            ],
            [
                'name.required' => 'Ingrese el nombre de la evaluación',
                'description.required' => 'Ingrese la descripción de la evaluación',
                'type.required' => '',
                'color.required' => ''
            ]
        );

        $competence = Competence::find($id);
        $competence->name = $data['name'];
        $competence->description = $data['description'];
        $competence->competence_type_id = $data['type'];
        $competence->color = $data['color'];

        $competence->save();

        $request->session()->flash('success', 'La competence fue editada correctamente');

        return redirect()->route('competences.show', ['competence' => $competence]);
    }
}
