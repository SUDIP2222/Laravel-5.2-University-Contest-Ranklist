@extends('layouts.master')

@section('content')

    <div class="container">
        <div class="row">
            @foreach ($users as $user)
                <div class="col-md-3 col-md-3">
                    @if(isset($datas))
                        @foreach($datas as $data)
                            <a href="#" class="thumbnail">
                                <img src="{{$data->titlePhoto}}">
                            </a>
                         @endforeach
                    @else
                        <a href="#" class="thumbnail">
                            <img src="{{$user->getAvatarUrl()}}">
                        </a>
                    @endif
                    <h3><strong>{{$user->fname." ".$user->lname}}</strong></h3>
                    <h3>{{$user->user_name}}</h3>
                    <hr>
                    <h5><span class="glyphicon glyphicon-envelope"></span> {{ $user->email}}<br><br></h5>
                    <h5><span class="glyphicon glyphicon-phone"></span> {{ $user->phone}}</h5>
                    <hr>
                    <h5><span class="glyphicon glyphicon-education"></span> {{ $user->university}} <br><br></h5>
                    <h5> <span class="glyphicon glyphicon-blackboard"></span> {{ $user->department}} <br><br></h5>
                    <h5><span class="glyphicon glyphicon-pencil"></span> {{ $user->student_id}} </h5>
                    <hr>
                </div>
            @endforeach



            <div class="col-md-9 col-md-12">
                @foreach ($users as $user)
                    <a href = "{{ URL::to('profilepdf/'.$user->id) }}" class="btn btn-danger"><span class="glyphicon glyphicon-save"></span> Download</a>
                @endforeach
                    @if(isset($datas))
                        @foreach($datas as $data)
                            @if(isset($data->rating))
                            <a href = "" class="btn btn-danger"><span class=""></span> CodeForces Rank : {{$data->rating }}</a>
                            @endif
                        @endforeach
                    @endif
                <table class="table table-bordered ">
                    <thead>
                    <tr>
                        <th class="text-center">Date</th>
                        <th class="text-center">Contest Name</th>
                        <th class="text-center">Penalty</th>
                        <th class="text-center">Solve</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($users as $user)
                        @foreach ($user->contests as $contest)
                            <tr>
                                <td class="text-center">{{date('d-M-Y',strtotime($contest->date))}}</td>
                                <td class="text-center">{{$contest->contest_name}}</td>
                                <td class="text-center">{{$contest->penalty}}</td>
                                <td class="text-center">{{$contest->solve}}</td>
                            </tr>
                        @endforeach
                    @endforeach
                    </tbody>
                </table>
                 {!! $users->links() !!}
            </div>
        </div>
    </div>

@endsection