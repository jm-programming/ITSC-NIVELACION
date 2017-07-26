<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Rolls;
use App\User;
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
		
		$employees = User::orderBy('names', 'asc')
        ->where('users.rolls_id', '=' , 3)
        ->paginate(8);

        return view('employees.employee', ['employees' => $employees]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		$rolls = Rolls::all();
		return view('employees.create', ['rolls' => $rolls]);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(CreateEmployeeRequest $request) {

		User::create([
			'names' => $request['names'],
			'last_name' => $request['last_name'],
			'email' => $request['email'],
			'office_phone' => $request['office_phone'],
			'personal_phone' => $request['personal_phone'],
			'cellphone' => $request['cellphone'],
			'address' => $request['address'],
			'gender' => $request['gender'],
			'identity_card' => $request['identity_card'],
			'civil_status' => $request['civil_status'],
			'password' => bcrypt($request['password']),
			'status' => $request['status'],
			'rolls_id' =>3,
		]);

		return redirect('/employees')->with('message', 'Empleado creado con exito...');

	}

	public function search(Request $request) {

		$employeeSearch = \Request::get('employeeSearch');
		$employees = User::where('users.names', 'like', '%' . $employeeSearch . '%')
			->orwhere('users.last_name', 'like', '%' . $employeeSearch . '%')
			->orderBy('users.names')
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
		$employees = User::find($id);
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
		$employees = User::find($id);
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
		User::destroy($id);
		session::flash('message', 'Empleado eliminado correctamente...');
		return Redirect::to('/employees');
	}
}
