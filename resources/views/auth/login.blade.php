@extends('layouts.main')
@push('styles')

@endpush

@section('container')
<div id="Login" class="mt-4">
    <div class="row justify-content-center mb-3">
        <div class="col-6 text-center ">
            <h3>Login Form</h3>
        </div>
    </div>
    <div class="row mb-3 justify-content-center">
        <div class="col-6">
            <form action="/login" method="POST">
                @csrf
                @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                @if (session()->has('loginError'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('loginError') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <div class="form-group">
                    <label for="email">Email </label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" aria-describedby="email" name="email">
                    @error('email')
                    <div class="invalid-feedback d-block">
                      {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" aria-describedby="password" name="password"
                    >
                    @error('password')
                    <div class="invalid-feedback d-block">
                      {{$message}}
                    </div>
                    @enderror
                </div>
                <small>Jika tidak memiliki account bisa hubungi administator dulu !!! </small>
                <div class="col-6 mt-5">
                    <button type="submit" class="button-style-secondary" >Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection