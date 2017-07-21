<?php

namespace App\Http\Controllers;

use App\Sections;
use App\Students;
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
        $sections = DB::table('classrooms')
            ->join('sections', function ($join) {
                $join->on('sections.classrooms_id', '=', 'classrooms.id')
                     ->where('sections.status', '=', 1);
            })
            ->join('subjects',function ($join){
                $join->on('sections.subjects_id','=','subjects.id');
            })
            ->get();
        
        return view('inscribed.inscribed' ,['sections' => $sections]);
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
        $section = Sections::find($id);
        $mathematics = 2;
        $spanish = 2;
        $institutional_orientation = 2;

        if($section['subjects_id'] == 1){
            $mathematics = 1;
        }else if($section['subjects_id'] == 2){
            $spanish = 1;
        }else if($section['subjects_id'] == 3){
            $institutional_orientation = 1;
        }

        $students = Students::where('spanish','=', $spanish)
                    ->Orwhere('mathematics','=', $mathematics)
                    ->Orwhere('institutional_orientation','=', $institutional_orientation)
                    ->get();
        
        return view('inscribed.inscribed_student', ['section'=> $section, 'students'=> $students]);
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
