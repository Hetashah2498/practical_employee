<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\RegisterRequest;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    public function getRegister(){
        return view('register');
    }
 
    public function postRegister(RegisterRequest $request){
        try {
            $message = trans('messages.error');
            $user = User::create([
                'name' => $request['name'],
                'email' => $request['email'],
                'password' => bcrypt($request['password']),
            ]);
            if (!empty($user)) {
                $message = trans('messages.registered');
                    return redirect('/register')->with('success_msg', $message);
            }
        } catch (\Exception $e) {
            Log::error(__CLASS__ . "::" . __METHOD__ . "  " . $e->getMessage() . "on line" . $e->getLine());
        }
        return redirect('/register')->with('error_msg', $message);
    }
}
