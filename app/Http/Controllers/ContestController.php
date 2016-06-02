<?php

namespace App\Http\Controllers;

use App\Contest;
use Illuminate\Http\Request;
use App\User;
use App\Http\Requests;


class ContestController extends Controller
{

    public function index(){
        $contests=Contest::orderBy('date','DESC')->paginate(20);
        return view('contest.index',compact('contests'));
    }
    public function profile($id){
        $users=User::where('id','=',$id)->where('active','=',1)->where('admin_active','=',1)->paginate(20);

        try {
            $handle = User::find($id)->information;
            if ($handle) {
                $handle = $handle->codeforces_handle;
                $url = 'http://codeforces.com/api/user.info?handles=' . $handle;
                $result = file_get_contents($url);
                $response = json_decode($result);
                $datas = $response->result;

            }
        }catch(RequestException $e){

        }

        return view('user.contestprofile',compact('users', 'datas'));
    }

    public function create(){

        $users=User::where('active','=',1)->where('admin_active','=',1)->selectRaw('CONCAT(fname, " ",lname,"(",user_name,")") as full_name,id')->lists('full_name','id');
        //$users=User::all()->lists('fname','id');
        //dd($users);

        return view('contest.create',compact('users'));
    }

    public function store(Request $request){

        $this->validate($request,[
            'date'=>'required',
            'full_name'=>'required',
            'contest_name'=>'required',
            'penalty'=>'required',
            'solve'=>'required'
        ]);

        //dd($request->all());

        $contest=new Contest();
        $contest->user_id=$request->get('full_name');
        $contest->date=date('Y-m-d', strtotime($request->get('date')));
        $contest->contest_name=$request->get('contest_name');
        $contest->penalty=$request->get('penalty');
        $contest->solve=$request->get('solve');
        $contest->save();

        return redirect('/admin/contests');
    }

    public function edit($id){

        $contest=Contest::find($id);
        $users=User::where('active','=',1)->where('admin_active','=',1)->selectRaw('CONCAT(fname, " ",lname,"(",user_name,")") as full_name,id')->lists('full_name','id');
        return view('contest.edit',compact('contest','users'));
    }

    public function update(Request $request,$id){
        //dd($request->all());
        $this->validate($request,[
            'date'=>'required',
            'full_name'=>'required',
            'contest_name'=>'required',
            'penalty'=>'required',
            'solve'=>'required'
        ]);

        $contest=Contest::find($id);
        $contest->user_id=$request->get('full_name');
        $contest->date=date('Y-m-d', strtotime($request->get('date')));
        $contest->contest_name=$request->get('contest_name');
        $contest->penalty=$request->get('penalty');
        $contest->solve=$request->get('solve');
        $contest->save();

        return redirect('/admin/contests');

    }
    public function delete($id){
        $contest=Contest::findOrFail($id);
        $contest->delete();
        return redirect()->back();
    }

}
