<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <base href="./../">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="author" content="Łukasz Holeczek">
    <title>Myanma Alinn</title>
    <!-- Icons-->
    <link href="{{ asset('vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- Main styles for this application-->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<style media="print">
    .hide {
        display: none;
    }

    body {
        background-color: #ffffff;
    }
</style>

<body>
    <div class="container-fluid">
        <div class="my-4">
            <h1 class="text-center">မြန်မာ့အလင်းသတင်းစာတိုက် </h1>
        </div>
        <div>
            <a onclick="window.print(); return false;" " class="btn btn-danger pull-right m-1"><span class="fa fa-file-pdf-o"></span></a>
            <a href="{{ url('/timeframe') }}" class="btn btn-warning pull-right m-1"><span class="fa fa-arrow-left"></span> GO BACK</a>
        </div>
        @yield('content', 'this is default value')

    </div>
</body>
</html>
