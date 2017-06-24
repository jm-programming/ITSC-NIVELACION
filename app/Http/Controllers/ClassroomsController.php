<?php

namespace App\Http\Controllers;

use App\Classrooms;
use App\Http\Controllers\Controller;
use App\Http\Requests\ClassroomRequest;
use Illuminate\Http\Request;
use Redirect;
use Session;

class ClassroomsController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$classrooms = Classrooms::paginate(8);
		return view('classrooms.classroom', ['classrooms' => $classrooms]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		return view('classrooms.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(ClassroomRequest $request) {

		Classrooms::create([
			'location' => $request['location'],
		]);
		return redirect('/classrooms')->with('message', 'Aula creada con exito...');
	}

	public function search(Request $request) {

		$classroomSearch = \Request::get('classroomSearch');
		$classrooms = Classrooms::where('classrooms.location', 'like', '%' . $classroomSearch . '%')
			->orderBy('classrooms.location')
			->paginate(8);

		return view('classrooms.classroom', ['classrooms' => $classrooms]);
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
		$classrooms = Classrooms::find($id);
		return view('classrooms.edit_classroom', ['classrooms' => $classrooms]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(ClassroomRequest $request, $id) {
		$classrooms = Classrooms::find($id);
		$classrooms->fill($request->all());
		$classrooms->save();
		session::flash('message', 'Aula editada correctamente...');
		return Redirect::to('/classrooms');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		Classrooms::destroy($id);
		session::flash('message', 'Aula eliminada correctamente...');
		return Redirect::to('/classrooms');
	}
}
