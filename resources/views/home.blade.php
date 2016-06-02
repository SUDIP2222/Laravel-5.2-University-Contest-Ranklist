<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link href="asset/fullpage/jquery.fullPage.css" rel="stylesheet">
    <link href="asset/fullpage/home.css" rel="stylesheet">
    <script src="asset/jquery/jquery.js"></script>
    <link rel="stylesheet" type="text/css" href="asset/al/dist/sweetalert.css">
    <script src="asset/fullpage/jquery.fullPage.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#fullpage').fullpage({
                sectionsColor: ['#2f7ddb', '#FAC832', '#B01414'],
                css3: true,
                navigation: true,
                loopBottom: true
            });
        });
    </script>
</head>
<body>
    <div id="header">
        <div id="login">
            <a href="/login" class="login button">Sign In</a>
            <a href="/registration" class="register button">Sign Up</a>
        </div>
    </div>

    <div id="fullpage">
        <div class="section" id="section1">
            <div class="section-text">
                <img class="icon" id="img1" src="asset/img/a.png">
                <h1><center>Think.</center></h1>
            </div>
        </div>
        <div class="section" id="section2">
            <div class="section-text">
                <img class="icon" id="img2" src="asset/img/c.png">
                <h1>Create.</h1>
            </div>
        </div>
        <div class="section" id="section3">
            <div class="section-text">
                <img class="icon" id="img3" src="asset/img/m.png">
                <h1>Solve.</h1>
            </div>
        </div>
    </div>

    <script src="asset/al/dist/sweetalert.min.js"></script>
    @if (notify()->ready())
        <script>
            swal({
                title: "{!! notify()->message() !!}",
                text: "{!! notify()->option('text') !!}",
                type: "{{ notify()->type() }}",
                @if (notify()->option('timer'))
                timer: {{ notify()->option('timer') }},
                showConfirmButton: false
                @endif
            });
        </script>
    @endif
</body>
</html></html>