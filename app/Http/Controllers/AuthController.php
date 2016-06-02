<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Auth;
use App\User;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests;

class AuthController extends Controller
{

    protected $redirectTo='home';

    public function getRegistration(){
        return view('user.registration');
    }

    public function postRegistration(Request $request){

        //dd($request);
        $this->validate($request,[
            'fname'=>'required',
            'lname'=>'required',
            'user_name'=>'required|unique:users',
            'department'=>'required',
            'university'=>'required',
            'phone'=>'required',
            'student_id'=>'required',
            'email'=>'required|unique:users|email|max:255',
            'password' => 'required|min:5|confirmed',
        ]);

        $confirmation_code = str_random(30);

        $email= Mail::send('auth.emails.verify',['confirmation_code'=>$confirmation_code],function($message)use($request){

            $message->to($request->input('email'),$request->input('fname'))->subject("Verify Your Email Address");
        });


        if($email){
            User::create([
                'fname'=>studly_case($request->input('fname')),
                'lname'=>studly_case($request->input('lname')),
                'user_name'=>$request->input('user_name'),
                'department'=>$request->input('department'),
                'university'=>$request->input('university'),
                'phone'=>$request->input('phone'),
                'student_id'=>$request->input('student_id'),
                'email'=>$request->input('email'),
                'is_a'=>'user',
                'active'=>0,
                'admin_active'=>0,
                'code'=>$confirmation_code,
                'password'=>bcrypt($request->input('password')),
            ]);
        }

        notify()->flash('Your Conformation Mail has been Send!', 'success', [
            'timer' => 7000,
            'text' => 'Please Check Your Mail',
        ]);
        return redirect('/');
    }

    public function getLogin(){
        return view('user.login');
    }

    public function postLogin(Request $request){
        $this->validate($request,[
            'email'=>'required',
            'password'=>'required',
        ]);

        if(!Auth::attempt(['email' =>$request->input('email'), 'password' =>$request->input('password'),'active' => 1,'admin_active' => 1],$request->has('remember'))){
            notify()->flash('Wrong Email or Password Or forget Active Your Mail', 'warning', [
                'timer' => 5000,
                'text' => 'Please Check Your Mail',
            ]);
            return redirect()->back();
        }

        return redirect('home');
    }

    public function confirm($confirmationCode){
        $user=User::where('code','=',$confirmationCode)->where('active','=',0);
        if($user->count()){
            $user=$user->first();
            $user->active=1;
            $user->code='';
            if($user->save()){
                notify()->flash('Activated! You Can Now Sign In', 'success', [
                    'timer' => 7000,
                    'text' => 'Please wait for Admin Activation',
                ]);
                return redirect('login');
            }
        }
    }

    public function getLogout(){
        Auth::logout();
        return redirect('/');
    }
}
