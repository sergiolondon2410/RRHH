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
        // $evaluations = Evaluation::find();
        // $questions = Evaluation::find($id)->questions;
        $users = User::where('organization_id', $evaluation->process->organization_id)->get();
    	// dd($users);

        $title = "Usuarios asignados a la evaluación: ".$evaluation->name;
        return view('admin.applications.index', compact('evaluation', 'users', 'title'));
    }
}
