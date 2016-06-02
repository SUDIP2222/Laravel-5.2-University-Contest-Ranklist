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
    @foreach ($contest_info as $contest)
        <tr>
            <td class="text-center"><center>{{$i++}}</center></td>
            <td class="text-center"><center>{{$contest->user->fname." ".$contest->user->lname}}</center></td>
            <td class="text-center"><center>{{$contest->user->user_name}}</center></td>
            <td class="text-center"><center>{{$contest->total_penalty}}</center></td>
            <td class="text-center"><center>{{$contest->total_solve}}</center></td>
        </tr>
    @endforeach
    </tbody>
</table>

</body>
</html>