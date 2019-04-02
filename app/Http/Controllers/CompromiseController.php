<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Organization;
use App\Compromise;
use App\CompromiseAlert;
use App\Evaluation;
use App\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Carbon\Carbon;

class CompromiseController extends Controller
{
	public function index()
	{
		$title = "Listado de compromisos";
		$user = Auth::user();
		$status = [
			"undefined" => "Buscar por estado",
			"pending" => "Pendiente",
			"achieved" => "Cumplido",
			"unsuccessful" => "No cumplido"
		];
		$organizations = Organization::all()->pluck('name', 'id');
		$organizations->prepend('Buscar por empresa', 'undefined');
		if($user->user_type_id < 3){
			$compromise_list = (new Compromise)->newQuery();

			if(!is_null(Input::get('organization')) && (Input::get('organization') != 'undefined')){
				$organization_id = Input::get('organization');
				$compromise_list->whereHas('user', $filter = function($query) use ($organization_id){
					$query->where('organization_id', $organization_id);
				}); // | compromises | --> | users | --> | organizations |  (join)
			}
			if(!is_null(Input::get('status')) && (Input::get('status') != 'undefined')){
				$compromise_list->where('status', Input::get('status'));
			}
			$compromises = $compromise_list->get();
			return view('admin.compromises.index', compact('compromises', 'title', 'status', 'organizations'));
		}
		else{
			$compromises = Compromise::where('user_id', $user->id)->get();
			return view('admin.compromises.userindex', compact('compromises', 'user', 'title', 'status', 'organizations'));
		}
	}

	public function show(Compromise $compromise)
	{
		$status = [
			"undefined" => "Buscar por estado",
			"pending" => "Pendiente",
			"achieved" => "Cumplido",
			"unsuccessful" => "No cumplido"
		];
		return view('admin.compromises.show', compact('compromise', 'title', 'status'));
	}

	public function edit(Compromise $compromise)
	{
		$title = 'Editar compromiso';
		$validators = User::where('organization_id', $compromise->user->organization_id)->get()->except(['id', $compromise->user->id])->pluck('full_name', 'id');
		$status = [
			"pending" => "Pendiente",
			"achieved" => "Cumplido",
			"unsuccessful" => "No cumplido"
		];
		$alarm = ["Ninguna alarma", "Un día antes", "Dos días antes", "Tres días antes", "Una semana antes"];

		return view('admin.compromises.edit', compact('title','compromise', 'validators', 'status'));
	}

	public function update(Request $request, Compromise $compromise)
	{
		$title = 'Editar compromiso';
		$validators = User::where('organization_id', $compromise->user->organization_id)->get()->except(['id', $compromise->user->id])->pluck('full_name', 'id');
		$status = [
			"pending" => "Pendiente",
			"achieved" => "Cumplido",
			"unsuccessful" => "No cumplido"
		];
		$fail_view = \View::make('admin.compromises.edit', compact('title', 'compromise', 'validators','status'));

		$compromise->validator_id = $request['validator'];
		$compromise->status = $request->status;

		if(is_null($request['observation'])){
			$request->session()->flash('danger', '*Aspecto a mejorar: debe ingresar el aspecto a mejorar');
			return $fail_view;
		}
		else{
			$compromise->observation = $request['observation'];
		}

		if(is_null($request['activity'])){
			$request->session()->flash('danger', '*Acciones: Debe ingresar las acciones a realizar');
			return $fail_view;
		}
		else{
			$compromise->activity = $request['activity'];
		}

		if(is_null($request['end_date'])){
			$request->session()->flash('danger', '*Fecha de cumplimiento: Debe ingresar una fecha límite para el cumplimiento del compromiso');	
			return $fail_view;
		}
		elseif(Carbon::createFromFormat('d/m/Y', $request['end_date']) <= Carbon::now()){
			$request->session()->flash('danger', '*Fecha de cumplimiento: Debe ingresar una fecha posterior');
			return $fail_view;
		}
		else{
			$ending = Carbon::createFromFormat('d/m/Y', $request['end_date'])->toDateTimeString();
			$compromise->ending = $ending;
		}
		$compromise->save();
		$request->session()->flash('success', 'Compromiso editado correctamente');
		return view('admin.compromises.show', compact('compromise', 'title', 'status'));
	}

