<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Subjects;
use Session;
use Redirect;
use App\Http\Requests\create_subjects_Request;
use App\Http\Requests\edit_subjects_Request;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subjects = Subjects::paginate(3);
        return view('subjects.index', ['subject'=>$subjects]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subjects = Subjects::all();
        return view('subjects.create', ['subject'=>$subjects]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(create_subjects_Request $request)
    {
         Subjects::create([
            'code_subject' => $request['code_subject'],
            'subject' => $request['subject'],
            'credits' => $request['credits'],      

        ]);

        return redirect('/subjects')->with('message', 'Materia creada con exito...');
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
        $subjects = Subjects::find($id);
        return view('subjects.edit', ['subjects'=>$subjects]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(edit_subjects_Request $request, $id)
    {
        $subjects = Subjects::find($id);
        $subjects->fill($request->all());
        $subjects->save();
        session::flash('message', 'Materia editada correctamente...');
        return Redirect::to('/subjects');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Subjects::destroy($id);
        session::flash('message', 'Materia eliminada correctamente...');
        return Redirect::to('/subjects');
    }
}
