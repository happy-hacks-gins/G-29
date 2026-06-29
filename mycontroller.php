<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;
use PharIo\Manifest\Email;

class mycontroller extends Controller
{
    public function login(Request $request){
        $incomingFields=$request->validate([
           'email' => [
    'required',
    'string',
    'lowercase',
    'email:rfc,dns', // Enhances the built-in email check
    'min:8',
    'max:30',
    'unique:users,email_address', // Prevents duplicate registrations
],


'password' => [
    'required',
    'string',
    'min:8', // Upgraded from 6 for better security
    'max:20',
    'confirmed', // Requires a matching 'password_confirmation' field
    Password::min(8)
        ->letters()
        ->mixedCase()
        ->numbers()
        ->symbols()
        ->uncompromised(), // Blocks leaked passwords from historical data breaches
],
        ]);
    }
    public function register(Request $request){
        $incomingFields=$request->validate([
           'email' => [
    'required',
    'string',
    'lowercase',
    'email:rfc,dns', // Enhances the built-in email check
    'min:8',
    'max:30',
    'unique:users,email_address', // Prevents duplicate registrations
],


'password' => [
    'required',
    'string',
    'min:8', // Upgraded from 6 for better security
    'max:20',
    'confirmed', // Requires a matching 'password_confirmation' field
    Password::min(8)
        ->letters()
        ->mixedCase()
        ->numbers()
        ->symbols()
        ->uncompromised(), // Blocks leaked passwords from historical data breaches
],
        ]);
        return 'hi';
    }
    
}
