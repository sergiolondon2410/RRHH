<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Organization;
use App\Process;
use App\Evaluation;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class ProcessController extends Controller
{
    public function index()
	{
		$processes = Process::all();
		$title = "Procesos Evaluativos";
		return view('admin.processes.index', compact('processes', 'title'));
	}

	public function show($id)
	{
		$process = Process::find($id);
        $evaluations = Evaluation::where('process_id',$id)->get();
		return view('admin.processes.show', compact('process', 'evaluations'));
	}

	public function create(Request $request)
	{
		$organizations = Organization::pluck('name', 'id');
		return view('admin.processes.create', compact('organizations'));
	}

	public function store(Request $request)
    {
        $data = request()->validate(
            [
                'name' => 'required',
                'description' => 'required',
            ],
            [
                'name.required' => '*Nombre del Proceso: Ingrese el nombre del Proceso',
                'description.required' => '*Descripción: Ingrese la descripción del proceso',
            ]
        );

        $registro = Process::create([
            'name' => ucfirst($data['name']),
            'description' => ucfirst($data['description']),
            'organization_id' => $request->organization,
            'status' => 'activo'
        ]);

        $request->session()->flash('success', 'El proceso fue creado correctamente');
        return redirect()->route('processes.show', ['process' => $registro->id]);
    }

    public function edit(Process $process)
    {
        $organizations = Organization::pluck('name', 'id');
        $estados = ["activo" => "activo", "inactivo" => "inactivo"];
        $title = 'Editar Proceso';
        return view('admin.processes.edit', compact('title','process', 'organizations', 'estados'));
    }

    public function update(Request $request, $id)
    {
        $data = request()->validate(
            [
                'name' => 'required',
                'description' => 'required',
            ],
            [
                'name.required' => '*Nombre del Proceso: Ingrese el nombre del Proceso',
                'description.required' => '*Descripción: Ingrese la descripción del proceso',
            ]
        );

        $process = Process::find($id);

        $process->name = ucfirst($data['name']);
        $process->description = ucfirst($data['description']);
        $process->organization_id = $request->organization;
        $process->status = $request->status;
        $process->save();

        $request->session()->flash('success', 'El proceso fue editado correctamente');

        return redirect()->route('processes.show', ['process' => $process]);
    }
}
