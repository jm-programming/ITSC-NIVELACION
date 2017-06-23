<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sections;
use App\Classrooms;
use App\Subjects;
use App\Teachers;
use App\Academic_periods;
use Illuminate\Support\Facades\DB;

class SectionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $section = DB::table('sections')
            ->paginate(8);

        return view('sections.section', ['sections' => $section]);
    }

    public function search(Request $request){

        $sectionSearch = \Request::get('sectionSearch');
        $sections = Sections::where('sections.section', 'like', '%'.$sectionSearch.'%')
            ->paginate(8);
        
        return view('sections.section', ['sections' => $sections]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $classrooms = Classrooms::all();
        $sections = Sections::all();
        $academic_periods = Academic_periods::all();
        $subjects = Subjects::all();
        $teachers = Teachers::all();

        return view('sections.section_create', ['section' => $sections, 'classroom' => $classrooms, 'academic_period' => $academic_periods, 'subject' => $subjects, 'teacher' => $teachers]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'teachers_id' => 'required',
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
            'teachers_id' => $request->input('teachers_id'),
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

            ]);
        return redirect("/sections");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $classrooms = Classrooms::all();
        $academic_periods = Academic_periods::all();
        $subjects = Subjects::all();
        $teachers = Teachers::all();
        $sections = Sections::find($id);
        
        return view('sections.section_edit', ['section' => $sections, 'classroom' => $classrooms, 'academic_period' => $academic_periods, 'subject' => $subjects, 'teacher' => $teachers]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $section = Sections::find($id);
        $section->fill($request->all());
        $section->save();

        return redirect('/students');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $section = Sections::find($id);
        $section->delete();

        return redirect('/sections');
    }
}
