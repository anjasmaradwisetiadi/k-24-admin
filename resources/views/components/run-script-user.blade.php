@extends('layouts.main')

@section('container')
    <div id="run-script-user" class="mt-4 mb-5">
        <div class="row">
            <div class="col">
                @include('components.message-alert')
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <p class="text-center">
                <a href="/" class="btn btn-primary" role="button">
                    Back
                </a>
            </p>
        </div>
    </div>
@endsection