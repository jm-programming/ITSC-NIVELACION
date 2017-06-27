<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use DB;
class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    

    /*se crea una variable teacherlist la cual llamara al modelo y ordenara los 
        datos que reciba de forma ascendente por el nombre y los paginara de a 8 en
        una tabla*/
        
    public function index()
    {

        $teachersList = User::orderBy('names', 'asc')
        ->where('users.rolls_id', '=' , 2)
        ->paginate(8);

        return view('teachers.teachers', ['teachersList' => $teachersList]);
    }


    
    /*se pasa el parametro request a la funcion,se almacena una peticion get con el nombre del 
    input en el blade de teacherSearch ,luego se almacena una consulta donde se recojen los nombres 
    y los apellidos de los profesores que coincidan con lo de la variable teachersSearch,
    luego se ordenan por nombre del teacher y se hace una paginacion de 8 por tabla*/

    public function search(Request $request){

        $teachersSearch = \Request::get('teachersSearch');
        $Status = \Request::get('Status');
        
        
        /*se declaro una variable status para obtener el estado del select en la url*/

        /*en esta condicion validamos que si el valor de la variable status es igual a all
          que ejecute la consulta hacia todos los datos de la base de datos, permitiendo filtrar
          por el nombre que se introdusca en la variable teacherSearch y los pagine en 8*/

   if($Status == 'All' && !empty($teachersSearch))
        {
        $query = ['users.names' => $teachersSearch,'users.rolls_id' => 2];
        $query2 = ['users.last_name' => $teachersSearch,'users.rolls_id' => 2];

            $teachersList = User::where($query)
            ->orwhere($query2)
            ->orderBy('users.names')
            ->paginate(8);

            /*devolvemos a la vista teacher la variable teacherlist*/
            return view('teachers.teachers', ['teachersList' => $teachersList]);


       }
       
       elseif($Status == 'All' && empty($teachersSearch))
        {
        
            $teachersList = User::orderBy('names', 'asc')
            ->where('users.rolls_id', '=' , 2)
            ->paginate(8);

            /*devolvemos a la vista teacher la variable teacherlist*/
            return view('teachers.teachers', ['teachersList' => $teachersList]);



        }
        /*en esta segunda condicion se valida que si status es 1 y la url de teacherSearch llega vacia
          o si estatus es 0 y la url llega vacia , que traiga todos los datos donde el teacher.teacher_status
          sea igual a la variable status y los pagine en 8*/

   elseif(($Status == 1 && empty($teachersSearch)) ||
               ($Status == 0 && empty($teachersSearch)))
        {
            $query = ['users.status' => $Status,'users.rolls_id' => 2 ];

            $teachersList = User::where($query)
            ->orderBy('users.names')
            ->paginate(8);

        /*devolvemos a la vista teacher la variable teacherlist*/
            return view('teachers.teachers', ['teachersList' => $teachersList]);
        
        }
        /*en esta tercera validacion validamos que si la variable status es 1 o 0 y la variable
          teacherSearch no esta vacia, entonces haga las siguientes consultas*/
   elseif(($Status == 1 && !empty($teachersSearch)) ||
               ($Status == 0 && !empty($teachersSearch)))
        {
            
            /*guardamos en una variable la primera consulta que buscara los nombres que coincidan
              con recibidos en la url , y el status que se reciba por la url , en la segunda consulta
              se hace lo mismo pero con el apellido*/
             $query = ['users.names' => $teachersSearch,'users.status' => $Status,'users.rolls_id' => 2];
             $query2 = ['users.last_name' => $teachersSearch,'users.status' => $Status,'users.rolls_id' => 2];

            $teachersList = User::where($query)
            ->orwhere($query2)
            ->orderBy('users.names')
            ->paginate(8);

            /*devolvemos a la vista teacher la variable teacherlist*/
            return view('teachers.teachers', ['teachersList' => $teachersList]);
        
        }
    
    
    /*else
        {
   
        $query = ['users.names' => $teachersSearch,'users.rolls_id' => 2];

        $teachersList = User::where($query)
        ->orderBy('users.names')
        ->paginate(8);

        return view('teachers.teachers', ['teachersList' => $teachersList]);
        
        }*/
        

        
     }



    /*esta funcion es para cuando se puse el boton crear nos redirija 
      a la vista de creacion de profesores(a la parte de creacion de usuario)*/
  /*  public function create ()
    {
        return view('teachers.teachers_create');
    }
    

    public function store(Request $request)
        {
            /*se declara una variable pw de password para almacenar el valor de la
              solicitud que recibe del formulario, luego se crea la variable bpw de bcrypt 
              password para encryptar esa informacion y se le pasa como valor al modelo de User 
              para que la password sea igual a la clave encryptada*/
 
       /*     $user = new User;
            $teacher = new Teachers;

            $user->email = $request->email;
            $user->job = $request->job;
            $user->status = $request->status;
            
            $pw = $request->password;
            $bpw = bcrypt($pw);
            
            $user->password = $bpw;
            $user->save();
            $id = $user->id;

            $teacher->names = $request->names;
            $teacher->last_name = $request->last_name;
            $teacher->teacher_status = $request->status;
            $teacher->teacher_code = $request->teacher_code;
            $teacher->identity_card = $request->identity_card;
            $teacher->personal_phone = $request->personal_phone;
            $teacher->cellphone = $request->cellphone;
            $teacher->users_id = $id;
            $teacher->save();
         
            return redirect('/teachers');
        } 


    public function edit($id){

      /* $users = DB::table('users')
            ->join('contacts', 'users.id', '=', 'contacts.user_id')
            ->join('orders', 'users.id', '=', 'orders.user_id')
            ->select('users.*', 'contacts.phone', 'orders.price')
            ->get();


            $text = DB::table('pages')->where('pages.id', '=', $id)
            ->join('texts', 'pages.id', '=', 'texts.page_id')
            ->join('users', 'pages.user_id', '=', 'users.id')->where('users.id', '=', Auth::user()->id)
            ->get();

    return view('app.text', compact('text'));*/

  
        /*    $users = DB::table('teachers')
            ->where('teachers.id', '=' , $id)
            ->join ('users', 'teachers.users_id', '=' , 'users.id' )
            ->get();
            

        return view('teachers.teachers_edit', ['users' => $users]);


        
    }

    public function update(Request $request, $id){


        $teacher = Teachers::find($id);
        $user = User::find($id);
        $pw = $request->password;
        $bpw = bcrypt($pw);

        $teacher->fill([
            'names' => $request->names,
            'last_name' => $request->last_name,
            'teacher_status' => $request->status,
            'teacher_code' => $request->teacher_code,
            'identity_card' => $request->identity_card,
            'personal_phone' => $request->personal_phone,
            'cellphone' => $request->cellphone,
            'users_id' => $id
        ]);

        $user->fill([
            'email' => $request->email,
            'job' => $request->job,
            'status' => $request->status,
            'password' => $bpw
        ]);

        $teacher->save();
        $user->save();

 
        return redirect('/teachers');







       /* $student = Students::find($id);
        $student->fill($request->all());
        $student->save();

        return redirect('/students');*/
   /* }*/

}
