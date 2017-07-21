<?php

namespace App\Http\Controllers;

use App\Students;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class StudentsController extends Controller
{

     
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $studentsList = Students::orderBy('names', 'asc')->paginate(8);

        return view('students.student', ['studentsList' => $studentsList]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('students.students_create');
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
             'names' => 'required',
            'last_name' => 'required',
            'identity_card' => 'required',
            'civil_status' => 'required',
            'email' => 'email',
            'shift' => 'required',
         ]);

        Students::create([
        
            'names'=> $request->input('names'),
            'last_name' => $request->input('last_name'),
            'career' => $request->input('career'),
            'birthday' => $request->input('birthday'),
            'identity_card' => $request->input('identity_card'),
            'civil_status' => $request->input('civil_status'),
            'email' => $request->input('email'),
            'shift' => $request->input('shift'),
            'spanish'=> 1,
            'mathematics' => 1,
            'institutional_orientation' => 1,
            'debt' => 0,
            'inscribed_opportunity' => 0,
        ]);

        session::flash('message', 'Estudiante creado correctamente...');
        return redirect('/students');
    }


    public function search(Request $request){

        $studentSearch = \Request::get('studentSearch');
        $studentsList = Students::where('students.names', 'like', '%'.$studentSearch.'%')
        ->orwhere('students.last_name', 'like', '%'.$studentSearch.'%')
        ->orderBy('students.names')
        ->paginate(8);
        
        return view('students.student', ['studentsList' => $studentsList]);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
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
        $student = Students::find($id);
        return view('students.students_edit', ['student' => $student]);
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

        $this->validate($request, [
             'names' => 'required|max:45',
             'last_name' => 'required|max:45',
             'career' => 'required',
             'email' => 'email',
             'shift' => 'required',
             'identity_card' => 'required|min:13',
             'birthday' => 'before:today',
         ]);

        $student = Students::find($id);
        $student->fill($request->all());
        $student->save();

        session::flash('message', 'Estudiante editado correctamente...');

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

        Students::destroy($id);
        
        session::flash('message', 'Estudiante Eliminado correctamente...');
        return redirect('/students');
    }

}
