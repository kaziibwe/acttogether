<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\Verifylogin;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;


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
            return redirect('/adminProfilePage')->with('success', 'Admin is added successfully !');


    }

    public function editingAdminProfile(request $request,$id){
    // dd($request['name']);
    $user= User::find($id);
    // dd($user->id);
        $admin = Auth::user(); // Assuming you're using Laravel's built-in authentication
    if($admin->id !== $user->id){
    return redirect('/login');
    }
     $addAdmin = $request->validate([
        'name'=>'string',
        'email'=>'email|string',
        'number'=>'string'
    ]);
    if($request->hasFile('image')){
        $addAdmin['image']=$request->file('image')->store('images','public');
    }
    // $user->update($addAdmin);
    DB::table('users')->where('id', $user->id)->update($addAdmin);

    return redirect('/adminProfilePage')->with('success','Admin is Updated successfully');

    }

    public function authenticate(Request $request)
    {

        $formFields = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $email= $formFields['email'];

        // Attempt to authenticate the user
        if (auth()->attempt($formFields)) {

            $randomCode = '';
            for ($i = 0; $i < 6; $i++) {
                $randomCode .= mt_rand(0, 9); // Append a random digit (0-9) to the code
            }
            $data = [
                'velification_code' => $randomCode,
                'email' => $email
            ];

            DB::table('users')->where('email',$email)->update($data);

            Mail::to($email)
            ->send(new Verifylogin($data));

            return redirect()->route('otpPage',['email' => $email])->with('success', 'Otp is sent for verificaion!');
        }

        return back()->withErrors(['email' => 'Invalid credentials'])->onlyInput('email');
    }


    public function otpPage($email){
        return view('otpPage',['email'=>$email]);

      }

    public function otp(Request $request, $email){

        $formFields = $request->validate([
            'otp' => 'required'
        ]);

        $inputOtp=$formFields['otp'];
        // dd($email);
        $user = User::where('email', $email)->first();

        $storeOtp=$user->velification_code;
        // dd($storeOtp);

        if($inputOtp !== $storeOtp){
            return back()->with('danger','wrong otp');
        }

            $request->session()->regenerate();
            // $cookie = request()->cookie('laravel_session');

            $sessionId = session();
            // dd($sessionId);
            //  dd($cookie);

            return redirect('/')->with('success', 'Otp is sent for verificaion!');


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
