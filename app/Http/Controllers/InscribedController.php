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
        
        //hacer que los checkboxes que ya estan activos no se envien
        //hacer que los checkboxes que ya estaban activos y se desactivan eliminen la inscricion de esa seccion
        //choques de horario 
        //determinar si kiefer y matador son parajos.


        //obteniendo los datos de los select id y codigo asignatura
        $subject_selected = $request->input('subject_selected');
        //contando los objetos de los checkboxes
        $subjectCount = count($subject_selected);

        //obteniendo id de estudiante
        $id_student = $request->input('id_student');

        try {
            for ($i=0; $i < $subjectCount; $i++) { 
            //combirtiendo en array los elementos que estan divididos por un "."
            $sectionInfo = explode('.', $subject_selected[$i]);
            //query para obtener las inscriciones por asignatura
            $inscribedSections1[$i] = DB::table('inscribed')
                ->select('inscribed.id'
                    )
                ->join('sections','inscribed.sections_id','=','sections.id') 
                ->join('subjects','sections.subjects_id','=','subjects.id')               
                ->where('subjects.code_subject', '=', $sectionInfo[1])
                ->get();
                //query para obtener las inscriciones por secccion
            $inscribedSections2[$i] = DB::table('inscribed')
                ->select('inscribed.id'
                    )
                ->join('sections','inscribed.sections_id','=','sections.id') 
                ->join('subjects','sections.subjects_id','=','subjects.id')
                ->where('sections.id', '=', $sectionInfo[0])
                ->get();
            //eliminando arrays vacios para contarlo de manera correcta del query 1
            $trimed1 = array_map('trim', $inscribedSections1);
            $filted1 = array_filter($trimed1, function($value) { return $value !== '[]'; });
            $filtedCounted1 = count($filted1);
            //eliminando arrays vacios para contarlo de manera correcta del query 2
            $trimed2 = array_map('trim', $inscribedSections2);
            $filted2 = array_filter($trimed2, function($value) { return $value !== '[]'; });
            $filtedCounted2 = count($filted2);

            if( $filtedCounted1 > 0){
                    session::flash('message', 'Estudiante ya esta inscrito en esta asignatura.');
                    return redirect('/students/'.$id_student);
                }

            if( $filtedCounted2 > 0){
                    session::flash('message', 'Estudiante ya esta inscrito en esta sección.');
                    return redirect('/students/'.$id_student);
                }

            // foreach ($sections_id[$i] as $sec) {

            //     $students_sec[$i] = DB::table('inscribed')
            //     ->where('inscribed.sections_id', '=', $sec->id)
            //     ->where('inscribed.students_id', '=', $id_student)
            //     ->get();

            //     if(count($students_sec[$i]) > 0  ){
            //         session::flash('message', 'Estudiante ya esta Inscrito en esta asignatura...');
            //         return redirect('/students/'.$id_student);
            //     }
                //inscribiendo estudiantes
                Inscribed::create([
                    'sections_id'=> $sectionInfo[1],
                    'students_id' => $id_student,
                ]);
            
            // }
        }
        } catch (Exception $e) {
            dd($e);
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
