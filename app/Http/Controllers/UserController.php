<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    public function create()
    {
        return view('users.register');
    }
    //add user to database
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            "phonenumber" => "required",
            'password' => ['required',Password::min(8)
                                        ->mixedCase()
                                        ->letters()
                                        ->numbers()
                                        ->symbols()
                                        ->uncompromised(2),'confirmed'],
            'password' => ['required', Password::min(8), 'confirmed'],


        ]);
        if ($request->hasFile('profileImg')) {
            $formFields['profileImg'] = $request->file('profileImg')->store('profileImages', 'public');
        }
        //encrypt password
        $formFields['password'] = bcrypt($formFields['password']);
        $user = User::create($formFields);

        //required to login the user after registration
        auth()->login($user);

        //redirect to home page
        //redirect back to previous page
        return redirect()->intended('/')->with('message', 'Thanks for registering, user logged in!');
    }

    public function logout(Request $request)
    {

        auth()->logout();

        //This will remove the session data
        $request->session()->invalidate();
        //This will regenerate a new session id for security purposes?
        $request->session()->regenerateToken();
        return redirect('/')->with('message', 'User logged out!');
    }

    public function login()
    {

        return view('users.login');
    }

    public function authenticate(Request $request)
    {
        $formFields = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (auth()->attempt($formFields)) {
            $request->session()->regenerate();

            // Check if there is an intended URL in the session
            if ($request->session()->has('url.intended')) {
                $intendedUrl = $request->session()->get('url.intended');
                return redirect()->intended($intendedUrl);
            }

            // If no intended URL, redirect to the root ('/') or any other default URL
            return redirect('/')->with('message', 'User logged in!');
        }

        return back()->withErrors([
            'loginError' => 'The provided credentials do not match our records.',
        ]);
    }



    //Display all users
    public function manage()
    {
        if (auth()->user()->role != 'admin') {
            abort(403);
        }
        $users = User::orderBy('Lastname')->paginate(12);
        return view('users.manage', compact('users'));
    }
    //Display Single User
    public function userDetails($id)
    {
        if (!(auth()->user()->role == 'admin' || auth()->user()->id == $id)) {
            abort(403);
        }
        $user = User::findOrFail($id);
        return view('users.userDetails', compact('user'));
    }

    public function destroy($id)
    {
        if (auth()->user()->role != 'admin') {
            abort(403);
        }
        $user = User::findOrFail($id);
        $user->delete();
        return back()->with('message', 'User deleted!');
    }

    public function edit($id)
    {
        if (!(auth()->user()->role == 'admin' || auth()->user()->id == $id)) {
            abort(403);
        }
        $user = User::findOrFail($id);
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        if (!(auth()->user()->role == 'admin' || auth()->user()->id == $id)) {
            abort(403);
        }
        $formFields = $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'role' => 'required',
            'phonenumber' => 'required',
            'email' => ['required', 'email', Rule::unique('users', 'email')->ignore($id)],

            // 'password' => ['required',Password::min(8)
            //                             ->mixedCase()
            //                             ->letters()
            //                             ->numbers()
            //                             ->symbols()
            //                             ->uncompromised(2),'confirmed'],
            // // 'password'=>['required','min:8','confirmed'],
        ]);
        if ($request->hasFile('profileImg')) {
            $formFields['profileImg'] = $request->file('profileImg')->store('profileImages', 'public');
        }
        //encrypt password
        // $formFields['password']=bcrypt($formFields['password']);
        $user = User::findOrFail($id);
        $user->update($formFields);
        if(auth()->user()->role == "admin"){

            return redirect('/users')->with('message', 'User updated!');
        }
        else{
            return redirect('/users/'.$user->id)->with('message', 'User updated!');
        }
    }

    public function becomeManager()
    {
        if (auth()->user()->role != 'user') {
            abort(403);
        }
        return view(
            'users.becomeManager',
            [
                'user_id' => auth()->user()->id,
            ]
        );
    }
    public function updateBecomeManager()
    {
        if (auth()->user()->role != 'user') {
            abort(403);
        }
        $user = User::findOrFail(auth()->user()->id);
        $user->role = 'restaurantManager';
        $user->save();
        return redirect('/business/create')->with('message', 'User updated! Create your restaurant');
    }
}
