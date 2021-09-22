<?php

namespace App\Http\Controllers;

use App\Models\Auth\Admin;
use Illuminate\Http\Request;
use App\Authservice\authservice;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(){
        return view('auth.login');
    }
    public function register(){
        return view('auth.register');
    }
    public function store(Request $request,authservice $authservice){

        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:admins',
            'password'=>'required|min:5|max:12',
            'confirm_password'=>'required|min:5|max:12|same:password'
        ]);
        $data=$request->only([
            'name',
            'email',
            'password',
            'confirm_password'
        ]);
        $result['data']= $authservice->storeData($data);
        if($result){
            return back()->with('success','New use sucessfully added to database');
        }else{
            return back()->with('fail','New use sucessfully added to database');
        }
    }
    public function check (Request $request){
        $request->validate([
            'email'=>'required|email',
            'password'=>'required|min:5|max:12'
        ]);

        $checkauth=Admin::where('email','=', $request->email)->first();
        if(!$checkauth){
            return back()->with('fail','We do not recognize you email address');
        }else{
            if(Hash::check($request->password,$checkauth->password)){
                $request->session()->put('Loggeduser',$checkauth->id);
                return redirect('admin/dashboard');
            }else{
                return back()->with('fail','Incorrect Password');
            }
        }
    }

    public function dashboard(){
        $data=['LoggedUserInfo'=>Admin::where('id','=',session('Loggeduser'))->first()];
        return view('admin.dashboard',$data);
    }
    
    public function logout(){
        if(session()->has('Loggeduser')){
            session()->pull('Loggeduser');
            return redirect('/auth/login');
        }
    }
}
