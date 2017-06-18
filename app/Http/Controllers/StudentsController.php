<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\validation\validator;
use App\Students;

class StudentsController extends Controller
{

     
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $studentsList = Students::all();

        return view('students.student', ['studentList' => $studentsList]);
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
            'identity_card' => 'required|alpha_num',
            'email' => 'email',
            'shift' => 'alpha|max:20',
        ]);

        if($validate){
            App\Students::create([
            
                'names'=> $request->input('names'),
                'last_name' => $request->input('last_name'),
                'career' => $request->input('career'),
                'birthday' => $request->input('birthday'),
                'identity_card' => $request->input('identity_card'),
                'email'=> $request->input('identity_card'),
                'shift'=> $request->input('shift'),

            ]);
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student = App\Students::find($id);
        return view('students.student', ['student' => $student]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = App\Students::find($id);
        return view('students.student',['student' => $student]);
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
            'names' => 'required|alpha|max:45',
            'last_name' => 'required|alpha|max:45',
            'career' => 'required|max:45',
            'birthday' => 'required|date',
            'identity_card' => 'required|alpha_num',
            'email' => 'email',
            'shift' => 'alpha|max:20',
        ]);

        App\Students::where('id', $id)
            ->update([
                'names'=> $request->input('names'),
                'last_name' => $request->input('last_name'),
                'career' => $request->input('career'),
                'birthday' => $request->input('birthday'),
                'identity_card' => $request->input('identity_card'),
                'email'=> $request->input('identity_card'),
                'shift'=> $request->input('shift'),
            ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = App\Students::find($id);

        $student->delete();
    }
}
