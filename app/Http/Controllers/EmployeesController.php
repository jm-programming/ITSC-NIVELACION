<?php

namespace App\Http\Controllers;

use App\Employees;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use Illuminate\Http\Request;
use Redirect;
use Session;

class EmployeesController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$employees = Employees::paginate(8);
		return view('employees.employee', ['employees' => $employees]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		return view('employees.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(CreateEmployeeRequest $request) {

		Employees::create([
			'names' => $request['names'],
			'last_name' => $request['last_name'],
			'email' => $request['email'],
			'job' => $request['job'],
			'office_phone' => $request['office_phone'],
			'personal_phone' => $request['personal_phone'],
			'cellphone' => $request['cellphone'],
			'address' => $request['address'],
			'identity_card' => $request['identity_card'],
			'civil_status' => $request['civil_status'],
			'users_id' => $request['users_id'],
		]);

		return redirect('/employees')->with('message', 'Empleado creado con exito...');

	}

	public function search(Request $request) {

		$employeeSearch = \Request::get('employeeSearch');
		$employees = Employees::where('employees.names', 'like', '%' . $employeeSearch . '%')
			->orwhere('employees.last_name', 'like', '%' . $employeeSearch . '%')
			->orderBy('employees.names')
			->paginate(8);

		return view('employees.employee', ['employees' => $employees]);
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
		$employees = Employees::find($id);
		return view('employees.edit', ['employees' => $employees]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update($id, UpdateEmployeeRequest $request) {
		$employees = Employees::find($id);
		$employees->fill($request->all());
		$employees->save();
		session::flash('message', 'Empleado editado correctamente...');
		return Redirect::to('/employees');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		Employees::destroy($id);
		session::flash('message', 'Empleado eliminado correctamente...');
		return Redirect::to('/employees');
	}
}
