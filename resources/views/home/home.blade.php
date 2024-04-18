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
                <p class="mt-5">
                    Welcome , <b>{Username}</b> 
                </p>
                <p>
                    You login as <b>{position}</b> 
                </p>
            </div>
        </div>
    </div>
</div>
@endsection