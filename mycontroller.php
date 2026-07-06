<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;
use PharIo\Manifest\Email;
use Illuminate\Support\Facades\Auth;  

class mycontroller extends Controller
{
    public function logout(){
     Auth::logout();
     return redirect("/");
     }



  
    public function register(Request $request){
        $incomingFields=$request->validate([
            'name'=>['required','string',Rule::unique('users','name')],
           'email' => [ 'required','string', 'lowercase','min:8','max:30',Rule::unique('users','email')],

           'password' => [ 'required', 'string', 'min:8',  'max:20',],
        ]);

        $incomingFields['password']=bcrypt($incomingFields['password']);
        $user=User::create($incomingFields);
        Auth::login($user);
        return redirect('/login');
        
    }
     public function login(Request $request){
      $incomingFields= $request->validate([
            'loginname'=>['required','string'],
           'loginpassword' => [ 'required', 'string', 'min:8',  'max:20',],


      ]);
      
         if(Auth::attempt(['name'=>$incomingFields['loginname'],'password'=>$incomingFields['loginpassword']])){
        $request->session()->regenerate();
         return redirect('/login');


      }
       return redirect('/');
       
     }
   /* public function register(Request $request){
        $incomingFields=$request->validate([
           'email' => [ 'required', 'string', 'lowercase', 'min:8', 'max:30',],
           'password' => ['required','string','min:8', 'max:20',],
        ]);
        $validEmail = 'admin@example.com';
        $validPassword = 'password123';

        if ($request->email === $validEmail && $request->password === $validPassword) {
            
            session(['is_logged_in' => true]);
            session(['user_email' => $request->email]);

            return redirect()->route('terms');
        }
        return back()->withErrors([
            'login_error' => 'Invalid email or password.',
        ])->onlyInput('email'); 

        }*/
    
}
