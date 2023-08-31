@extends('layouts.app')

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
                        <div class="col-md-4">
                            <form action="/sortAsc/3" method="get">
                                <button class="btn btn-primary">Sort By Name</button>
                            </form>
                        </div>
                        <div class="col-md-3">
                            <form action="/viewCon" method="get">
                                <button class="btn btn-primary">View Customer Connections</button>
                            </form>
                        </div>
                        <div class="col-md-3">
                            <form action="/addCon" method="get">
                                <button class="btn btn-primary">Add Customer Connection</button>
                            </form>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <form action="/min" method="get">
                                <button class="btn btn-primary">Min Price</button>
                            </form>
                        </div>
                        <div class="col-md-6">
                            <form action="/max" method="get">
                                <button class="btn btn-primary">Max Price</button>
                            </form>
                        </div>
                    </div>
                    <div class="container">
                        @if (session('error'))
                            <div class="alert alert-danger">{{ session('error') }}</div>
                        @endif
                    </div>
                    <h1>Medicines Available</h1>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>S.No</th>
                                <th>Medicine name</th>
                                <th>Manufacture date</th>
                                <th>Expiring date</th>
                                <th>Price</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($res as $ind=>$val)
                            <tr>
                                <td>{{$ind + 1}}</td>
                                <td>{{ $val->medicine_name }}</td>
                                <td>{{ $val->manufacture_date }}</td>
                                <td>{{ $val->expiring_date }}</td>
                                <td>{{ $val->price }}</td>
                                <td><a href="/edit/{{$val->medicine_number}}" class="btn btn-success">EDIT</a></td>
                                <td><a href="/delete/{{$val->medicine_number}}" class="btn btn-danger" onclick="return confirm('Are you sure?');">DELETE</a></td>
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
