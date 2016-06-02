<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Contest;
use App\User;
use App;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        return view('home');
    }


    public function home(){

        $contest_info = Contest::groupBy('user_id')
                ->selectRaw('user_id,sum(penalty) as total_penalty ,sum(solve) as total_solve' )
                ->orderBy('total_solve', 'DESC')
                ->orderBy('total_penalty', 'ASC')
                ->paginate(20);

        // dd($contest_info);
        return view('contest.home',compact('contest_info'));
    }


    public function pdf(){
        $contest_info = Contest::groupBy('user_id')
            ->selectRaw('user_id,sum(penalty) as total_penalty ,sum(solve) as total_solve' )
            ->orderBy('total_solve', 'DESC')
            ->orderBy('total_penalty', 'ASC')
            ->get();
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadview('contest.pdf',compact('contest_info'));
        return $pdf->download('Ranklist.pdf');
    }

    public function profilepdf($id){
        $users=User::where('id','=',$id)->where('active','=',1)->where('admin_active','=',1)->get();

        foreach ($users as $user) {
            $name = $user->fname.'-'.$user->lname.'('.$user->user_name.')-'.$user->student_id;
        }
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadview('contest.profilepdf',compact('users'));
        return $pdf->download($name.'.pdf');
    }
}