	public function organization() //?????
	{
		$organizations = Organization::all();
		$title = 'Asignar compromisos: Elegir empresa';
		return view('admin.compromises.organization', compact('organizations', 'title'));
	}

	public function user(Request $request)
	{
		if(is_null($request->organization[0]))
		{
			$request->session()->flash('danger', 'Debe seleccionar una empresa');
			return redirect()->action('CompromiseController@organization');
		}
		else{
			$users = User::where('organization_id', $request->organization[0])->get();
			$title = 'Asignar compromisos: Elegir usuario';
			return view('admin.compromises.user', compact('users', 'title'));
		}
	}

	public function validator(Request $request)
	{
		$user = User::find($request->user[0]);
		$validators = User::where('organization_id', $user->organization_id)->get()->except(['id', $user->id])->pluck('name', 'id');
		$title = 'Asignar compromisos: Elegir usuario validador';
		return view('admin.compromises.validator', compact('user', 'validators', 'title'));
	}

	public function create(Request $request, User $user, Evaluation $evaluation)
	{
		$validators = User::where('organization_id', $user->organization_id)->get()->except(['id', $user->id])->pluck('full_name', 'id');
		$alarm = ["Ninguna alarma", "Un día antes", "Dos días antes", "Tres días antes", "Una semana antes"];
		return view('admin.compromises.create', compact('user', 'validators', 'alarm', 'evaluation'));
	}

	public function store(Request $request, User $user, Evaluation $evaluation)
	{
		// $today = Carbon::now()->format('d/m/Y');
		$validators = User::where('organization_id', $user->organization_id)->get()->except(['id', $user->id])->pluck('full_name', 'id');
		$alarm = ["Ninguna alarma", "Un día antes", "Dos días antes", "Tres días antes", "Una semana antes"];
		$compromise = New Compromise([
			'user_id' => $user->id,
			'validator_id' => $request['validator']
		]);

		if(is_null($request['observation'])){
			$request->session()->flash('danger', '*Aspecto a mejorar: debe ingresar el aspecto a mejorar');
			return view('admin.compromises.create', compact('user', 'validators', 'alarm', 'evaluation'));
		}
		else{
			$compromise->observation = $request['observation'];
		}

		if(is_null($request['activity'])){
			$request->session()->flash('danger', '*Acciones: Debe ingresar las acciones a realizar');
			return view('admin.compromises.create', compact('user', 'validators', 'alarm', 'evaluation'));
		}
		else{
			$compromise->activity = $request['activity'];
		}

		if(is_null($request['date'])){
			$request->session()->flash('danger', '*Fecha de cumplimiento: Debe ingresar una fecha límite para el cumplimiento del compromiso');	
			return view('admin.compromises.create', compact('user', 'validators', 'alarm', 'evaluation'));
		}
		elseif(Carbon::createFromFormat('d/m/Y', $request['date']) <= Carbon::now()){
			$request->session()->flash('danger', '*Fecha de cumplimiento: Debe ingresar una fecha posterior');
			return view('admin.compromises.create', compact('user', 'validator', 'alarm'));
		}
		else{
			$ending = Carbon::createFromFormat('d/m/Y', $request['date'])->toDateTimeString();
			$compromise->ending = $ending;
		}

		$compromise->observation = (is_null($request['observation'])) ? '' : $request['observation'];

		$compromise->save();
		
		if($request['alarm'] != 0){
			$fecha = Carbon::createFromFormat('d/m/Y', $request['date']);
			$alarma = [
				"1" => $fecha->subDays(1)->toDateTimeString(),
				"2" => $fecha->subDays(2)->toDateTimeString(),
				"3" => $fecha->subDays(3)->toDateTimeString(),
				"4" => $fecha->subWeek(1)->toDateTimeString()
			];
			$alert = CompromiseAlert::create([
				'compromise_id' => $compromise->id,
				'date' => $alarma[$request['alarm']]
			]);
		}

		$request->session()->flash('success', 'Compromiso asignado exitosamente');
		
		// return redirect()->action('CompromiseController@index');
		return redirect()->action('ApplicationController@userComputation', ['user' => $user, 'evaluation' => $evaluation]);
	}
}
