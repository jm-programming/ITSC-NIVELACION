<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\validation\validator;
use App\Students;
use Illuminate\Support\Facades\DB;

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
        $validate = $this->validate($request, [
            'names' => 'required|alpha|max:45',
            'last_name' => 'required|alpha|max:45',
            'career' => 'required|max:45',
            'birthday' => 'required|date',
            'identity_card' => 'required|max:14',
            'email' => 'unique:email',
            'shift' => 'alpha|max:20',
        ]);
            Students::create([
            
                'names'=> $request->input('names'),
                'last_name' => $request->input('last_name'),
                'career' => $request->input('career'),
                'birthday' => $request->input('birthday'),
                'identity_card' => $request->input('identity_card'),
                'civil_status' => $request->input('civil_status'),
                'email'=> $request->input('email'),
                'shift'=> $request->input('shift'),
                'condition'=> $request->input('condition'),
                'debt'=> 0,
                'inscribed_opportunity'=> 0,
            ]);

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
        $student = Students::find($id);
        $student->fill($request->all());
        $student->save();

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
        return redirect('/students');
    }
}
