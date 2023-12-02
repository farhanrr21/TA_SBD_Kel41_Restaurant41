<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use MongoDB\Driver\Session;

class LoginController extends Controller
{
    public function login(Request $request){
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);


        $user = DB::select('SELECT username FROM users WHERE username = :username AND password = :password', [
            'username' => $credentials['username'],
            'password' => $credentials['password']
            ]);

        if ($user != null) {
            $request->session()->put('user', $user);
            return redirect()->route('home.dashboard');
        }
        else {
            return redirect()->back()->withErrors(['message' => 'Invalid Username/Password']);
        }
    }
    public function logout(){
        session()->forget('user');
        return redirect()->route('login');
    }
}
