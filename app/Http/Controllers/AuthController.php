<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Models\User;
use Alert;
use App\Notifications\ResetPasswordNotification;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login()
    {
        if (Auth::check()) {
            if(Auth::user()->role == "Admin"){
                return redirect('/userpenduduk');
            }else if(Auth::user()->role == "Pemilik Rumah"){
                return view('penduduk');
            }
        }else{
            return view('login');
        }
    }

    public function loginapi(Request $request){
        $data = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        
        $user = User::where('email', $data['email'])->first();

        if(!$user || !Hash::check($data['password'],$user->password)){

            return response(['message' => 'Invalid Creedentials'],401);

        }else{
            
            $token = $user->createToken('auth_token')->plainTextToken;
            $response = [
                'user' => $user,
                'token' => $token
            ];

                return response($response,200);
        }

    }

    public function logoutapi(){
        auth()->user()->tokens()->delete();

        return [
            'pesan' => 'logout berhasil'
        ];
    }

    public function actionlogin(Request $request)
    {
        
        $data = [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ];

        $remember_me = $request->has('remember_me') ? true : false;

        if (Auth::Attempt($data,$remember_me)) {
            if(Auth::user()->role == "Admin"){
                return redirect('/userpenduduk');
            }else if(Auth::user()->role == "Pemilik Rumah"){
                return redirect('/dashboard');
            }
        }else{
            Session::flash('error', 'Email atau Password Salah');
            return redirect('/');
        }
    }

    public function actionlogout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function lupapassword(){
    
        return view('lupaPassword');
    }

    public function validasiemail(Request $request){
        $email = $request->email;

        if (User::where('email', '=', $email)->count() > 0) {
            $user = User::where('email','=',$email)->get()->first();
            $user->email = $request->email;
            $user->save();
            $user->notify(new ResetPasswordNotification($user));
            

            Session::flash('sukses', 'Silahkan periksa email anda !');
            return redirect('/');
         }else{
            Session::flash('error', 'Email ini tidak terdaftar !');
            return redirect('/');
         }

    }

    public function gantipassword($id){
        $user = User::where('id',$id)->get();
        return view('passwordBaru',compact(['user']));
    }

    public function lupas(){
        return view('passwordBaru');
    }

    public function ubahpassword(Request $request,$id){
        $user = User::findOrFail($id);
        $user->password = $request->input('password');
        $user->password = $request->input('konfirmasi_password');
        $user->save();

        Session::flash('berhasil', 'Silahkan login');
        return redirect('/');
    }


}
