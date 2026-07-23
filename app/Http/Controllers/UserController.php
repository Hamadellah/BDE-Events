<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Event;

class UserController extends Controller
{      
    public function index(){
        $event1 = Event::withCount('reservation')->get();
        $user = Auth::user();
        $event = Event::all();
        if($user->role=="admin"){
            return view("/dashboard/dashboard-admin",compact("user","event1"));
        }else{
            return view("/dashboard/dashboard-student",compact("user","event"));
        }
        
    }
    
    public function register(Request $request){
        // dd($request);
        $name=$request->input("name");
        $email=$request->input("email");
        $password=$request->input("password");
        $role=$request->input("role");
        $request->validate([
            "name" => "required",
            "email" => "required",
            "password" => "required",
            "role" => "required" 
        ]);
        User::create([
            "name"=>$name,
            "email"=>$email,
            "password"=>bcrypt($password),
            "role"=>$role

        ]);
        return redirect()->route("login")->with("success","User created successfully");
    }
    public function login(Request $request){
    $email = $request->input('email');
    $password = $request->input('password');
    $user=User::where('email', $email)->first();
    if ($user && Hash::check($password, $user->password)) {
        Auth::login($user);
        return redirect()->route("index");
    }
    return response()->json(['message' => 'Invalid credentials'], 401);
}
public function logout(Request $request)
{ 
    Auth::logout();
    return redirect()->route('login');  
}
}