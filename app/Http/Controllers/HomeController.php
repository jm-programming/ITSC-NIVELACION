<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use App\Students;
class HomeController extends Controller {
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct() {
		$this->middleware('auth');
	}

	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {

		$query = User::orderBy('names', 'asc')
        ->paginate(8);

		return view('home',['query' => $query]);
	}




	public function search(Request $request){

        $data = \Request::get('query');
        $query = Students::where('students.names', 'like', '%'.$data.'%')
        ->orwhere('students.last_name', 'like', '%'.$data.'%')
        ->orderBy('students.names')
        ->paginate(8);
        
        return view('home', ['query' => $query]);
    }
}
