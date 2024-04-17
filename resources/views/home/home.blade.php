@extends('layouts.main')
@push('styles')
    <link href="{{ asset('css/home.css') }}" rel="stylesheet">
@endpush

@section('container')
<div id="Category-Crud-Create">
    <div class="row">
        <div class="col d-flex justify-content-center page-not-found">
            <div>
                <h2 class="mb-2">Dashboard</h2>
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