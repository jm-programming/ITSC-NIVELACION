<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
//use AuthenticatesAndRegistersUsers, ThrottlesLogins;

use App\User;
use DB;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;
    

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');

        
    }

    protected function credentials(\Illuminate\Http\Request $request)
    {
        //$user = Auth::user()->id;
        //return $request->only($this->username(), 'password');
        //$users = DB::table('users')->select('password')->where('id', 2)->get();
       //$estatus =  Db::table('users')->where('users.id', $user)->update(['users.status' => 1]);
        //$contra = ['password' => $request->password];
            //dd($estatus);
       return ['email' => $request->{$this->username()}, 'password' => $request->password, 'status' => 1];

        
     }



}
