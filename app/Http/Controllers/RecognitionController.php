<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Recognition;
use App\RecognitionResource;
use App\Evaluation;
use App\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class RecognitionController extends Controller
{
	public function index()
	{
		$title = "Listado de reconocimientos";
		$user = Auth::user();
		if($user->user_type_id < 3){
			$recognitions = Recognition::all();
			return view('admin.recognitions.index', compact('recognitions', 'title'));
		}
		else{
			$recognitions = Recognition::where('user_id', $user->id)->get();
			return view('admin.recognitions.userindex', compact('recognitions', 'user', 'title'));
		}
	}

    public function create(Request $request, User $user, Evaluation $evaluation)
	{
		$resources = RecognitionResource::all();
		$grantters = User::where('organization_id', $user->organization_id)->get()->except(['id', $user->id])->pluck('full_name', 'id');
		return view('admin.recognitions.create', compact('user', 'evaluation', 'resources', 'grantters'));
	}

	public function store(Request $request, User $user, Evaluation $evaluation){
		$data = request()->validate(
			[
				'name' => 'required',
				'observation' => 'required',
			],
			[
				'name.required' => 'Reconocimiento: Ingrese el título que desea darle al reconocimiento',
				'observation.required' => 'Méritos: Describa los motivos por los cuales se otorga este reconocimiento',
			]
		);

		$registro = Recognition::create([
			'name' => ucfirst($data['name']),
			'observation' => ucfirst($data['observation']),
			'resource_id' => $request->resource,
			'user_id' => $user->id,
			'grantter_id' => $request->grantter
		]);

		$request->session()->flash('success', 'El reconocimiento fue otorgado correctamente');
		// return redirect()->route('awards.show', ['award' => $registro->id]);
		return redirect()->action('ApplicationController@userComputation', ['user' => $user, 'evaluation' => $evaluation]);
	}
}
