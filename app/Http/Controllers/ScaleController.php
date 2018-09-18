<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Scale;
use App\Measure;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class ScaleController extends Controller
{
    public function index()
    {
    	$scales = Scale::all();
    	$title = "Escalas de medición";
        return view('admin.scales.index', compact('scales', 'title'));
    }

    public function show(Request $request, $id)
    {
        $scale = Scale::find($id);
        $measures = Measure::where('scale_id', $id)->get();
    	return view('admin.scales.show', compact('scale','measures'));
    }

    public function create()
    {
    	return view('admin.scales.create');
    }

    public function store(Request $request)
    {
        
        $data = request()->validate(
            [
                'name' => 'required|unique:scales,name',
                'type' => 'required',
                'description' => 'required'
            ],
            [ 
                'name.required' => 'Ingrese el nombre',
                'name.unique' => 'El nombre elegido ya no se encuentra disponible',
                'type.required' => 'Ingrese el tipo de escala (numérica, subjetiva)',
                'description.required' => 'Ingrese la descripción de la escala de medidas'
            ]
        );

        $registro = Scale::create([
            'name' => ucfirst($data['name']),
            'type' => ucfirst($data['type']),
            'description' => ucfirst($data['description'])
        ]);


        $request->session()->flash('success', 'La escala de medidas fue creada correctamente');
        return redirect()->action('ScaleController@index');
    }

    public function edit($id)
    {
        $scale = Scale::find($id);
        $title = 'Editar escala de medición';
        return view('admin.scales.edit', compact('title','scale'));
    }

    public function update(Request $request, $id)
    {
        $data = request()->validate(
            [
                'name' => 'required',
                'type' => 'required',
                'description' => 'required'
            ],
            [ 
                'name.required' => 'Ingrese el nombre',
                'type.required' => 'Ingrese el tipo de escala (numérica, subjetiva)',
                'description.required' => 'Ingrese la descripción de la escala de medidas'
            ]
        );

        $scale = Scale::find($id);
        $scale->name = ucfirst($data['name']);
        $scale->type = ucfirst($data['type']);
        $scale->description = ucfirst($data['description']);
        $scale->save();

        $request->session()->flash('success', 'La escala fue editada correctamente');

        // return view('admin.scales.show', compact('scale'));
        return redirect()->action('ScaleController@show', ['id' => $scale]);
    }
}
