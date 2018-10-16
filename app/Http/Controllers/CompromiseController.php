<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Organization;
use App\Compromise;
use App\CompromiseAlert;
use App\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class CompromiseController extends Controller
{
	public function index()
	{
		$title = "Listado de compromisos";
		$compromises = Compromise::all();
		return view('admin.compromises.index', compact('compromises', 'title'));
	}

	public function show(Compromise $compromise)
	{
		// $compromise = Compromise::find($compromise);
		// dd($compromise);
		return view('admin.compromises.show', compact('compromise', 'title'));
	}

	public function organization()
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
		$validators = User::where('organization_id', $user->organization_id)->get()->except(['id', $user->id]);;
		$title = 'Asignar compromisos: Elegir usuario validador';
		return view('admin.compromises.validator', compact('user', 'validators', 'title'));
	}

	public function create(Request $request, User $user)
	{
		$validator = User::find($request->validator[0]);
		$alarm = ["Ninguna alarma", "Un día antes", "Dos días antes", "Tres días antes", "Una semana antes"];
		return view('admin.compromises.create', compact('user', 'validator', 'alarm'));
	}

	public function store(Request $request, User $user, User $validator)
	{
		// $today = Carbon::now()->format('d/m/Y');
		$alarm = ["Ninguna alarma", "Un día antes", "Dos días antes", "Tres días antes", "Una semana antes"];

		$compromise = New Compromise([
			'user_id' => $user->id,
			'validator_id' => $validator->id
		]);

		if(is_null($request['activity'])){
			$request->session()->flash('danger', '*Compromiso: Debe ingresar un compromiso');
			return view('admin.compromises.create', compact('user', 'validator', 'alarm'));
		}
		else{
			$compromise->activity = $request['activity'];
		}

		if(is_null($request['date'])){
			$request->session()->flash('danger', '*Fecha de cumplimiento: Debe ingresar una fecha límite para el cumplimiento del compromiso');	
			return view('admin.compromises.create', compact('user', 'validator', 'alarm'));
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
		
		return view('admin.compromises.show');
	}
}
