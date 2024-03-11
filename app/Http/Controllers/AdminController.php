<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;

class AdminController extends Controller
{
    //
    // public function storeAdmin(Request $request)
    // {
    //     try {
    //         $formFields = $request->validate([
    //             'name' => 'required',
    //             'email' => ['required', Rule::unique('admins', 'email')],
    //             'number' => 'required',
    //             'role' => 'required',
    //             'password' => ['required', 'confirmed', 'min:6',]
    //         ]);

    //         // Hash password
    //         $formFields['password'] = Hash::make($formFields['password']);

    //         if ($request->hasFile('image')) {
    //             $formFields['image'] = $request->file('image')->store('images', 'public');
    //         }
    //         DB::table('admins')->insert($formFields);

    //         return redirect('/login')->with('success', 'Account created successfully');
    //     } catch (\Exception $e) {
    //          return back()->with('danger', $e->getMessage());
    //     }
    // }


    // public function authAdmin(request $request){
    //   try{
    //     if ($request->isMethod('post')) {
    //         $data = $request->all();
    //         // echo"<pre>"; print_r($data); die;
    //         if (Auth::guard('admin')->attempt(['email' => $data['email'], 'password' => $data['password']])) {
    //             return redirect('/')->with('success', 'Logged in successfully ');
    //         } else {
    //             // return redirect()->back()->with('danger ', 'Invalid Email or Password');

    //             return back()->withErrors(['email' => 'invalid Credentials'])->onlyInput('email');

    //         }
    //     }
    //   }catch(\Exception $e){
    //     dd($e);
    //     return back()->with('danger',$e->getMessage());
    //   }

    // }


    // public function authAdmin(Request $request): RedirectResponse
    // {
    //     $credentials = $request->validate([
    //         'email' => ['required', 'email'],
    //         'password' => ['required'],
    //     ]);

    //     $hashedPasswordFromDatabase = Admin::where('email', $credentials['email'])->value('password');

    //     if ($hashedPasswordFromDatabase && Hash::check($credentials['password'], $hashedPasswordFromDatabase)) {
    //         if (Auth::guard('admin')->attempt($credentials)) {
    //             $request->session()->regenerate();
    //             return redirect()->intended('/');
    //         }
    //     }

    //     return back()->withErrors([
    //         'email' => 'The provided credentials do not match our records.',
    //     ])->onlyInput('email');
    // }


}
