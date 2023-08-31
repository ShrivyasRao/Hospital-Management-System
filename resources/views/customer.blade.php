<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Welcome</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <body>
        <nav class="navbar navbar-expand-sm navbar-dark bg-dark shadow p-3 mb-5">
            <a href="{{ url('/home') }}" class="navbar-brand">ABC Pharma</a>
            <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarMenu">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarMenu">
                <ul class="navbar-nav justify-content-end">
                    @if (session('name'))
                        <form action="/logout" method="POST">
                        @csrf
                            <li class="nav-item">
                                <input type="submit" class="btn btn-primary" value="logout"/>
                            </li>
                        </form>
                    @else
                        <li class="nav-item">
                            <a href="{{ url('/logCustomer') }}" class="nav-link">Login</a>
                        </li>
                        
                        <li class="nav-item">
                            <a href="{{ url('/regCustomer') }}" class="nav-link">Register</a>
                        </li>
                    @endif
                </ul>
                <!-- <form class="form-inline ml-auto">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-info my-2 my-sm-0" type="submit">Search</button>
                </form> -->
            </div>
        </nav>
        <div class="container">
        <table class="table">
                        <thead>
                            <tr>
                                <th>S.No</th>
                                <th>Customer name</th>
                                <th>Customer email</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($res as $ind=>$val)
                            <tr>
                                <td>{{ $ind + 1 }}</td>
                                <td>{{ $val->name }}</td>
                                <td>{{ $val->email }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    </div>
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @isset($message)
                        <div class="alert alert-success" role="alert">
                            {{ session('message') }}
                        </div>
                    @endisset
                    <div class="row">
                        <div class="col-md-2">
                            <form action="/addData" method="post">
                                @csrf
                                <button class="btn btn-primary">Insert Record</button>
                            </form>
                        </div>
                        <div class="col-md-10">
                            <form action="/sortAsc/3" method="get">
                                <button class="btn btn-primary">Sort By Name</button>
                            </form>
                        </div>
                    </div>
                    <h1>Customer</h1>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>S.No</th>
                                <th>Customer name</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($res as $ind=>$val)
                            <tr>
                                <td>{{$ind + 1}}</td>
                                <td>{{ $val->name }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row justify-content-center">
    
</div>
@endsection
