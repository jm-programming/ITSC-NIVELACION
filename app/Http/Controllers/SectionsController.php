<?php

namespace App\Http\Controllers;

use App\Academic_periods;
use App\Classrooms;
use App\Sections;
use App\Subjects;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SectionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $section = DB::table('sections')
            ->join('subjects', function ($join) {
                $join->on('sections.subjects_id', '=', 'subjects.id');
            })
            ->join('classrooms', function ($join) {
                $join->on('sections.classrooms_id', '=', 'classrooms.id');
            })
            ->paginate(8);

        return view('sections.section', ['sections' => $section]);
    }

    public function search(Request $request)
    {

        $sectionSearch = \Request::get('sectionSearch');
        $sections      = Sections::where('sections.section', 'like', '%' . $sectionSearch . '%')
            ->join('subjects', function ($join) {
                $join->on('sections.subjects_id', '=', 'subjects.id');
            })
            ->join('classrooms', function ($join) {
                $join->on('sections.classrooms_id', '=', 'classrooms.id');
            })
            ->paginate(8)
        ;

        return view('sections.section', ['sections' => $sections]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $classrooms       = Classrooms::all();
        $sections         = Sections::all();
        $academic_periods = Academic_periods::all();
        $subjects         = Subjects::all();
        $teachers         = DB::table('users')
            ->where([
                ['users.status', '=', 1],
                ['users.rolls_id', '=', 3],
            ])
            ->get();

use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;
use Validator;
use Spatie\Activitylog\Models\Activity;
use Auth;

class SectionsController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {

		$section = DB::table('sections')
			->join('subjects',function($join){
				$join->on('sections.subjects_id','=','subjects.id');
			})
			->join('classrooms',function($join){
				$join->on('sections.classrooms_id','=','classrooms.id')
				->orWhere('sections.classrooms_id', '=', NULL);
			})
			
			->paginate(8);

		return view('sections.section', ['sections' => $section]);
	}







	public function search(Request $request) {

		$sectionSearch = \Request::get('sectionSearch');
		$sections = Sections::where('sections.section', 'like', '%' . $sectionSearch . '%')
			->join('subjects',function($join){
				$join->on('sections.subjects_id','=','subjects.id');
			})
			->join('classrooms',function($join){
				$join->on('sections.classrooms_id','=','classrooms.id')
				->orWhere('sections.classrooms_id', '=', NULL);
			})
			->paginate(8);
		
		

		return view('sections.section', ['sections' => $sections]);
	}
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		$classrooms = Classrooms::all();
		$sections = Sections::all();
		$academic_periods = Academic_periods::all();
		$subjects = Subjects::all();
		$teachers = DB::table('users')
			->join('rolls', function($join){
				$join->on('users.rolls_id','=','rolls.id');
			})
			->where([
				['users.status','=',1],
				['rolls.roll','=','Profesor']
				])
			->get();
			
		return view('sections.section_create', ['section' => $sections, 'classroom' => $classrooms, 'academic_period' => $academic_periods, 'subject' => $subjects,'teacher'=> $teachers]);

	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
	
	/*para restarle 1 minuto a la hora introducida*/	
		 $timelast =$request->input('time_last');
		 $secondTimeLast = $request->input('second_time_last');
		 $timeToSubtract= 1;
		 
		 $timelastHourToSecond = strtotime($timelast);
		 $secondTimelastHourToSecond = strtotime($secondTimeLast);

		 $minutesToSubtract = $timeToSubtract*60;

		 $timeLastNewHour = date('H:i',$timelastHourToSecond-$minutesToSubtract);
		 $secondTimelastNewHour =date('H:i',$secondTimelastHourToSecond-$minutesToSubtract);
	/*********************************************************************************/
		 
	$query = 	['sections.status' =>$request->input('status'),
				  'sections.day_one'=>$request->input('day_one'),
				  'sections.time_first' =>$request->input('time_first'),
				  'sections.time_last' =>$timeLastNewHour,
				  'sections.classrooms_id'=>$request->input('classrooms_id'),
				  'sections.shift'=>$request->input('shift'),		  
				  ];
		
		$query2 = ['sections.status' =>$request->input('status'),
				  'sections.day_one'=>$request->input('day_one'),
				  'sections.day_two'=>$request->input('day_two'),
				  'sections.time_first' =>$request->input('time_first'),
				  'sections.time_last' =>$timeLastNewHour,
				  'sections.second_time_first' =>$request->input('second_time_first'),
				  'sections.second_time_last' => $secondTimelastNewHour,
				  'sections.classrooms_id'=>$request->input('classrooms_id'),
				  'sections.shift'=>$request->input('shift'),	  


        return view('sections.section_create', ['section' => $sections, 'classroom' => $classrooms, 'academic_period' => $academic_periods, 'subject' => $subjects, 'teacher' => $teachers]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*para restarle 10 minutos a la hora introducida*/
        $timelast       = $request->input('time_last');
        $secondTimeLast = $request->input('second_time_last');
        $timeToSubtract = 10;

        $timelastHourToSecond       = strtotime($timelast);
        $secondTimelastHourToSecond = strtotime($secondTimeLast);

        $minutesToSubtract = $timeToSubtract * 60;

        $timeLastNewHour       = date('H:i', $timelastHourToSecond - $minutesToSubtract);
        $secondTimelastNewHour = date('H:i', $secondTimelastHourToSecond - $minutesToSubtract);
        /*********************************************************************************/

        $query = ['sections.status' => $request->input('status'),
            'sections.day_one'          => $request->input('day_one'),
            'sections.time_first'       => $request->input('time_first'),
            'sections.time_last'        => $timeLastNewHour,
            'sections.classrooms_id'    => $request->input('classrooms_id'),
            'sections.shift'            => $request->input('shift'),
        ];

        $query2 = ['sections.status' => $request->input('status'),
            'sections.day_one'           => $request->input('day_one'),
            'sections.day_two'           => $request->input('day_two'),
            'sections.time_first'        => $request->input('time_first'),
            'sections.time_last'         => $timeLastNewHour,
            'sections.second_time_first' => $request->input('second_time_first'),
            'sections.second_time_last'  => $secondTimelastNewHour,
            'sections.classrooms_id'     => $request->input('classrooms_id'),
            'sections.shift'             => $request->input('shift'),
        ];

   
		$query3 = [

			'sections.classrooms_id' => $request->input('classrooms_id'),
			'sections.shift' => $request->input('shift'),
		];

		if (!empty($request->input('day_two'))) {

				'sections.classrooms_id'=>$request->input('classrooms_id'),
				'sections.shift'=>$request->input('shift'),
				'sections.day_one'=>$request->input('day_one'),
				'academic_periods_id' => $request->input('academic_periods_id')
		];

		$query4 = [
				'sections.classrooms_id'=>$request->input('classrooms_id'),
				'sections.shift'=>$request->input('shift'),
				'sections.day_two'=>$request->input('day_two'),
				'academic_periods_id' => $request->input('academic_periods_id')
		];


	if(!empty($request->input('day_two'))){

			$Section = Sections::where($query2)
			->get();

	if(!empty($request->input('day_two'))){

			$Section = Sections::where($query2)
				->get();

			$Section2 = Sections::whereBetween('sections.time_first', [$request->input('time_first'), $timeLastNewHour])
				->whereBetween('sections.time_last', [$request->input('time_first'), $timeLastNewHour])
				->where($query3)
				->orwhereBetween('sections.second_time_first', [$request->input('second_time_first'), $secondTimelastNewHour])
				->whereBetween('sections.second_time_last', [$request->input('second_time_first'), $secondTimelastNewHour])
				->where($query3)

			if (count($Section) > 0) {

			$Section2 = Sections::whereBetween('sections.time_first',[$request->input('time_first'),$timeLastNewHour])
			->where($query3)
			->orwhereBetween('sections.time_last',[$request->input('time_first'),$timeLastNewHour])
			->where($query3)
			->orwhereBetween('sections.second_time_first',[$request->input('second_time_first'), $secondTimelastNewHour])
			->where($query4)
			->orwhereBetween('sections.second_time_last',[$request->input('second_time_first'), $secondTimelastNewHour])
			->where($query4)
			->get();



			if(count($Section) > 0){
				session::flash('message', 'la seccion que intenta crear ya existe');
				return redirect()->back()->withInput($request->all);

				
	if(count($Section) > 0){

				 $v = Validator::make($request->all(), [
        		'some_non_existent_field' => 'required',
    			]);

			if ($v->fails())
    		{
			session::flash('message', 'hay un choque entre las secciones');
        	 return redirect('/sections/create')
                        ->withInput();
    		}			
	}
    elseif(count($Section2) > 0){

		$v = Validator::make($request->all(), [
        		'some_non_existent_field' => 'required',
    			]);

		if ($v->fails())
    		{
			session::flash('message', 'las horas chocan con otra seccion');
        	 return redirect('/sections/create')
                        ->withInput();
    		}
		}



			if (count($Section2) > 0) {
				session::flash('message', 'las horas introducidas estan ocupadas por otra seccion');
				return redirect("/sections/create");
			} else {

				$this->validate($request, [
					'users_id' => 'required',
					'shift' => 'required',
					'classrooms_id' => 'required',
					'day_one' => 'required',
					'academic_periods_id' => 'required',
					'time_first' => 'required',
					'subjects_id' => 'required',
					'time_last' => 'required',
					'section' => 'required',
					'quota' => 'required',
					'second_time_first' => 'required',
					'second_time_last' => 'required',
				]);
				Sections::create([

					'shift' => $request->input('shift'),
					'classrooms_id' => $request->input('classrooms_id'),
					'day_one' => $request->input('day_one'),
					'day_two' => $request->input('day_two'),
					'academic_periods_id' => $request->input('academic_periods_id'),
					'time_first' => $request->input('time_first'),
					'subjects_id' => $request->input('subjects_id'),
					'time_last' => $timeLastNewHour,
					'section' => $request->input('section'),
					'quota' => $request->input('quota'),
					'status' => $request->input('status'),
					'users_id' => $request->input('users_id'),
					'second_time_first' => $request->input('second_time_first'),
					'second_time_last' => $secondTimelastNewHour,

				]);

				session::flash('message', 'Sección creado correctamente...');
				return redirect("/sections");
			}

			if(count($Section2)> 0){
			session::flash('message', 'las horas introducidas estan ocupadas por otra seccion');

				return redirect()
				->back()
				->withInput();

				return redirect()->back()->withInput($request->all);

		}

		if (empty($request->input('day_two'))) {

			$Section = Sections::where($query)
				->get();

else{

			$this->validate($request, [
			'users_id' => 'required',
			'shift' => 'required',
			'day_one' => 'required',
			'academic_periods_id' => 'required',
			'time_first' => 'required',
			'subjects_id' => 'required',
			'time_last' => 'required',
			'section' => 'required|unique:sections|max:255',
			'quota' => 'required',
			'second_time_first'=> 'required',
			'second_time_last'=> 'required'
			]);
			Sections::create([
			
			'shift' => $request->input('shift'),
			'classrooms_id' => $request->input('classrooms_id'),
			'day_one' => $request->input('day_one'),
			'day_two' => $request->input('day_two'),
			'academic_periods_id' => $request->input('academic_periods_id'),
			'time_first' => $request->input('time_first'),
			'subjects_id' => $request->input('subjects_id'),
			'time_last' =>$timeLastNewHour,
			'section' => $request->input('section'),
			'quota' => $request->input('quota'),
			'status' => $request->input('status'),
			'users_id' => $request->input('users_id'),
			'second_time_first'=> $request->input('second_time_first'),
			'second_time_last'=>$secondTimelastNewHour,
					  
		]);

			/*$userModel = Auth::user();
            $someContentModel = $seccion;
            activity('Seccion')
            ->causedBy($userModel)
            ->performedOn($someContentModel)
            ->log('Crear');
            
            $lastLoggedActivity = Activity::all()->last();
            $lastLoggedActivity->subject; //returns an instance of an eloquent model
            $lastLoggedActivity->causer; //returns an instance of your user model
            $lastLoggedActivity->description; //returns 'Look, I logged something'
            $lastLoggedActivity->log_name;*/

		session::flash('message', 'Sección creado correctamente...');
		return redirect("/sections");
		}


			$Section2 = Sections::whereBetween('sections.time_first', [$request->input('time_first'), $timeLastNewHour])
				->whereBetween('sections.time_last', [$request->input('time_first'), $timeLastNewHour])
				->where($query3)
				->orwhereBetween('sections.second_time_first', [$request->input('time_first'), $timeLastNewHour])
				->whereBetween('sections.second_time_last', [$request->input('time_first'), $timeLastNewHour])
				->where($query3)
				->get();


			if (count($Section) > 0) {

		 if(empty($request->input('day_two')))
		 {
		/*
		si el campo dia 2 llega vacio , buscar una seccion donde el 
		estado,dia uno, hora de llegada, hora de salida, id del aula y la tanda
		sean iguales a los introducidos en el formulario , esto lo hace el query,
		el query2 hace lo mismo pero con los campos de la segunda hora de llegada
		y segunda hora de salida sean iguales a los campos de primera hora de llegada
		y segunda hora de llegada. 
		*/
		
		$query = ['sections.status' =>$request->input('status'),
				  'sections.day_one'=>$request->input('day_one'),
				  'sections.time_first' =>$request->input('time_first'),
				  'sections.time_last' =>$timeLastNewHour,
				  'sections.classrooms_id'=>$request->input('classrooms_id'),
				  'sections.shift'=>$request->input('shift'),
				  'academic_periods_id' => $request->input('academic_periods_id')		  
				  ];
		
		$query2 = ['sections.status' =>$request->input('status'),
				  'sections.day_one'=>$request->input('day_one'),
				  'sections.second_time_first' =>$request->input('time_first'),
				  'sections.second_time_last' => $timeLastNewHour,
				  'sections.classrooms_id'=>$request->input('classrooms_id'),
				  'sections.shift'=>$request->input('shift'),
				  'academic_periods_id' => $request->input('academic_periods_id')		  
				  ];

		$query3 = [
				'sections.classrooms_id'=>$request->input('classrooms_id'),
				'sections.shift'=>$request->input('shift'),
				'sections.day_one'=>$request->input('day_one'),
				'academic_periods_id' => $request->input('academic_periods_id')
		];
			
						  


		 $Section = Sections::where($query)
		 ->orwhere($query2)
			->get();



		$Section2 = Sections::whereBetween('sections.time_first',[$request->input('time_first'),$timeLastNewHour])
			->where($query3)
			->orwhereBetween('sections.time_last',[$request->input('time_first'),$timeLastNewHour])
			->where($query3)
			->orwhereBetween('sections.second_time_first',[$request->input('time_first'),$timeLastNewHour])
			->where($query3)
			->orwhereBetween('sections.second_time_last',[$request->input('time_first'),$timeLastNewHour])
			->where($query3)
			->get();


	if(count($Section) > 0){

			if(count($Section) > 0){

				session::flash('message', 'la seccion que intenta crear ya existe');

				return redirect("/sections/create");
			} elseif (count($Section2) > 0) {
				session::flash('message', 'las horas introducidas estan ocupadas por otra seccion');
				return redirect("/sections/create");
			} else {
				$this->validate($request, [
					'users_id' => 'required',
					'shift' => 'required',
					'classrooms_id' => 'required',
					'day_one' => 'required',
					'academic_periods_id' => 'required',
					'time_first' => 'required',
					'subjects_id' => 'required',
					'time_last' => 'required',
					'section' => 'required',
					'quota' => 'required',
				]);

				Sections::create([

					'shift' => $request->input('shift'),
					'classrooms_id' => $request->input('classrooms_id'),
					'day_one' => $request->input('day_one'),
					'day_two' => $request->input('day_two'),
					'academic_periods_id' => $request->input('academic_periods_id'),
					'time_first' => $request->input('time_first'),
					'subjects_id' => $request->input('subjects_id'),
					'time_last' => $timeLastNewHour,
					'section' => $request->input('section'),
					'quota' => $request->input('quota'),
					'status' => $request->input('status'),
					'users_id' => $request->input('users_id'),
					'second_time_first' => $request->input('second_time_first'),
					'second_time_last' => $request->input('second_time_last'),

				]);

				session::flash('message', 'Sección creado correctamente...');
				return redirect("/sections");
			}

				return redirect("/sections/create")->withInput($request->input());

			}
			elseif(count($Section2) > 0){
				session::flash('message', 'las horas introducidas estan ocupadas por otra seccion');
				return redirect("/sections/create")->withInput($request->input());
				return redirect()->back()->withInput($request->all);
				
			}
			elseif(count($Section2) > 0){
				session::flash('message', 'las horas introducidas estan ocupadas por otra seccion');
				return redirect()->back()->withInput($request->all);

		}

				 $v = Validator::make($request->all(), [
        		'some_non_existent_field' => 'required',
    			]);

			if ($v->fails())
    		{
			session::flash('message', 'hay un choque entre las secciones');
        	 return redirect('/sections/create')
                        ->withInput();
    		}
				
	}

	elseif(count($Section2) > 0){

		$v = Validator::make($request->all(), [
        		'some_non_existent_field' => 'required',
    			]);

		if ($v->fails())
    		{
			session::flash('message', 'las horas chocan con otra seccion');
        	 return redirect('/sections/create')
                        ->withInput();
    		}
		}

else{
			
	$this->validate($request, [
			'users_id' => 'required',
			'shift' => 'required',
			'day_one' => 'required',
			'academic_periods_id' => 'required',
			'time_first' => 'required',
			'subjects_id' => 'required',
			'time_last' => 'required',
			'section' => 'required|unique:sections|max:255',
			'quota' => 'required',
			]);

		
		
		
		Sections::create([
			
			'shift' => $request->input('shift'),
			'classrooms_id' => $request->input('classrooms_id'),
			'day_one' => $request->input('day_one'),
			'day_two' => $request->input('day_two'),
			'academic_periods_id' => $request->input('academic_periods_id'),
			'time_first' => $request->input('time_first'),
			'subjects_id' => $request->input('subjects_id'),
			'time_last' =>$timeLastNewHour,
			'section' => $request->input('section'),
			'quota' => $request->input('quota'),
			'status' => $request->input('status'),
			'users_id' => $request->input('users_id'),
			'second_time_first'=> $request->input('second_time_first'),
			'second_time_last'=>$request->input('second_time_last'),
			
					
		]);

		session::flash('message', 'Sección creado correctamente...');
		return redirect("/sections");
		}
	  }

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id) {
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) {
		$classrooms = Classrooms::all();
		$academic_periods = Academic_periods::all();
		$subjects = Subjects::all();
		$section = Sections::find($id);
		$teachers = $teachers = DB::table('users')
			->join('rolls', function ($join) {
				$join->on('users.rolls_id', '=', 'rolls.id');
			})
			->where([
				['users.status', '=', 1],
				['rolls.roll', '=', 'Profesor'],
			])
			->get();

		$sectionsTeacher = DB::table('sections')->where('sections.id', "=", $id)
			->join('users', 'sections.users_id', '=', 'users.id')
			->get();
		$sectionsSubject = DB::table('sections')->where('sections.id', "=", $id)
			->join('subjects', 'sections.subjects_id', '=', 'subjects.id')
			->get();
		$sectionsAcademic_period = DB::table('academic_periods')->where('sections.id', "=", $id)
			->join('sections', 'sections.academic_periods_id', '=', 'academic_periods.id')
			->get();
		$sectionsClassrooms = DB::table('classrooms')->where('sections.id', "=", $id)
			->join('sections', 'sections.classrooms_id', '=', 'classrooms.id')
			->get();

		return view('sections.section_edit', [
			'section' => $section,
			'classroom' => $classrooms,
			'academic_period' => $academic_periods,
			'subject' => $subjects,
			'teacher' => $teachers,

			'sectionsTeacher' => $sectionsTeacher,
			'sectionsSubject' => $sectionsSubject,
			'sectionsAcademic_period' => $sectionsAcademic_period,
			'sectionsClassrooms' => $sectionsClassrooms,
		]);

			'sectionsTeacher' => $sectionsTeacher, 
			'sectionsSubject' => $sectionsSubject, 
			'sectionsAcademic_period' => $sectionsAcademic_period, 
			'sectionsClassrooms' => $sectionsClassrooms, 
			]);
		


	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */


		$this->validate($request, [

		/*para restarle 10 minutos a la hora introducida*/	
		 $timelast =$request->input('time_last');
		 $secondTimeLast = $request->input('second_time_last');
		 $timeToSubtract= 1;
		 
		 $timelastHourToSecond = strtotime($timelast);
		 $secondTimelastHourToSecond = strtotime($secondTimeLast);

		 $minutesToSubtract = $timeToSubtract*60;

		 $timeLastNewHour = date('H:i',$timelastHourToSecond-$minutesToSubtract);
		 $secondTimelastNewHour =date('H:i',$secondTimelastHourToSecond-$minutesToSubtract);
	/*********************************************************************************/
		 
		 

		$query3 = [
				'sections.classrooms_id'=>$request->input('classrooms_id'),
				'sections.shift'=>$request->input('shift'),
				'sections.day_one'=>$request->input('day_one'),
				'academic_periods_id' => $request->input('academic_periods_id')
		];

		$query4 = [
				'sections.classrooms_id'=>$request->input('classrooms_id'),
				'sections.shift'=>$request->input('shift'),
				'sections.day_two'=>$request->input('day_two'),
				'academic_periods_id' => $request->input('academic_periods_id')
		];
		
	
	
	if(!empty($request->input('day_two'))){

			$Section2 = Sections::whereBetween('sections.time_first',[$request->input('time_first'),$timeLastNewHour])
			->where($query3)
			->orwhereBetween('sections.time_last',[$request->input('time_first'),$timeLastNewHour])
			->where($query3)
			->orwhereBetween('sections.second_time_first',[$request->input('second_time_first'), $secondTimelastNewHour])
			->where($query4)
			->orwhereBetween('sections.second_time_last',[$request->input('second_time_first'), $secondTimelastNewHour])
			->where($query4)
			->get();


				
			
			if(count($Section2)> 0){
			session::flash('message', 'las horas introducidas estan ocupadas por otra seccion');
			return 'resolver aqui';
				// return redirect()->back()->withInput($request->all);
		}
		else{

			$this->validate($request, [

			'users_id' => 'required',
			'shift' => 'required',
			'classrooms_id' => 'required',
			'day_one' => 'required',
			'academic_periods_id' => 'required',
			'time_first' => 'required',
			'subjects_id' => 'required',
			'time_last' => 'required',
			'section' => 'required|unique:sections,section',
			'quota' => 'required',
			'second_time_first'=> 'required',
			'second_time_last'=> 'required'
			]);
			
			$section = Sections::find($id);

			$section->fill($request->all());

			$section->save();

		session::flash('message', 'Sección creado correctamente...');
		return redirect("/sections");
		}
		}








		 
		 
		 
		 if(empty($request->input('day_two')))
		 {


		 $query3 = [
				'sections.classrooms_id'=>$request->input('classrooms_id'),
				'sections.shift'=>$request->input('shift'),
				'sections.day_one'=>$request->input('day_one'),
				'academic_periods_id' => $request->input('academic_periods_id')
		];
			
						  


		$Section2 = Sections::whereBetween('sections.time_first',[$request->input('time_first'),$timeLastNewHour])
			->where($query3)
			->orwhereBetween('sections.time_last',[$request->input('time_first'),$timeLastNewHour])
			->where($query3)
			->orwhereBetween('sections.second_time_first',[$request->input('time_first'),$timeLastNewHour])
			->where($query3)
			->orwhereBetween('sections.second_time_last',[$request->input('time_first'),$timeLastNewHour])
			->where($query3)
			->get();
	


			if(count($Section2) > 0){
				session::flash('message', 'las horas introducidas estan ocupadas por otra seccion');
				return redirect()->back()->withInput($request->all);
		}
		else{
			$this->validate($request, [
			'users_id' => 'required',
			'shift' => 'required',
			'classrooms_id' => 'required',
			'day_one' => 'required',
			'academic_periods_id' => 'required',
			'time_first' => 'required',
			'subjects_id' => 'required',
			'time_last' => 'required',
			'section' => 'required|unique:sections,section',
			'quota' => 'required',
			]);

		
		$section = Sections::find($id);

		$section->fill($request->all());

		$section->save();
		

		session::flash('message', 'Sección Editada correctamente...');
		return redirect("/sections");
		}
	  }

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		
		$section = Sections::find($id);
		$section->delete();

		session::flash('message', 'Sección eliminada correctamente...');
		return redirect('/sections');
	}
}
