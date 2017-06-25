<?php

namespace App\Http\Controllers;

use App\Students;
use Illuminate\Http\Request;

class StudentsController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$studentsList = Students::orderBy('names', 'asc')->paginate(8);

		return view('students.student', ['studentsList' => $studentsList]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		return view('students.students_create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		$this->validate($request, [
			'names' => 'required|max:45',
			'last_name' => 'required|max:45',
			'career' => 'required',
			'email' => 'email|unique:Students',
			'shift' => 'required',
			'identity_card' => 'required',
			'condition' => 'required',
		]);
		Students::create([

			'names' => $request->input('names'),
			'last_name' => $request->input('last_name'),
			'career' => $request->input('career'),
			'birthday' => $request->input('birthday'),
			'identity_card' => $request->input('identity_card'),
			'civil_status' => $request->input('civil_status'),
			'email' => $request->input('email'),
			'shift' => $request->input('shift'),
			'condition' => $request->input('condition'),
			'debt' => 0,
			'inscribed_opportunity' => 0,
		]);

		return redirect('/students');
	}

	public function search(Request $request) {

		$studentSearch = \Request::get('studentSearch');
		$studentsList = Students::where('students.names', 'like', '%' . $studentSearch . '%')
			->orwhere('students.last_name', 'like', '%' . $studentSearch . '%')
			->orderBy('students.names')
			->paginate(8);

		return view('students.student', ['studentsList' => $studentsList]);
	}
	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show(Request $request) {

	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) {
		$student = Students::find($id);
		return view('students.students_edit', ['student' => $student]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id) {
		$student = Students::find($id);
		$student->fill($request->all());
		$student->save();

		return redirect('/students');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {

		Students::destroy($id);
		return redirect('/students');
	}
}
