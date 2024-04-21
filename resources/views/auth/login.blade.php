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
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" aria-describedby="email" name="email" value="{{old('email')}}">
                    @error('email')
                    <div class="invalid-feedback d-block">
                      {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <div class="input-group mb-3" id="show_hide_password">
                        <div class="input-group-prepend">
                            <div class="input-group-text pointer">
                                    <span class="material-icons ">
                                        visibility_off
                                    </span>
                            </div>
                        </div>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" aria-describedby="password" name="password">
                    </div>
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
<script>
    function visibility(){
        var buttonVisibility = document.querySelector("#show_hide_password span");
        var input = document.querySelector("#show_hide_password input");

        if(input.getAttribute('type') === 'text'){
            input.setAttribute('type', 'password'); 
            buttonVisibility.innerHTML = 'visibility';
            buttonVisibility.innerHTML = 'visibility_off';
        } else if(input.getAttribute('type') === 'password'){
            input.setAttribute('type', 'text'); 
            buttonVisibility.innerHTML = 'visibility_off';
            buttonVisibility.innerHTML = 'visibility';
        }
    }
</script>
@endsection