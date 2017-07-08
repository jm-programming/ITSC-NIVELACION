<?php

namespace App\Http\Controllers;

use App\Students;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

		return view('home', ['query' => $query]);
	}

	public function search(Request $request) {

		$userType = $request->input('user');
		$data = \Request::get('query');

		if ($userType == 'Estudiante') {
			$query = Students::where('students.names', 'like', '%' . $data . '%')
				->orwhere('students.last_name', 'like', '%' . $data . '%')
				->orderBy('students.names', 'asc')
				->paginate(8);

			return view('students.student', ['studentsList' => $query]);

		} else if ($userType == 'Profesor') {

			$query = DB::table('users')
				->join('rolls', function ($join) {
					$join->on('users.rolls_id', '=', 'rolls.id');
				})
				->where([
					['users.status', '=', 1],
					['rolls.roll', '=', 'Profesor'],
					['users.names', 'like', '%' . $data . '%'],
				])
				->paginate(8);

			return view('teachers.teachers', ['teachersList' => $query]);

		} else {

			$query = DB::table('users')
				->where([
					['users.names', 'like', '%' . $data . '%'],
					['users.status', '=', 1],
					['users.rolls_id', '=', 3],
				])
				->paginate(8);

			return view('employees.employee', ['employees' => $query]);
		}
	}
}
