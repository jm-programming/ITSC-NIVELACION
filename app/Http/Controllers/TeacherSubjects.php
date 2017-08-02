<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
class TeacherSubjects extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subjects = DB::table('subjects')
        ->get();
        return view('teachers.teacher_createSubject',['subjects'=>$subjects]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        dd('aqui se esta probando el registro de las materias a profesores
           falta hacer una validacion para que si esa asignatura ya esta
           asignada al profesor entonces la ignore y prosiga con las otras');
        for($x=0;$x<count($request->subject_selected);$x++){
            $subjects = new teachersubjects;
            $subjects->users_id = $user->id;
            $subjects->subjects_id = $request->subject_selected[$x];
            $subjects->save();
            }
            /*foreach ($sections_id[$i] as $sec) {

                $students_sec[$i] = DB::table('inscribed')
                ->where('inscribed.sections_id', '=', $sec->id)
                ->where('inscribed.students_id', '=', $id_student)
                ->get();

                if(count($students_sec[$i]) > 0  ){
                    session::flash('message', 'Estudiante ya esta Inscrito en esta asignatura...');
                    return redirect('/students/'.$id_student);
                }*/
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Subject = DB::table('teachersubjects')
        ->where('teachersubjects.id','=',$id);
        $Subject->delete();
        session::flash('message', 'se ha  eliminado la materia del profesor correctamente');
        return redirect('/teachers');
    }
}
