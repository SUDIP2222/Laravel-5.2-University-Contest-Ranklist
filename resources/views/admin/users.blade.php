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

            <table class="table table-bordered ">
                <thead>
                <tr>
                    <th class="text-center">Student Id</th>
                    <th class="text-center">Name</th>
                    <th class="text-center">Email</th>
                    <th class="text-center">Department</th>
                    <th class="text-center">University</th>
                    <th class="text-center">cell</th>
                    <th class="text-center">Role</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td class="text-center">{{$user->student_id}}</td>
                        <td class="text-center">{{$user->fname." ".$user->lname}}</td>
                        <td class="text-center">{{$user->email}}</td>
                        <td class="text-center">{{$user->department}}</td>
                        <td class="text-center">{{$user->university}}</td>
                        <td class="text-center">{{$user->phone}}</td>
                        <td class="text-center">{{$user->is_a}}</td>
                        <td><center> <a href = "{{ URL::to('admin/users/'.$user->id.'/edit') }}" class="btn btn-danger"><span class="glyphicon glyphicon-pencil"></span> Edit</a>
                                <a href = "{{ action('UserController@delete', $user->id) }}" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Delete</a></center></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
           {{-- {!! $users->links() !!}  --}}
        </div>
    </div>
@endsection