<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class authenticate extends Controller
{
    public function login(){
         return view('auth.login');
    }

    public function register(){
     return view('auth.register');

 }

  public function registeruser(Request $request){
      $request->validate([
         'name'=>'required',
         'email'=>'required|email|unique:users',
         'password'=>'required|min:8|max:12'
      ]);

      $user = new User();
      $user->name = $request->name;
      $user->email = $request->email;
      $user->password = Hash::make($request->password);
      $res = $user->save();

      if ($res){
         return back()->with('success', 'You have sucessfully registered');
      }else{
         return back()->with('fail', 'Something went wrong');
      }
  }

  public function loginuser(Request $request){
     $request->validate([
         'email'=>'required|email',
         'password'=>'required|min:8|max:12'
      ]);

      $user = User::where('email','=',$request->email)->first();

      if ($user){
         if (Hash::check($request->password, $user->password)){
             $request->session()->put('loginid',$user->id);
             return redirect('dashboard');
         }else{
             return back()->with('fail', 'Password does not match');
         }
      }else{
         return back()->with('fail', 'This Email is not registered');
      }
  }

     public function dashboard(){
         $data = array();
         if (Session::has('loginid')){

             $data= User::where('id', '=', Session::get('loginid'))->first();
         }
         return view('auth.dashboard', compact('data'));
     }
 }
