@extends('layouts.master')

@section('content')
    <div class="btn-group btn-group-justified" role="group" aria-label="...">
        <div class="btn-group" role="group">
            <a href = "{{ URL::to('admin/users/') }}" class="btn btn-default">User</a>
        </div>
        <div class="btn-group" role="group">
            <a href = "{{ URL::to('admin/contests') }}" class="btn btn-default">Contest</a>
        </div>
        <div class="btn-group" role="group">
            <a href = "{{ URL::to('admin/users/notification') }}" class="btn btn-default">Notification</a>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <a href = "{{ URL::to('admin/contests/create') }}" class="btn btn-danger"><span class="glyphicon glyphicon-save"></span> Create Contest</a>
            <table class="table table-bordered ">
                <thead>
                <tr>
                    <th class="text-center">Date</th>
                    <th class="text-center">Contest Name</th>
                    <th class="text-center">Name</th>
                    <th class="text-center">User Name</th>
                    <th class="text-center">Penalty</th>
                    <th class="text-center">Solve</th>
                </tr>
                </thead>
                <tbody>

                @foreach ($contests as $contest)
                    <tr>

                        <td class="text-center">{{date('d-M-Y',strtotime($contest->date))}}</td>
                        <td class="text-center">{{$contest->contest_name}}</td>
                        <td class="text-center">{{$contest->user->fname." ".$contest->user->lname}}</td>
                        <td class="text-center">{{$contest->user->user_name}}</td>
                        <td class="text-center">{{$contest->penalty}}</td>
                        <td class="text-center">{{$contest->solve}}</td>
                        <td><center> <a href = "{{ URL::to('admin/contests/'.$contest->id.'/edit') }}" class="btn btn-danger"><span class="glyphicon glyphicon-pencil"></span> Edit</a>
                                <a href = "{{ action('ContestController@delete', $contest->id) }}" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Delete</a></center></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <center>{!! $contests->links() !!} </center>
        </div>
    </div>
@endsection