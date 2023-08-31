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
                    
                    <h1>Connections</h1>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>S.No</th>
                                <th>Pharmacist email</th>
                                <th>Customer email</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($res as $ind=>$val)
                            <tr>
                                <td>{{$ind + 1}}</td>
                                <td>{{ $val->pharma_email }}</td>
                                <td>{{ $val->cust_email }}</td>
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
