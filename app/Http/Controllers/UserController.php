<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests;

class UserController extends Controller
{
    public function index(){
        $users =User::where('active','=',1)->where('admin_active','=',1)->paginate(20);
        return view('admin.users',compact('users'));
    }

    public function notification(){
        $users =User::where('active','=',1)->where('admin_active','=',0)->paginate(20);
        return view('admin.notifi',compact('users'));
    }

    public function active($id){

        $user=User::where('id','=',$id)->where('active','=',1)->where('admin_active','=',0);

        if($user->count()){
            $user=$user->first();
            $user->admin_active=1;

            if($user->save()){
                notify()->flash('Activated!', 'success', [
                    'timer' => 3000,
                ]);
                return redirect()->back();
            }
        }
    }
    public function deleteNotification($id){
        $user=User::findOrFail($id);
        $user->delete();
        return redirect()->back();
    }

    public function edit($id){

        $user=User::find($id);
        return view('admin.useredit',compact('user'));
    }
    public function update(Request $request,$id){
        //dd($request);
        $this->validate($request,[
            'fname'=>'required',
            'lname'=>'required',
            'department'=>'required',
            'university'=>'required',
            'phone'=>'required',
            'student_id'=>'required',
            'email'=>'required|max:255',
        ]);

        $user=User::findOrFail($id);
        $user->fname=$request->get('fname');
        $user->lname=$request->get('lname');
        $user->email=$request->get('email');
        $user->is_a=$request->get('is_a');
        $user->department=$request->get('department');
        $user->university=$request->get('university');
        $user->phone=$request->get('phone');
        $user->student_id=$request->get('student_id');
        $user->email=$request->get('email');

        $user->save();

        return redirect('/admin/users');
    }

    public function delete($id){
        $user=User::findOrFail($id);
        $user->delete();
        return redirect()->back();
    }
}
