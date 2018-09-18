<?php

namespace App\Http\Controllers;

use App\Organization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;

class OrganizationController extends Controller
{
    public function index()
    {
        $organizations = Organization::all();
        $title = "Listado de empresas";
        return view('admin.organizations.index', compact('organizations', 'title'));
    }

    public function show($id)
    {
        $organization = Organization::find($id);
        return view('admin.organizations.show', compact('organization'));
    }

    public function create()
    {
    	return view('admin.organizations.create');
    }

    public function store(Request $request)
    {

    	$data = request()->validate(
            [
                'name' => 'required',
                'phone' => 'required',
                'nit' => 'required',
                'employee_num' => 'required'
            ],
            [
                'name.required' => 'Ingrese el nombre de la empresa',
                'phone.required' => 'Ingrese el teléfono',
                'nit.required' => 'Ingrese el NIT de la empresa o identificación',
                'employee_num.required' => 'Ingrese el número de empleados en la empresa'
            ]
        );

        $registro = Organization::create([
            'name' => $data['name'],
            'phone' => $data['phone'],
            'taxes_id' => $data['nit'],
            'employee_quantity' => $data['employee_num']
        ]);
        $extension = ['image/jpeg' => '.jpg', 'image/png' => '.png'];
        $file = $request->file('logo_url');
        $nombre = 'empresa-'.$registro->id.$extension[$file->getClientMimeType()];
        $registro->update(['logo_url' => $nombre]);
        \Storage::disk('local')->put($nombre,  \File::get($file));
        

        return redirect()->action('OrganizationController@index');
    }
}
