<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

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

    public function getLogin(){
        return view('login');
    }
 
    public function postLogin(Request $request){
        try {
            $message = trans('messages.invalid_login_credentials');
            $rememberMe = false;
            $user = User::where('email', $request->email)->first();
            if (!empty($user)) {
                    //Matching password using hash
                    $isPasswordMatched = \Hash::check($request->password, $user->password);
                    if ($isPasswordMatched) {
                        Auth::loginUsingId($user->id, $rememberMe);
                        return redirect('/home');
                    }
                }
        } catch (\Exception $e) {
            Log::error(__CLASS__ . "::" . __METHOD__ . "  " . $e->getMessage() . "on line" . $e->getLine());
        }
        return redirect('/login')->with('error_msg', $message);
    }
 
 
    public function logoutUser(Request $request){
        Auth::logout();
        return redirect('/login');
    }
}
