<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Scale;
use App\Measure;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class MeasureController extends Controller
{
    public function create(Scale $scale)
    {
    	return view('admin.measures.create', compact('title','scale'));
    }

    public function store(Request $request, Scale $scale)
    {
        $data = request()->validate(
            [
                'qualification' => 'required',
                'numeric_value' => 'required|numeric',
                'alias' => 'required',
                'description' => 'required'
            ],
            [ 
                'qualification.required' => '*Calificación: Ingrese la medida',
                'numeric_value.required' => '*Valor numérico: Ingrese el valor equivalente de la medida',
                'numeric_value.numeric' => '*Valor numérico: El valor debe ser numérico',
                'alias.required' => '*Alias: Ingrese el alias de la medida',
                'description.required' => '*Descripción: Ingrese la descripción de la medida'
            ]
        );

        $registro = Measure::create([
            'qualification' => $data['qualification'],
            'alias' => $data['alias'],
            'description' => $data['description'],
            'numeric_value' => $data['numeric_value'],
            'scale_id' => $scale->id
        ]);


        $request->session()->flash('success', 'La medida fue creada correctamente');
        return redirect()->route('scales.show', ['scale' => $scale]);
    }

    public function edit($id)
    {
        $measure = Measure::find($id);
        // dd($measure);
        $title = 'Editar Medición';
        return view('admin.measures.edit', compact('title','measure'));
    }

    public function update(Request $request, $id)
    {
        $data = request()->validate(
            [
                'qualification' => 'required',
                'numeric_value' => 'required|numeric',
                'alias' => 'required',
                'description' => 'required'
            ],
            [ 
                'qualification.required' => '*Calificación: Ingrese la medida',
                'numeric_value.required' => '*Valor numérico: Ingrese el valor equivalente de la medida',
                'numeric_value.numeric' => '*Valor numérico: El valor debe ser numérico',
                'alias.required' => '*Alias: Ingrese el alias de la medida',
                'description.required' => '*Descripción: Ingrese la descripción de la medida'
            ]
        );

		$measure = Measure::find($id);
		$scale = Scale::find($measure->scale_id);
		$measure->qualification = $data['qualification'];
		$measure->alias = $data['alias'];
		$measure->description = $data['description'];
		$measure->numeric_value = $data['numeric_value'];
		$measure->save();

		$request->session()->flash('success', 'La medida fue editada correctamente');

		return redirect()->route('scales.show', ['scale' => $scale]);
    }
}
