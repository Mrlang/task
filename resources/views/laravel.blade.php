@extends('layouts.app')
<!DOCTYPE html>
<html>
<head>
    <title>Laravel</title>

    <style>
        html, body {
            height: 100%;
        }

        body {
            margin: 0;
            padding: 0;
            width: 100%;
            display: table;
            font-weight: 100;
            font-family: 'Lato';
        }
        .container {
            text-align: center;
            display: table-cell;
            vertical-align: middle;
        }

         .content {
             text-align: center;
             display: inline-block;
         }

        .title {
            font-size: 96px;
        }
    </style>
</head>
<body>
@section('content')
<div class="container">
    <div class="content">
        <div class="title">Task Manage System</div>
        <p>戴思颖 2014211434</p>
    </div>
</div>
</body>
</html>
@endsection
