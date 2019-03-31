<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\UserType;
use App\Organization;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class ImportController extends Controller
{
	public function index()
	{
		$organizations = Organization::all()->pluck('name','id');
		return view('admin.imports.index', compact('organizations'));
	}

	public function importFile(Request $request)
	{
		$path = $request->file('csv_file')->getRealPath();
		$data = Excel::load($path)->get();
		dd($data);
	}

// 	class CsvImportRequest extends FormRequest
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
