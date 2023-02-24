<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
   {
       // Attempt to authenticate the user
        if( !auth()->attempt(request(['email', 'password']))) {
            // If not, redirect back
            return back()->withErrors([
                'message' => 'Please chek your credentials and try again.'
            ]); 

        }
        return redirect('admin');
   }
}
