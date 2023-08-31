@extends('layouts.userLayout')

@section('title')
Edit medicines
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="/editQry">
                        @csrf
                        @foreach($res as $val)
                        <div class="form-group row">
                            <label for="mnum" class="col-md-4 col-form-label text-md-right">{{ __('Medicine Number') }}</label>

                            <div class="col-md-6">
                                <input id="mnum" type="number" class="form-control @error('mnum') is-invalid @enderror" name="mnum" value="{{ $val->medicine_number }}" required autocomplete="mnum" readonly autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="" class="col-md-4 col-form-label text-md-right">{{ __('Medicine Name') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="mname" value="{{ $val->medicine_name }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Manufacture date') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="date" class="form-control @error('password') is-invalid @enderror" value="{{ $val->manufacture_date }}" name="mdate" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Expiring date') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="date" class="form-control" name="edate" required autocomplete="new-password" value="{{ $val->expiring_date }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Price') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="number" step=".01" min="0" class="form-control" name="price" required autocomplete="new-password" value="{{ $val->price }}">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update') }}
                                </button>
                            </div>
                        </div>
                        @endforeach
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection