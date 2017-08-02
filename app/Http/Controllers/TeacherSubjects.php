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
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $subjects = DB::table('subjects')
        ->get();
        return view('teachers.teacher_createSubject',['subjects'=>$subjects,'id' => $id]);
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
        $subjectsRegistered = DB::table('teachersubjects')
            ->where('teachersubjects.users_id','=',$id)
            ->get();
        $sameSubject = [];    

        if(count($request->subject_selected) > 0){   
        for($x=0;$x<count($subjectsRegistered);$x++){
            
            for($y=0;$y<count($request->subject_selected);$y++){
            if($subjectsRegistered[$x]->subjects_id == $request->subject_selected[$y]){
                
                array_push($sameSubject,$request->subject_selected[$y]);
                }
            }
            }
            $newSubjects = array_diff($request->subject_selected, $sameSubject);
            sort($newSubjects);
            for($x=0;$x<count($newSubjects);$x++){
            /*$subjects = new teachersubjects;
            $subjects->users_id = $id;
            $subjects->subjects_id = $newSubjects[$x];
            $subjects->save();*/
            DB::table('teachersubjects')->insert(
            ['users_id' => $id, 
            'subjects_id' => $newSubjects[$x]]
            );
            }
            session::flash('message', 'Materias registradas...');
            return redirect('/teachers/'.$id);
            }
            else{
            session::flash('message', 'no se han hecho cambios...');
            return redirect('/teachers/'.$id); 
            }
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
