<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\UserType;
use App\Organization;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\ImportRequest;

class ImportController extends Controller
{
	public function index()
	{
		$organizations = Organization::all()->pluck('name','id');
		return view('admin.imports.index', compact('organizations'));
	}

	public function importFile(Request $request)
	{
		$organization = Organization::find($request->organization);
		$path = $request->file('csv_file')->getRealPath();
		$data = Excel::load($path)->get();
		if($data->count()){
			foreach ($data as $key => $value){
				if(is_null($value->nombre) && is_null($value->apellido) && is_null($value->correo) && is_null($value->documento) && is_null($value->area) && is_null($value->cargo) && is_null($value->tipo_de_usuario_empleado_o_supervisor)){
					//deja pasar el ciclo sin hacer nada
				}
				else{
					$user_type = ($value->tipo_de_usuario_empleado_o_supervisor == 'Supervisor') ? 4 : 5 ;
					$position = (is_null($value->cargo)) ? 'Empleado' : $value->cargo;
					$area = (is_null($value->area)) ? 'Operativa' : $value->area;
					$users[$key] = [
						'name'      => $value->nombre, 
						'last_name' => $value->apellido,
						'email'     => $value->correo,
						'password' => bcrypt($value->documento),
						'user_type' => $user_type,
						'organization_id' => $organization->id,
						'document'  => intval($value->documento),
						'position'  => $position,
						'area'      => $area,
						'profile_img' => 'profile_image.png',
						'boss_id' => 1,
						'level' => 1
					];
				}

			}
			// dd($users);
			return view('admin.imports.form', compact('users', 'organization'));
			//-------------------- código que está montado inicio
			// $message = "Usuarios creados correctamente: ";
			// foreach ($users_array as $user) {
			// 	User::create([
			// 		'name' => $user['name'],
			// 		'last_name' => $user['last_name'],
			// 		'email' => $user['email'],
			// 		'document' => $user['document'],
			// 		'organization_id' => $user['organization_id'],
			// 		'user_type_id' => $user['user_type'],
			// 		'position' => $user['position'],
			// 		'area' => $user['area'],
			// 		'password' => bcrypt($user['document']),
			// 		'profile_img' => 'profile_image.png',
			// 		'boss_id' => 1,
			// 		'level' => 1
			// 	]);
			// 	$message .= "Usuarios creados correctamente";
			// }
			// $request->session()->flash('success', $message);
			// return redirect()->action('UserController@index');
			//---------------------------- código que está montado fin

		}
		else{
			$message = "El archivo no pudo ser leido correctamente, inténtelo nuevamente";
			$organizations = Organization::all()->pluck('name','id');
			$request->session()->flash('danger', $message);
			return view('admin.imports.index', compact('organizations'));
		}
	}
	/*public function importFile(Request $request)
	{
		$path = $request->file('csv_file')->getRealPath();
		$data = Excel::load($path)->get();
		if($data->count()){
			foreach ($data as $key => $value){
				if(is_null($value->nombre) && is_null($value->apellido) && is_null($value->correo) && is_null($value->documento) && is_null($value->area) && is_null($value->cargo) && is_null($value->tipo_de_usuario_empleado_o_supervisor)){
					//deja pasar el ciclo sin hacer nada
				}
				else{
					$users_array[$key] = [
						'name'      => $value->nombre, 
						'last_name' => $value->apellido,
						'email'     => $value->correo,
						'document'  => intval($value->documento),
						'area'      => $value->area,
						'position'  => $value->cargo,
						'user_type' => $value->tipo_de_usuario_empleado_o_supervisor,
						'validated' => true,
						'error_msg' => ''
					];
					if(is_null($value->nombre) || is_null($value->apellido) || is_null($value->correo) || is_null($value->documento)){
						$users_array[$key]['validated'] = false;
						$users_array[$key]['error_msg'] .= "Los campos con asterisko (*) son obligatorios.";
					}
					if(!is_null(User::where('email', $value->correo)->get())){
						$users_array[$key]['validated'] = false;
						$users_array[$key]['error_msg'] .= ' El Correo ya está tomado.';
					}
					if(!is_numeric($value->documento)){
						$users_array[$key]['validated'] = false;
						$users_array[$key]['document'] = $value->documento;
						$users_array[$key]['error_msg'] .= ' El campo Documento debe ser numérico.';
					}
					// else{
					// 	if(!is_null(User::where('document', $value->documento)->get())){
					// 		$users_array[$key]['validated'] = false;
					// 		$users_array[$key]['error_msg'] .= ' Ya existe un usuario con este documento.';
					// 	}
					// }
				}
			}
		}
		// $validador = User::where('document', 'pepino')->get();
		// dd($validador);
		dd($users_array);
	}*/

	public function store(ImportRequest $request, $organization)
	{
		// dd($request);
		// $request->validate([
		// 	'names.*' => 'required'
		// ]);

		// $ php artisan make:request ImportRequest

	}

	// public function create(ImportRequest $request)
	// {
	// 		return 'ok';
	// }
	// class CsvImportRequest extends FormRequest
// {
//     public function authorize()
//     {
//         return true;
//     }

//     public function rules()
//     {
//         return [
//             'csv_file' => 'required|file'
//         ];
//     }
// }

	//styde.net/importar-datos-desde-excel-o-csv-a-laravel/
	// https://quickadminpanel.com/blog/how-to-import-csv-in-laravel-and-choose-matching-fields/
}
