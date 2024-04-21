@extends('layouts.main')
@push('styles')
    <link href="{{ asset('css/home.css') }}" rel="stylesheet">
@endpush

@section('container')
<div id="Category-Crud-Create">
    <div class="row justify-content-center">
        <div class="col-6 text-center">
            <h3>Dashboard</h3>
        </div>
    </div>
    <div class="row">
        <div class="col">
            @include('components.message-alert')
        </div>
    </div>
    <div class="row">
        <div class="col d-flex justify-content-center page-not-found">
            <div>
                <h5 class="mt-5 mb-3">
                    Welcome , <b class="name-user">{{auth()->user()->name}}</b> 
                </h5>
                <h5>
                    You login as <b class="position-user"> {{auth()->user()->position}}</b> 
                </h5>
            </div>
        </div>
    </div>
</div>
@endsection