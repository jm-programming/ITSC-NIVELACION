<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Support\Facades\DB;
use App\Inscribed;
use Illuminate\Support\Facades\Session;
class qualificationContoller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $seccionesProfesor =DB::table('sections')
		->select('sections.id',
		'sections.section',
		'sections.status',
		'sections.time_first',
		'sections.time_last',
		'classrooms.location',
		'sections.quota',
		'sections.shift',
		'sections.day_one',
		'sections.day_two',
		'sections.second_time_first',
		'sections.second_time_last',
		'subjects.subject',
		'subjects.code_subject',
		'users.names'
		)
		->join('subjects','sections.subjects_id', '=','subjects.id' )
		->join('classrooms','sections.classrooms_id', '=','classrooms.id' )
		->join('users','sections.users_id','=','users.id')
        ->where('sections.users_id','=',Auth::user()->id)
		->get();

        return view('qualifications.qualification',['sections' =>$seccionesProfesor]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $alumnos = DB::table('students')
        ->select(
        'students.id',
		'students.names',
		'students.last_name',
		'students.identity_card',
        'inscribed.first_midterm',
        'inscribed.second_midterm',
        'inscribed.pratice_score',
        'inscribed.final_exam',
        'inscribed.score'
		)
        ->join('inscribed','students.id', '=','inscribed.students_id' )
        ->join('sections','inscribed.sections_id', '=','sections.id')
        ->where('sections.id','=',$id)
        ->get();
        
        
      
        return view('qualifications.qualification_students',['alumnos' =>$alumnos, 'seccionID' => $id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $url = url()->full();
        $urlExplode = explode("?",$url);
        $studentID = $urlExplode[1];

        $alumno = DB::table('inscribed')
        ->select(
        'inscribed.id',
        'students.names',
        'students.last_name',
        'students.identity_card',
        'inscribed.first_midterm',
        'inscribed.second_midterm',
        'inscribed.pratice_score',
        'inscribed.final_exam',
        'inscribed.score')
        ->join('students','inscribed.students_id','students.id')
        ->join('sections','inscribed.sections_id','sections.id')
        ->where('inscribed.students_id','=',$studentID)
        ->where('sections.id','=',$id)
        ->get();

        
       
        return view('qualifications.qualification_notes',['alumno' =>$alumno[0]]);
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
      $seccionesProfesor =DB::table('sections')
		->select('sections.id',
		'sections.section',
		'sections.status',
		'sections.time_first',
		'sections.time_last',
		'classrooms.location',
		'sections.quota',
		'sections.shift',
		'sections.day_one',
		'sections.day_two',
		'sections.second_time_first',
		'sections.second_time_last',
		'subjects.subject',
		'subjects.code_subject',
		'users.names'
		)
		->join('subjects','sections.subjects_id', '=','subjects.id' )
		->join('classrooms','sections.classrooms_id', '=','classrooms.id' )
		->join('users','sections.users_id','=','users.id')
        ->where('sections.users_id','=',Auth::user()->id)
		->get();

        $alumnoInscrito = Inscribed::find($id);
        $alumnoInscrito->first_midterm = $request->input('first_midterm');
        $alumnoInscrito->second_midterm = $request->input('second_midterm');
        $alumnoInscrito->pratice_score = $request->input('pratice_score');
        $alumnoInscrito->final_exam = $request->input('final_exam');
        $alumnoInscrito->score = $request->input('score');
        $alumnoInscrito->save();

        session::flash('message', 'notas publicadas correctamente al estudiante '.$request->input('names'));
        return view('qualifications.qualification',['sections' =>$seccionesProfesor]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
