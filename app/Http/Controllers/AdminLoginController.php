<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;

class AdminLoginController extends Controller
{

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */

    protected $redirectTo = RouteServiceProvider::ADHOME;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function showLoginForm()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $this->validateLogin($request);


        if ($this->attemptLogin($request)) {
            return $this->sendLoginResponse($request);
        }

        return $this->sendFailedLoginResponse($request);
    }

//    protected function credentials(Request $request)
//    {
//        $admin = admin::where('email',$request->email)->first();
//        if(!is_null($admin))
//        {
//            if($admin->status==0)
//            {
//                return ['email'=>'inactive', 'password'=>'You are not an active person,
//            Please Contact admin '];
//            }
//            else
//            {
//                return ['email'=>$request->email, 'password'=>$request->password,'status'=>1];
//            }
//        }
//        return $request->only($this->username(), 'password');
//    }
//    public function __construct()
//    {
//        $this->middleware('guest:admin')->except('logout');
//    }
//
//    protected function guard()
//    {
//        return Auth::guard('admin');
//    }
}
