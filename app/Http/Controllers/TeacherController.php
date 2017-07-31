<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Spatie\Activitylog\Models\Activity;
use Auth;

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

        $teachersList = DB::table('rolls')
        ->join('users','rolls.id','=','users.rolls_id')
        ->where('rolls.roll', '=' , 'Profesor')
        ->paginate(8);

        return view('teachers.teachers', ['teachersList' => $teachersList]);
    }

 

    
    /*se pasa el parametro request a la funcion,se almacena una peticion get con el nombre del 
    input en el blade de teacherSearch ,luego se almacena una consulta donde se recojen los nombres 
    y los apellidos de los profesores que coincidan con lo de la variable teachersSearch,
    luego se ordenan por nombre del teacher y se hace una paginacion de 8 por tabla*/

    public function search(Request $request){

     }



    /*esta funcion es para cuando se puse el boton crear nos redirija 
      a la vista de creacion de profesores(a la parte de creacion de usuario)*/
    public function create ()
    {
        return view('teachers.teachers_create');
    }
    

    public function store(Request $request)
        {
            /*se declara una variable pw de password para almacenar el valor de la
              solicitud que recibe del formulario, luego se crea la variable bpw de bcrypt 
              password para encryptar esa informacion y se le pasa como valor al modelo de User 
              para que la password sea igual a la clave encryptada*/
        try{
            $user = new User;
            $pw = $request->password;
            $bpw = bcrypt($pw);
            $roll = DB::table('rolls')
            ->where('rolls.roll', '=' , 'Profesor')
            ->get();

            
            $user->names = $request->names;
            $user->last_name = $request->last_name;
            $user->personal_phone = $request->personal_phone;
            $user->cellphone = $request->cellphone;
            $user->address = $request->address;
            $user->identity_card = $request->identity_card;
            $user->gender = $request->gender;
            $user->civil_status = $request->civil_status;
            $user->email = $request->email;
            $user->password = $bpw;
            $user->status = $request->status;
            $user->rolls_id = $roll[0]->id;

            $user->save();

           
            $userModel = Auth::user();
            $someContentModel = $user;
            activity('Profesor')
            ->causedBy($userModel)
            ->performedOn($someContentModel)
            ->log('Usuario:'.Auth::user()->names.',Creo :'.$user->names);
            
            $lastLoggedActivity = Activity::all()->last();
            $lastLoggedActivity->subject; //returns an instance of an eloquent model
            $lastLoggedActivity->causer; //returns an instance of your user model
            $lastLoggedActivity->description; //returns 'Look, I logged something'
            $lastLoggedActivity->log_name;

            session::flash('message', 'Profesor creado correctamente');
            return view('/teachers');
        }
        catch(\Exception $e){
            session::flash('message',$e);
            return redirect('teachers/create');
        }

        } 


    public function edit($id){

     $users = User::find($id);
        return view('teachers.teachers_edit', ['users' => $users]);


        
    }

    public function update(Request $request, $id){

        try{
        $teacher = User::find($id);
        $teacher->fill($request->all());
        $teacher->save();
       
            $userModel = Auth::user();
            $someContentModel = $user;
            activity('Profesor')
            ->causedBy($userModel)
            ->performedOn($someContentModel)
            ->log('Usuario:'.Auth::user()->names.',cambio en:'.$teacher->names);
            
            $lastLoggedActivity = Activity::all()->last();
            $lastLoggedActivity->subject; //returns an instance of an eloquent model
            $lastLoggedActivity->causer; //returns an instance of your user model
            $lastLoggedActivity->description; //returns 'Look, I logged something'
            $lastLoggedActivity->log_name;

        session::flash('message', 'Profesor editado correctamente');
        return view('/teachers');
        }
        catch(\Exception $e) {

        session::flash('message',$e);
        return redirect('/teachers');
    }
       
    }




    public function destroy($id)
    {
    try {
        $user = User::find($id);
        $user->delete();

            $userModel = Auth::user();
            $someContentModel = $user;
            activity('Profesor')
            ->causedBy($userModel)
            ->performedOn($someContentModel)
            ->log('Usuario:'.Auth::user()->names.',Borro :'.$user->names);
            
            $lastLoggedActivity = Activity::all()->last();
            $lastLoggedActivity->subject; //returns an instance of an eloquent model
            $lastLoggedActivity->causer; //returns an instance of your user model
            $lastLoggedActivity->description; //returns 'Look, I logged something'
            $lastLoggedActivity->log_name;

        session::flash('message', 'Profesor eliminado correctamente');
        return redirect('/teachers');
  //code causing exception to be thrown
    } catch(\Exception $e) {
  //exception handling
    }
        session::flash('message', 'el usuario que intenta eliminar se encuentra en una seccion');
        return redirect('/teachers');
    }


   



}
