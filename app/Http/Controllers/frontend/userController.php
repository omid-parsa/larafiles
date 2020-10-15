<?php

namespace App\Http\Controllers\frontend;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class userController extends Controller
{
    public function login()
    {
        return view('frontend.users.login');
    }

    public function dologin(Request $request)
    {
        //validation must be done on request

        //in order to remember the user for the next time  we have to pass a boolean true as be remembered and false to not in the auth::attempt method as the second argument
        //the first argument is an array containing  email and password
        // we do this in the following way
        //first check is the remember check box is checked or not
        $remember=$request->has('remember');
        // then pass this variable that contains true or false to the following method
        if (Auth::attempt(['email' => $request->email,'password' => $request->password], $remember)){
            return redirect('/');
        }
        return redirect()->back()->with('loginerror', 'access denied');
    }

    public function register()
    {
        return view('frontend.users.register');
    }

    public function doregister(Request $request)
    {
        // validation must be done here
        $new_user_data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password
        ];
        $new_user = User::create($new_user_data);
        if ($new_user && $new_user instanceof User){
            return redirect('/');
        }
        return redirect()->back()->with('registererror', 'Problem in register');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
