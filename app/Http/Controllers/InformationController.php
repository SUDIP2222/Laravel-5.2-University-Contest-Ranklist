<?php

namespace App\Http\Controllers;

use App\Information;
use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;

class InformationController extends Controller
{
    public function create(){

        return view('information.create');
    }

    public function store(Request $request){
        $this->validate($request,[
            'codeforces_handle'=>'required|unique:informations',

        ]);

        $info=Information::find(Auth::user()->id);

        if(count($info)<=0) {
            $information = new Information();
            $information->user_id = Auth::user()->id;
            $information->codeforces_handle = $request->get('codeforces_handle');
            $information->save();
        }
        return redirect('/user/profile');
    }
}
