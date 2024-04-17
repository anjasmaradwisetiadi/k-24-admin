@extends('layouts.main')
@push('styles')

@endpush

@section('container')
<div id="Error-404">
    <div class="row">
        <div class="col d-flex justify-content-center page-not-found">
            <div class="justify-content-center">
                <h2>Page not Found </h2>
                <p class="mt-3 text-center">
                    Please back to page
                </p>
                <p class="text-center">
                    <a href="/" class="btn btn-primary" role="button">
                        Back
                    </a>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection