<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="{{ @asset('assets/bootstrap/bootstrap.min.css') }}" >
    <link rel="stylesheet" href="{{ @asset('assets/fontawesome/css/all.min.css') }}" >
    <link rel="shortcut icon" href="{{@asset('assets/images/favicon.png')}}" type="image/png">


    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>NOTES</title>
</head>
<body>
    
    @yield('content')

    <script src="{{ @asset('assets/bootstrap/bootstrap.bundle.min.js') }}" ></script>
</body>
</html>