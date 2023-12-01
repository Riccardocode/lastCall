<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    public function create(){
        return view('users.register');
    }
    //add user to database
    public function store(Request $request){
        $formFields=$request->validate([
            'name'=>'required',
            'email'=>['required','email',Rule::unique('users','email')],
            'password' => ['required',Password::min(8)
                                        ->mixedCase()
                                        ->letters()
                                        ->numbers()
                                        ->symbols()
                                        ->uncompromised(2),'confirmed'],
            // 'password'=>['required','min:8','confirmed'],
        ]);
        //encrypt password
        $formFields['password']=bcrypt($formFields['password']);
        $user = User::create($formFields);

        //required to login the user after registration
        auth()->login($user);

        //redirect to home page
        return redirect('/')->with('message','Thanks for registering, user logged in!');
    }

    public function logout(Request $request){

        auth()->logout();

        //This will remove the session data
        $request->session()->invalidate();
        //This will regenerate a new session id for security purposes?
        $request->session()->regenerateToken();
        return redirect('/')->with('message','User logged out!');
    }

    public function login()
    {
        return view('users.login');
    }

    public function authenticate(Request $request)
    {
        $formFields=$request->validate([
            'email'=>['required','email'],
            'password' => ['required'],
        ]);

        //Attempt() tries to match the content of the $formFields to a user in our users table
        //If it finds a match, it will log the user in and return true
        if(auth()->attempt($formFields)){
            $request->session()->regenerate();
            return redirect('/')->with('message','User logged in!');
        }
        //if does not match, return back with error message
        return back()->withErrors([
            'loginError'=>'The provided credentials do not match our records.',
        ]);
    }


    //Display all users
    public function manage(){
        if(auth()->user()->role != 'admin'){
            abort(403);
        }
        $users = User::all();
        return view('users.manage',compact('users'));
    }
    //Display Single User
    public function userDetails($id){
        if(!(auth()->user()->role == 'admin' || auth()->user()->id == $id)){
            abort(403);
        }
        $user = User::findOrFail($id);
        return view('users.userDetails',compact('user'));
    }

    public function destroy($id){
        if(auth()->user()->role != 'admin'){
            abort(403);
        }
        $user = User::findOrFail($id);
        $user->delete();
        return redirect('/users')->with('message','User deleted!');
    }

    public function edit($id){
        if(!(auth()->user()->role == 'admin' || auth()->user()->id == $id)){
            abort(403);
        }
        $user = User::findOrFail($id);
        return view('users.edit',compact('user'));
    }

    public function update(Request $request, $id){
        if(!(auth()->user()->role == 'admin' || auth()->user()->id == $id)){
            abort(403);
        }
        $formFields=$request->validate([
            'firstname'=>'required',
            'lastname'=>'required',
            'phone'=>'required',
            'role'=>'required',
            // 'password' => ['required',Password::min(8)
            //                             ->mixedCase()
            //                             ->letters()
            //                             ->numbers()
            //                             ->symbols()
            //                             ->uncompromised(2),'confirmed'],
            // // 'password'=>['required','min:8','confirmed'],
        ]);
        //encrypt password
        // $formFields['password']=bcrypt($formFields['password']);
        $user = User::findOrFail($id);
        $user->update($formFields);
        return redirect('/users')->with('message','User updated!');
    }
}
