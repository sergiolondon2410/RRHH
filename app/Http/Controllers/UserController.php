<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\UserType;
use App\Organization;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function index()
    {
        $users = User::all();
        $current_user_type = Auth::user()->user_type_id;
        if($current_user_type > 2){ //Si es administrador del sistema muestra todos los usuarios, sino muestra solo los de la empresa
            $empresa = Auth::user()->organization_id;
            $users = User::where('organization_id', $empresa)->get();
        }
        
        $title = "Listado de usuarios";
        return view('admin.users.index', compact('users', 'title'));
    }

    public function show(Request $request, User $user)
    {
    	return view('admin.users.show', compact('user'));
    }

    public function create()
    {
        $current_user_type = Auth::user()->user_type_id;
        $user_type = UserType::where('id', '>', $current_user_type)->get()->pluck('name', 'id');
        $organization = Organization::pluck('name', 'id');
    	return view('admin.users.create', compact('user_type', 'organization'));
    }

    public function store(Request $request)
    {   
        $data = request()->validate(
            [
                'name' => 'required',
                'last_name' => 'required',
                'document' => 'required|unique:users,document',
                'user_type' => 'required',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:3',
                'password_confirm'=> 'required|same:password'
            ],
            [ 
                'name.required' => '*Nombre: Ingrese el nombre',
                'last_name.required' => '*Apellido: Ingrese el apellido',
                'document.required' => '*Documento: Ingrese el documento de identidad',
                'document.unique' => '*Documento: El documento de identidad ya está tomado',
                'email.required' => '*Email: Ingrese el correo electrónico',
                'email.email' => '*Email: Ingrese una dirección de correo electrónico válida',
                'email.unique' => '*Email: La dirección de correo electrónico ya está tomada',
                'password.required' => '*Contraseña: Ingrese una contraseña',
                'password.min' => '*Contraseña: La contraseña debe terner al menos 6 caracteres',
                'password_confirm.required' => '*Confirme la contraseña: Ingrese nuevamente la contraseña',
                'password_confirm.same' => '*Confirme la contraseña: Los campos de contraseñas deben ser iguales'
            ]
        );
        // Código que valida si el usuario nuevo es Administrador y le asigna la empresa por defecto, sino deja la del formulario
        $admin_user_type = UserType::where('name', 'Administrador')->get();

        if($request['user_type'] == $admin_user_type[0]->id){
            $request['organization'] = 1; //se supone que por ahora es Gente OK (número mágico)
        }
        $organization = ($request['user_type'] == $admin_user_type[0]->id) ? 1 : $request['organization'];
        $position = (is_null($request['position'])) ? 'Empleado' : $request['position'];
        $area = (is_null($request['area'])) ? 'Operativa' : $request['area'];

        $user = User::create([
            'name' => ucwords(strtolower($data['name'])),
            'last_name' => ucwords(strtolower($data['last_name'])),
            'email' => $data['email'],
            'document' => $data['document'],
            'organization_id' => $organization,
            'user_type_id' => $request['user_type'],
            'position' => ucwords(strtolower($position)),
            'area' => ucwords(strtolower($area)),
            'password' => bcrypt($data['password']),
            'profile_img' => 'profile_image.png',
            'boss_id' => 1,
            'level' => 1
        ]);

        $extension = ['image/jpeg' => '.jpg', 'image/png' => '.png'];
        $file = $request->file('profile_img');
        if($file != null){
            $nombre = 'perfil-'.$user->id.'_'.time().$extension[$file->getClientMimeType()];
            $user->update(['profile_img' => $nombre]);
            \Storage::disk('local')->put($nombre,  \File::get($file));
        }
        $message = "El usuario $user->name $user->last_name fue creado correctamente";
        $request->session()->flash('success', $message);
        return redirect()->action('UserController@index');
    }

    public function edit(Request $request, User $user)
    {
        $current_user_type = Auth::user()->user_type_id;
        if($current_user_type < 3 || Auth::user()->id == $user->id){
            $user_type = UserType::where('id', '>', $current_user_type)->get()->pluck('name', 'id');
            $organization = Organization::pluck('name', 'id');
            $title = 'Editar usuario';
            return view('admin.users.edit', compact('title', 'user', 'user_type', 'organization'));
        }
        else{
            $request->session()->flash('danger', 'Usted no puede realizar la edición de otro usuario');
            return redirect()->route('home');
        }
    }

    public function update(Request $request, User $user)
    {
        if(Auth::user()->user_type_id < 3){
            $data = request()->validate(
                [
                    'name' => 'required',
                    'last_name' => 'required',
                    'document' => 'required',
                    'email' => 'required|email',
                    'password'=> 'required_with:password_confirm',
                    'password_confirm'=> 'same:password'
                ],
                [ 
                    'name.required' => '*Nombre: Ingrese el nombre',
                    'last_name.required' => '*Apellidos: Ingrese el apellido',
                    'document.required' => '*Documento: Ingrese el documento de identidad',
                    'email.required' => '*Email: Ingrese el correo electrónico',
                    'email.email' => '*Email: Ingrese una dirección de correo electrónico válida',
                    'password.required_with' => '*Contraseña: Debe ingresar un valor si desea modificar la contraseña',
                    'password_confirm.same' => '*Confirme la contraseña: Los campos de contraseñas deben ser iguales'
                ]
            );
            $user->document = $data['document'];
            $user->user_type_id = $request['user_type'];
            $user->organization_id = $request['organization'];
            $user->email = $data['email'];
            $user->position = $request['position'];
            $user->area = $request['area'];
            // $user->name = ucwords(strtolower($data['name']));
            // $user->last_name = ucwords(strtolower($data['last_name']));
            // if($data['password'] != ''){
            //     $user->password = bcrypt($data['password']);
            // }
            // $extension = ['image/jpeg' => '.jpg', 'image/png' => '.png'];
            // $file = $request->file('profile_img');
            // if($file != null){
            //     $nombre = 'perfil-'.$id.'_'.time().$extension[$file->getClientMimeType()];
            //     $user->profile_img = $nombre;
            //     \Storage::disk('local')->put($nombre,  \File::get($file));
            // }
            // $user->save();
            // $request->session()->flash('success', 'El usuario fue editado correctamente');
            // return view('admin.users.show', compact('user'));
        }
        else{
            $data = request()->validate(
                [
                    'name' => 'required',
                    'last_name' => 'required',
                    'password'=> 'required_with:password_confirm',
                    'password_confirm'=> 'same:password'
                ],
                [ 
                    'name.required' => '*Nombre: Ingrese el nombre',
                    'last_name.required' => '*Apellidos: Ingrese el apellido',
                    'password.required_with' => '*Contraseña: Debe ingresar un valor si desea modificar la contraseña',
                    'password_confirm.same' => '*Confirme la contraseña: Los campos de contraseñas deben ser iguales'
                ]
            );
        }
        $user->name = ucwords(strtolower($data['name']));
        $user->last_name = ucwords(strtolower($data['last_name']));
        if($data['password'] != ''){
            $user->password = bcrypt($data['password']);
        }
        $extension = ['image/jpeg' => '.jpg', 'image/png' => '.png'];
        $file = $request->file('profile_img');
        if($file != null){
            $nombre = 'perfil-'.$user->id.'_'.time().$extension[$file->getClientMimeType()];
            $user->profile_img = $nombre;
                \Storage::disk('local')->put($nombre,  \File::get($file));
        }
        $user->save();
        $request->session()->flash('success', 'El usuario fue editado correctamente');
        return view('admin.users.show', compact('user'));
    }

    public function destroy(Request $request, $id)
    {
        $user = User::find($id);
        $message = "El usuario $user->name $user->last_name fue eliminado correctamente";
        $user->delete();
        // $request->session()->flash('success', $message);
        return redirect()->route('users.index')->with('success', $message);
    }


    public function getUserTypeArray()
    {
        $current_user_type = Auth::user()->user_type_id;
        $user_type = UserType::where('id', '>', $current_user_type)->get()->pluck('name', 'id');
        return $user_type;
    }

}
