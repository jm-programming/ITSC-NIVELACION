<?php

namespace App\Http\Controllers;

use App\Sections;
use App\Students;
use App\Inscribed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class InscribedController extends Controller
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
        
        $section = $request->input('subject_selected');
        $id_student = $request->input('id_student');
        

        for ($i=0; $i < count($section); $i++) { 
            $sections_id[$i] = DB::table('subjects')
                ->join('sections','subjects.id','=','sections.subjects_id')               
                ->where('subjects.code_subject', '=', $section[$i])
                ->get();
            
            foreach ($sections_id[$i] as $sec) {

                $students_sec[$i] = DB::table('inscribed')
                ->where('inscribed.sections_id', '=', $sec->id)
                ->where('inscribed.students_id', '=', $id_student)
                ->get();

                if(count($students_sec[$i]) > 0  ){
                    session::flash('message', 'Estudiante ya esta Inscrito en esta asignatura...');
                    return redirect('/students/'.$id_student);
                }
                
                Inscribed::create([
                    'sections_id'=> $sec->id,
                    'students_id' => $id_student,
                ]);
            }
        }

        session::flash('message', 'Estudiante Inscrito correctamente...');

        return redirect('/students');

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
        //
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
        //
    }
}
