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

    public function show(Request $request, $id)
    {
        $user = User::find($id);
    	return view('admin.users.show', compact('user'));
    }

    public function create()
    {

        $user_type = $this->getUserTypeArray();
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
                'organization' => 'required',
                'email' => 'required|email|unique:users,email',
                'password'      => 'required|min:3',
                'password_confirm'=> 'required|same:password'
            ],
            [ 
                'name.required' => 'Ingrese el nombre',
                'last_name.required' => 'Ingrese el apellido',
                'document.required' => 'Ingrese el documento de identidad',
                'document.unique' => 'El documento de identidad ya está tomado',
                'email.required' => 'Ingrese el correo electrónico',
                'email.email' => 'Ingrese una dirección de correo electrónico válida',
                'email.unique' => 'La dirección de correo electrónico ya está tomada',
                'password.required' => 'Ingrese una contraseña',
                'password.min' => 'La contraseña debe terner al menos 6 caracteres',
                'password_confirm.required' => 'Ingrese nuevamente la contraseña',
                'password_confirm.same' => 'Los campos de contraseñas deben ser iguales'
            ]
        );
        // Código que valida si el usuario nuevo es Administrador y le asigna la empresa por defecto, sino deja la del formulario
        $organization_id = $data['organization'];

        $admin_user_type = UserType::where('name', 'Administrador')->get();

        if($data['user_type'] == $admin_user_type[0]->id){
            $organization_id = 1; //se supone que por ahora es Gente OK (número mágico)
        }

        $registro = User::create([
            'name' => ucfirst($data['name']),
            'last_name' => ucfirst($data['last_name']),
            'email' => $data['email'],
            'document' => $data['document'],
            'organization_id' => $organization_id,
            'user_type_id' => $data['user_type'],
            'password' => bcrypt($data['password']),
            'profile_img' => 'profile_image.png',
            'boss_id' => 1,
            'level' => 1
        ]);

        $extension = ['image/jpeg' => '.jpg', 'image/png' => '.png'];
        $file = $request->file('profile_img');
        if($file != null){
            $nombre = 'perfil-'.$registro->id.'_'.time().$extension[$file->getClientMimeType()];
            $registro->update(['profile_img' => $nombre]);
            \Storage::disk('local')->put($nombre,  \File::get($file));
        }

        $request->session()->flash('success', 'El usuario fue creado correctamente');
        return redirect()->action('UserController@index');
        // return view('admin.users.index', compact('title'));
    }

    public function edit($id)
    {
        $user = User::find($id);
        $title = 'Editar usuario';
        $user_type = $this->getUserTypeArray();
        $organization = Organization::pluck('name', 'id');
        return view('admin.users.edit', compact('title','user', 'user_type', 'organization'));
    }

    public function update(Request $request, $id)
    {
        $data = request()->validate(
            [
                'name' => 'required',
                'last_name' => 'required',
                'document' => 'required',
                'user_type' => 'required',
                'organization' => 'required',
                'email' => 'required|email',
                'password'=> 'required_with:password_confirm',
                'password_confirm'=> 'same:password'
            ],
            [ 
                'name.required' => 'Ingrese el nombre',
                'last_name.required' => 'Ingrese el apellido',
                'document.required' => 'Ingrese el documento de identidad',
                'email.required' => 'Ingrese el correo electrónico',
                'email.email' => 'Ingrese una dirección de correo electrónico válida',
                'password.required_with' => 'Debe ingresar un valor si desea modificar la contraseña',
                'password_confirm.same' => 'Los campos de contraseñas deben ser iguales'
            ]
        );
        $user = User::find($id);
        $user->name = ucfirst($data['name']);
        $user->last_name = ucfirst($data['last_name']);
        $user->document = $data['document'];
        $user->user_type_id = $data['user_type'];
        $user->organization_id = $data['organization'];
        $user->email = $data['email'];
        if($data['password'] != ''){
            $user->password = bcrypt($data['password']);
        }
        $extension = ['image/jpeg' => '.jpg', 'image/png' => '.png'];
        $file = $request->file('profile_img');
        if($file != null){
            $nombre = 'perfil-'.$id.'_'.time().$extension[$file->getClientMimeType()];
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
        // dd($message);
        $user->delete();
        // $request->session()->flash('success', $message);
        return redirect()->route('users.index')->with('success', $message);
    }


    public function getUserTypeArray()
    {
        $current_user_type = Auth::user()->user_type_id;
        $user_type_array = UserType::where('id', '>', $current_user_type)->get();
        $user_type = [];
        foreach ($user_type_array as $type) {
            $user_type[$type->id] = $type->name;
        }

        return $user_type;
    }

}
