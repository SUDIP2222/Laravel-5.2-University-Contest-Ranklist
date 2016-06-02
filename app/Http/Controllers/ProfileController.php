<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {

        $users = User::where('id', '=', Auth::user()->id)->where('active', '=', 1)->where('admin_active', '=', 1)->paginate(20);
        try {
            $handle = User::find(Auth::user()->id)->information;
            if ($handle) {
                $handle = $handle->codeforces_handle;
                $url = 'http://codeforces.com/api/user.info?handles='.$handle;
                if(@file_get_contents($url) === FALSE){
                    return redirect('user/profile');

                }
                else{
                    $result=file_get_contents($url);
                }
                $response = json_decode($result);
                $datas = $response->result;
            }
        }catch(RequestException $e){

        }

       return view('user.profile', compact('users', 'datas'));
    }

    public function edit(){

        $user=User::find(Auth::user()->id);
        return view('user.profile-edit',compact('user'));

    }

    public function update(Request $request){

        $this->validate($request,[
            'fname'=>'required',
            'lname'=>'required',
            'department'=>'required',
            'university'=>'required',
            'phone'=>'required',
            'student_id'=>'required',
            'email'=>'required|max:255',
        ]);

        $user=User::findOrFail(Auth::user()->id);
        $user->fname=$request->get('fname');
        $user->lname=$request->get('lname');
        $user->email=$request->get('email');
        $user->department=$request->get('department');
        $user->university=$request->get('university');
        $user->phone=$request->get('phone');
        $user->student_id=$request->get('student_id');
        $user->email=$request->get('email');

        $user->save();

        return redirect('/user/profile');
    }
}
