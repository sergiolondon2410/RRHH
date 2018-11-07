<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Application;
use App\Compromise;
use App\Recognition;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $evaluations = Application::where('evaluator_id', $user->id)->where('status', 'uninitialized')->get()->count();
        $accomplished_compromises = Compromise::where('user_id', $user->id)->where('status', 'accomplished')->get()->count();
        $pending_compromises = Compromise::where('user_id', $user->id)->where('status', 'pending')->get()->count();
        $recognitions = Recognition::where('user_id', $user->id)->get()->count();
        return view('home', compact('user', 'evaluations', 'accomplished_compromises', 'pending_compromises', 'recognitions'));
    }
}
