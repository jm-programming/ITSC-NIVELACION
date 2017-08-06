<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Language_quotes;
use App\Http\Requests\Languages_quotes_Request;
use Session;
Use Redirect;

class Language_quotesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $language = Language_quotes::orderBy('date','ASC')->paginate(8);
        return view('languages.index',['language' => $language]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $language = Language_quotes::all();
        return view('languages.create', ['languages' => $language]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Languages_quotes_Request $request)
    {
        Language_quotes::create([
            'language'=> $request['language'],
            'date' => $request['date'],
            'time' => $request['time'],
            'location' => $request['location'],

        ]);

        return redirect('/languages')->with('message', 'Cita creada con exito...');
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
        $languages = Language_quotes::find($id);
        return view('languages.edit', ['languages' => $languages]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Languages_quotes_Request $request, $id)
    {
        $languages = Language_quotes::find($id);
        $languages->fill($request->all());
        $languages->save();
        session::flash('message', 'Cita editada correctamente...');
        return Redirect::to('/languages');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Language_quotes::destroy($id);
        session::flash('message', 'Cita eliminada correctamente...');
        return Redirect::to('/languages');
    }
}
