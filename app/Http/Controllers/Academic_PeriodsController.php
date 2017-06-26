<?php

namespace App\Http\Controllers;

use App\Academic_periods;
use App\Http\Controllers\Controller;
use App\Http\Requests\AcademicPeriodRequest;
use Illuminate\Http\Request;
use Redirect;
use Session;

class Academic_PeriodsController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$academic_periods = Academic_periods::paginate(8);
		return view('academic_periods.academic_period', ['academic_periods' => $academic_periods]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		return view('academic_periods.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(AcademicPeriodRequest $request) {
		Academic_periods::create([
			'academic_period' => $request['academic_period'],
			'date_first' => $request['date_first'],
			'date_last' => $request['date_last'],
			'status' => $request['status'],
		]);
		return redirect('/academic_periods')->with('message', 'Periodo academico creado con exito...');
	}

	public function search(Request $request) {

		$academic_periodSearch = \Request::get('academic_periodSearch');
		$academic_periods = Academic_periods::where('academic_periods.academic_period', 'like', '%' . $academic_periodSearch . '%')
			->orderBy('academic_periods.academic_period')
			->paginate(8);

		return view('academic_periods.academic_period', ['academic_periods' => $academic_periods]);

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id) {
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) {
		$academic_periods = Academic_periods::find($id);
		return view('academic_periods.edit_academic_periods', ['academic_periods' => $academic_periods]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(AcademicPeriodRequest $request, $id) {
		$academic_periods = Academic_periods::find($id);
		$academic_periods->fill($request->all());
		$academic_periods->save();
		session::flash('message', 'Periodo academico editado correctamente...');
		return Redirect::to('/academic_periods');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		Academic_periods::destroy($id);
		session::flash('message', 'Periodo academico eliminado correctamente...');
		return Redirect::to('/academic_periods');
	}
}
