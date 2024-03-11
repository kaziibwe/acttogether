<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    //to login page
public function loginPage(){
    return view('login');

}

    public function store(Request $request)
    {
        //
        // dd($request->all());
        try {
            $formFields = $request->validate([
                'name' => ['required', 'min:3'],
                'email' => ['required', Rule::unique('users', 'email')],
                'password' => ['required', 'confirmed', 'min:6'],
                'role' => 'required',
                'number' => 'required',

            ]);

            if ($request->hasFile('image')) {
                $formFields['image'] = $request->file('image')->store('images', 'public');
            }
            // Hash password
            $formFields['password'] = bcrypt($formFields['password']);

            // Insert user into the 'users' table
            DB::table('users')->insert($formFields);

            // Authenticate the user
            if (auth()->attempt(['email' => $formFields['email'], 'password' => $request->password])) {
                $request->session()->regenerate();
                return redirect('/')->with('success', 'Logged in successfully!');
            }

            return back()->withErrors(['email' => 'Invalid credentials'])->onlyInput('email');
        } catch (\Exception $e) {
            return back()->with('danger', $e->getMessage());
        }
    }

    public function authenticate(Request $request)
    {

        $formFields = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        // Attempt to authenticate the user
        if (auth()->attempt($formFields)) {
            $request->session()->regenerate();
            // dd('loged');
            return redirect('/')->with('success', 'Logged in successfully!');
        }

        return back()->withErrors(['email' => 'Invalid credentials'])->onlyInput('email');
    }

    // logout
    public function logout(Request $request)
    {
        Auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login')->with('message', 'logged out successfully !');
    }
}
