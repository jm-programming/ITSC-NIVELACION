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
        try{
        //hacer que los checkboxes que ya estan activos no se envien
        //hacer que los checkboxes que ya estaban activos y se desactivan eliminen la inscricion de esa seccion
        //choques de horario 
        //determinar si kiefer y matador son parajos.


        //obteniendo los datos de los select id
        $subject_selected = $request->input('subject_selected');
        //contando los objetos de los checkboxes
        $subjectCount = count($subject_selected);

        //obteniendo id de estudiante
        $id_student = $request->input('id_student');

        $matchedObjects = [];

            if($subjectCount > 0){
                
                $registerSections = DB::table('inscribed')
                ->join('students','inscribed.students_id','=','students.id')              
                ->where('students.id', '=', $id_student)
                ->get();

                $registerSectionsCount = count($registerSections);
                if($registerSectionsCount > 0){

                    for ($i=0; $i < $registerSectionsCount; $i++) { 
                                        
                        // $sections_all[$i] = DB::table('sections')
                        // ->select('sections.id',
                        //     'sections.day_one',
                        //     'sections.day_two',
                        //     'sections.time_first',
                        //     'sections.time_last',
                        //     'sections.second_time_first',
                        //     'sections.second_time_last',
                        //     'subjects.code_subject'
                        //     )
                        // ->join('subjects','sections.subjects_id','=','subjects.id')              
                        // ->where('sections.id', '=', $subject_selected[$i])
                        // ->get();

                        
                            if ($registerSections[$i]->sections_id == $subject_selected[$i]) {
                                    //dd($registerSections[$x]->sections_id );
                                  array_push($matchedObjects, $subject_selected[$i]);
                                
                            }
                        
                        
                }
                }

                $newSections = array_diff($subject_selected, $matchedObjects);
                
                sort($newSections); 

               for($j=0;$j<count($newSections);$j++){

                    Inscribed::create([
                            'sections_id'=> $newSections[$j],
                            'students_id' => $id_student,
                        ]);
                }
            
            }

        
        session::flash('message', 'Estudiante Inscrito correctamente...');

        return redirect('/students');
        }catch(\Exception $e) {
        session::flash('message', 'error inesperado');
        return redirect('/students');}
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

