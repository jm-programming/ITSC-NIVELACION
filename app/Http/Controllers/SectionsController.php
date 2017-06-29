<?php

namespace App\Http\Controllers;

use App\Academic_periods;
use App\Classrooms;
use App\Sections;
use App\Subjects;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class SectionsController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {

		$section = DB::table('sections')
			->paginate(8);

		return view('sections.section', ['sections' => $section]);
	}

	public function search(Request $request) {

		$sectionSearch = \Request::get('sectionSearch');
		$sections = Sections::where('sections.section', 'like', '%' . $sectionSearch . '%')
			->paginate(8);

		return view('sections.section', ['sections' => $sections]);
	}
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		$classrooms = Classrooms::all();
		$sections = Sections::all();
		$academic_periods = Academic_periods::all();
		$subjects = Subjects::all();
		$teachers = DB::table('users')
			->join('rolls', function($join){
				$join->on('users.rolls_id','=','rolls.id');
			})
			->where([
				['users.status','=',1],
				['rolls.roll','=','Profesor']
				])
			->get();
			
		return view('sections.section_create', ['section' => $sections, 'classroom' => $classrooms, 'academic_period' => $academic_periods, 'subject' => $subjects,'teacher'=> $teachers]);

	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		$this->validate($request, [
			'users_id' => 'required',
			'shift' => 'required',
			'classrooms_id' => 'required',
			'day_one' => 'required',
			'academic_periods_id' => 'required',
			'time_first' => 'required',
			'subjects_id' => 'required',
			'time_last' => 'required',
			'section' => 'required',
			'quota' => 'required',
		]);

		Sections::create([
			
			'shift' => $request->input('shift'),
			'classrooms_id' => $request->input('classrooms_id'),
			'day_one' => $request->input('day_one'),
			'day_two' => $request->input('day_two'),
			'academic_periods_id' => $request->input('academic_periods_id'),
			'time_first' => $request->input('time_first'),
			'subjects_id' => $request->input('subjects_id'),
			'time_last' => $request->input('time_last'),
			'section' => $request->input('section'),
			'quota' => $request->input('quota'),
			'status' => $request->input('status'),
			'users_id' => $request->input('users_id'),

		]);

		session::flash('message', 'Sección creado correctamente...');
		return redirect("/sections");
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
		$classrooms = Classrooms::all();
		$academic_periods = Academic_periods::all();
		$subjects = Subjects::all();
		$section = Sections::find($id);
		$teachers = $teachers = DB::table('users')
			->join('rolls', function($join){
				$join->on('users.rolls_id','=','rolls.id');
			})
			->where([
				['users.status','=',1],
				['rolls.roll','=','Profesor']
				])
			->get();

		$sectionsTeacher = DB::table('sections')->where('sections.id',"=",$id)
			->join('users', 'sections.users_id','=','users.id')
			->get();
		$sectionsSubject = DB::table('sections')->where('sections.id',"=",$id)
			->join('subjects', 'sections.subjects_id','=','subjects.id')
			->get();
		$sectionsAcademic_period = DB::table('academic_periods')->where('sections.id',"=",$id)
			->join('sections', 'sections.academic_periods_id','=','academic_periods.id')
			->get();
		$sectionsClassrooms = DB::table('classrooms')->where('sections.id',"=",$id)
			->join('sections', 'sections.classrooms_id','=','classrooms.id')
			->get();

		
		return view('sections.section_edit', [
			'section' => $section,
			'classroom' => $classrooms, 
			'academic_period' => $academic_periods, 
			'subject' => $subjects, 
			'teacher' => $teachers,
			'sectionsTeacher' => $sectionsTeacher, 
			'sectionsSubject' => $sectionsSubject, 
			'sectionsAcademic_period' => $sectionsAcademic_period, 
			'sectionsClassrooms' => $sectionsClassrooms, 
			]);

		

	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id) {
		
		$this->validate($request, [
			'users_id' => 'required',
			'shift' => 'required',
			'classrooms_id' => 'required',
			'day_one' => 'required',
			'academic_periods_id' => 'required',
			'time_first' => 'required',
			'subjects_id' => 'required',
			'time_last' => 'required',
			'section' => 'required',
			'quota' => 'required',
		]);

		$section = Sections::find($id);
		$section->fill($request->all());
		$section->save();

		session::flash('message', 'Sección editada correctamente...');
		return redirect('/students');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		$section = Sections::find($id);
		$section->delete();

		session::flash('message', 'Sección eliminada correctamente...');
		return redirect('/sections');
	}
}
