@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <a href = "{{ URL::to('pdf') }}" class="btn btn-danger"><span class="glyphicon glyphicon-save"></span> Download</a>
            <table class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th class="text-center">Serial</th>
                    <th class="text-center">Name</th>
                    <th class="text-center">User Name</th>
                    <th class="text-center">Penalty</th>
                    <th class="text-center">Solve</th>
                </tr>
                </thead>
                <tbody>
                <?php $i=1?>
                @foreach ($contest_info as $key=>$contest)
                    <tr>
                        <td class="text-center">{{++$key}}</td>
                        <td class="text-center"><a href = "{{ URL::to('contest/profile/'.$contest->user->id) }}">{{$contest->user->fname." ".$contest->user->lname}}</a></td>
                        <td class="text-center"><a href = "{{ URL::to('contest/profile/'.$contest->user->id) }}">{{$contest->user->user_name}}</a></td>
                        <td class="text-center">{{$contest->total_penalty}}</td>
                        <td class="text-center">{{$contest->total_solve}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>
    </div>
@endsection