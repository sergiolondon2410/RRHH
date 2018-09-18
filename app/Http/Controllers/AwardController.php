<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Organization;
use App\Award;
use App\AwardResource;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class AwardController extends Controller
{
	public function index()
	{
		$awards = Award::all();
		$current_user_type = Auth::user()->user_type_id;
		if($current_user_type > 2){
			$awards = Award::where('organization_id', Auth::user()->organization_id)->get();
		}
		$title = "Premios";
		return view('admin.awards.index', compact('awards', 'title'));
	}

	public function show($id)
	{
		$award = Award::find($id);
		return view('admin.awards.show', compact('award'));
	}

	public function create(Request $request)
	{
		$resources = AwardResource::all();
		return view('admin.awards.create', compact('resources'));
	}

	public function store(Request $request)
	{
		$data = request()->validate(
			[
				'name' => 'required',
				'description' => 'required',
			],
			[
				'name.required' => '*Nombre del Premio: Ingrese el nombre del Premio',
				'description.required' => '*Descripción: Ingrese la descripción del premio',
			]
		);

		$registro = Award::create([
			'name' => ucfirst($data['name']),
			'description' => ucfirst($data['description']),
			'organization_id' => Auth::user()->organization_id,
			'resource_id' => $request->resource,
			'creator_id' => Auth::user()->id
		]);

		$request->session()->flash('success', 'El premio fue creado correctamente');
		return redirect()->route('awards.show', ['award' => $registro->id]);
	}

	public function edit(Award $award)
	{
		$title = 'Editar Premio';
		return view('admin.awards.edit', compact('title','award'));
	}

	public function update(Request $request, $id)
	{
		$data = request()->validate(
			[
				'name' => 'required',
				'description' => 'required',
			],
			[
				'name.required' => '*Nombre del Premio: Ingrese el nombre del Premio',
				'description.required' => '*Descripción: Ingrese la descripción del premio',
			]
		);

		$award = Award::find($id);

		$award->name = ucfirst($data['name']);
		$award->description = ucfirst($data['description']);
		$award->save();

		$request->session()->flash('success', 'El premio fue editado correctamente');

		return redirect()->route('awards.show', ['award' => $award]);
	}
}
