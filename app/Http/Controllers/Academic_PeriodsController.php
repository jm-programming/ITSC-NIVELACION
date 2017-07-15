<?php

namespace App\Http\Controllers;

use App\Academic_periods;
use App\Http\Controllers\Controller;
use App\Http\Requests\AcademicPeriodRequest;
use App\Http\Requests\Academic_period_editRequest;
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
	public function store(Request $request) {



		$timeOne = strtotime($request['date_first']);
		$timeTwo = strtotime($request['date_last']);
		$monthOne = date("F", $timeOne);
		$monthTwo = date("F", $timeTwo);

		$thisYear = date("Y");
		
		
		//if you can optimize this code do it guys..
		if(($monthOne == 'January' || $monthOne == 'February' || $monthOne == 'March' || $monthOne == 'April') && ($monthTwo == 'January' || $monthTwo == 'February' || $monthTwo == 'March' || $monthTwo == 'April')){
			$period = $thisYear.'-1';
		}else if(($monthOne == 'May' || $monthOne == 'June' || $monthOne == 'July' || $monthOne == 'August') && ($monthTwo == 'May' || $monthTwo == 'June' || $monthTwo == 'July' || $monthTwo == 'August')){
			$period = $thisYear.'-2';
		}else if(($monthOne == 'September' || $monthOne == 'October' || $monthOne == 'November' || $monthOne == 'December') && ($monthTwo == 'September' || $monthTwo == 'October' || $monthTwo == 'November' || $monthTwo == 'December')){
			$period = $thisYear.'-3';
		}
		
		$this->validate($request, [
			$period => 'unique:academic_periods,academic_period',
          	'date_first' => 'required',
			'date_last' => 'required',
			'status' => 'required',
         ]);

		Academic_periods::create([
			'academic_period' => $period,
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
	public function update(Academic_period_editRequest $request, $id) {
		$timeOne = strtotime($request['date_first']);
		$timeTwo = strtotime($request['date_last']);
		$monthOne = date("F", $timeOne);
		$monthTwo = date("F", $timeTwo);

		$thisYear = date("Y");
		
		
		//if you can optimize this code do it guys..
		if(($monthOne == 'January' || $monthOne == 'February' || $monthOne == 'March' || $monthOne == 'April') && ($monthTwo == 'January' || $monthTwo == 'February' || $monthTwo == 'March' || $monthTwo == 'April')){
			$period = $thisYear.'-1';
		}else if(($monthOne == 'May' || $monthOne == 'June' || $monthOne == 'July' || $monthOne == 'August') && ($monthTwo == 'May' || $monthTwo == 'June' || $monthTwo == 'July' || $monthTwo == 'August')){
			$period = $thisYear.'-2';
		}else if(($monthOne == 'September' || $monthOne == 'October' || $monthOne == 'November' || $monthOne == 'December') && ($monthTwo == 'September' || $monthTwo == 'October' || $monthTwo == 'November' || $monthTwo == 'December')){
			$period = $thisYear.'-3';
		}

		$academic_periods = Academic_periods::find($id);
		$academic_periods->fill([
			'academic_period' => $period,
			'date_first' => $request['date_first'],
			'date_last' => $request['date_last'],
			'status' => $request['status'],
			]);
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
