<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Evaluation;
use App\Application;
use App\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class ApplicationController extends Controller
{
	public function index(Evaluation $evaluation)
	{
		$users = User::where('organization_id', $evaluation->process->organization_id)->get();
		$title = "Usuarios asignados a la evaluación: ".$evaluation->name;
		return view('admin.applications.index', compact('evaluation', 'users', 'title'));
	}

	public function edit($user_id, $evaluation_id)
	{
		$evaluation = Evaluation::find($evaluation_id);
		$user = User::find($user_id);
		$mates = User::where('organization_id',$user->organization_id)
					->where('id', '<>', $user_id)
					->get();
		// dd($mates);
		$title = 'Editar evaluación';
		return view('admin.applications.edit', compact('title','evaluation', 'user','mates'));
	}
}
