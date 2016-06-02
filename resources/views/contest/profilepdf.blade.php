<!DOCTYPE html>
<html>
<head>
    <style>
        table, td, th {
            border: 1px solid black;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }
        tr:nth-child(even){background-color: #f2f2f2}

        th {
            background-color: #4CAF50;
            height: 50px;
        }
    </style>
</head>
<body>

@foreach ($users as $user)

        <h3><strong>{{$user->fname." ".$user->lname}}</strong></h3>
        <h3>{{$user->user_name}}</h3>
        <hr>
        <h5><span class="glyphicon glyphicon-envelope"></span> {{ $user->email}}</h5>
        <h5><span class="glyphicon glyphicon-phone"></span> {{ $user->phone}}</h5>
        <hr>
        <h5><span class="glyphicon glyphicon-education"></span> {{ $user->university}} </h5>
        <h5> <span class="glyphicon glyphicon-blackboard"></span> {{ $user->department}}</h5>
        <h5><span class="glyphicon glyphicon-pencil"></span> {{ $user->student_id}} </h5>
        <hr>

@endforeach

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
                <td class="text-center"><center>{{date('d-M-Y',strtotime($contest->date))}}</center></td>
                <td class="text-center"><center>{{$contest->contest_name}}</center></td>
                <td class="text-center"><center>{{$contest->penalty}}</center></td>
                <td class="text-center"><center>{{$contest->solve}}</center></td>
            </tr>
        @endforeach
    @endforeach
    </tbody>
</table>

</body>
</html>