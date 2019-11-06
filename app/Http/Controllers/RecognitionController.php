<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Organization;
use App\Recognition;
use App\RecognitionResource;
use App\Evaluation;
use App\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class RecognitionController extends Controller
{
	public function index()
	{
		$title = "Listado de reconocimientos";
		$user = Auth::user();
		if($user->user_type_id < 3){
			$organizations = Organization::all()->pluck('name', 'id');
			$organizations->prepend('Buscar por empresa', 'undefined');
			$recognition_list = (new Recognition)->newQuery();
			if(!is_null(Input::get('organization')) && (Input::get('organization') != 'undefined')){
				$organization_id = Input::get('organization');
				$recognition_list->whereHas('user', $filter = function($query) use ($organization_id){
					$query->where('organization_id', $organization_id);
				}); // | recognitions | --> | users | --> | organizations |  (join)
			}
			// $recognitions = Recognition::all();
			$recognitions = $recognition_list->get();
			return view('admin.recognitions.index', compact('recognitions', 'title', 'organizations'));
		}
		else{
			$recognitions = Recognition::where('user_id', $user->id)->get();
			return view('admin.recognitions.userindex', compact('recognitions', 'user', 'title'));
		}
	}

	public function show(Recognition $recognition)
	{
		return view('admin.recognitions.show', compact('recognition'));
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

	public function edit(Recognition $recognition)
	{
		$title = 'Editar Reconocimiento';
		$grantters = User::where('organization_id', $recognition->user->organization_id)->get()->except(['id', $recognition->user->id])->pluck('full_name', 'id');
		return view('admin.recognitions.edit', compact('title','recognition', 'grantters'));
	}

	public function update(Request $request, Recognition $recognition)
	{
		$title = 'Editar Reconocimiento';
		
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
		// if(is_null($request->observation)){
		// 	$request->session()->flash('danger', '*Requerimiento: debe ingresar el requerimiento de capacitación solicitado para este usuario');
		// 	return \View::make('admin.recognitions.edit', compact('title', 'recognition'));
		// }
		// else{
		// 	$recognition->observation = $request->observation;
		// }
		$recognition->name = ucfirst($data['name']);
		$recognition->observation = ucfirst($data['observation']);
		$recognition->grantter_id = $request->grantter;
		$recognition->save();
		$request->session()->flash('success', 'Reconocimiento editado correctamente');
		return view('admin.recognitions.show', compact('recognition', 'title'));
	}

	public function destroy(Request $request, $id)
    {
        $recognition = Recognition::find($id);
        $message = "El reconocimiento $recognition->name fue eliminado correctamente";
        $recognition->delete();
        return redirect()->route('recognitions.index')->with('success', $message);
    }

}
