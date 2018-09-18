<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Organization;
use App\Award;
use App\User;
use App\Accomplishment;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class AccomplishmentController extends Controller
{
	public function index()
	{
		$current_user_type = Auth::user()->user_type_id;

		if($current_user_type < 3){
			$accomplishments = Accomplishment::all();
		}
		else if($current_user_type > 2){
			// $accomplishments = Award::where('awards.organization_id', Auth::user()->organization_id)
			// 	->join('accomplishments', 'awards.id', '=', 'accomplishments.award_id')
			// 	->select()
			// 	->get();

			//------- con subquery ----------
			$accomplishments = Accomplishment::whereIn('award_id', function($query){
				$query->select('id')
				->from(with(new Award)->getTable())
				->where('organization_id', Auth::user()->organization_id);
			})->get();
		}
		// dd($accomplishments);
		$title = "Reconocimientos";
		return view('admin.accomplishments.index', compact('accomplishments', 'title'));
	}

	public function show($id)
	{
		$accomplishment = Accomplishment::find($id);
		return view('admin.accomplishments.show', compact('accomplishment'));
	}

	public function create(Request $request)
	{
		$awards = Award::where('organization_id', Auth::user()->organization_id)->get();
		$users = User::where('organization_id', Auth::user()->organization_id)
					->where('id', '!=', Auth::user()->id)
					->get()->pluck('name', 'id');
		return view('admin.accomplishments.create', compact('awards', 'users'));
	}

	public function store(Request $request)
	{
		$data = request()->validate(
			[
				'observation' => 'required',
				'award' => 'required'
			],
			[
				'observation.required' => '*Observación: Detalle el motivo por el cual concede este reconocimiento',
				'award.required' => '*Reconocimiento: Debe seleccionar un reconocimiento'
			]
		);

		$registro = Accomplishment::create([
			'observation' => ucfirst($data['observation']),
			'award_id' => $data['award'],
			'user_id' => $request->user,
			'giver_id' => Auth::user()->id
		]);

		$request->session()->flash('success', 'El reconocimiento fue otorgado correctamente');
		return redirect()->route('accomplishments.show', ['accomplishment' => $registro->id]);
	}

	public function edit(Accomplishment $accomplishment)
	{
		$title = 'Editar reconocimiento';
		return view('admin.accomplishments.edit', compact('title','accomplishment'));
	}

	public function update(Request $request, $id)
	{
		$data = request()->validate(
			[
				'observation' => 'required'
			],
			[
				'observation.required' => '*Observación: Detalle el motivo por el cual concede este reconocimiento'
			]
		);

		$accomplishment = Accomplishment::find($id);

		$accomplishment->observation = ucfirst($data['observation']);
		$accomplishment->save();

		$request->session()->flash('success', 'El reconocimiento fue editado correctamente');

		return redirect()->route('accomplishments.show', ['accomplishment' => $accomplishment]);
	}

	public function destroy(Request $request, $id)
    {
        $accomplishment = Accomplishment::find($id);
        $message = "El reconocimiento fue eliminado correctamente";
        $accomplishment->delete();
        $request->session()->flash('success', $message);
        return redirect()->route('accomplishments.index')->with('success', $message);
    }
}
