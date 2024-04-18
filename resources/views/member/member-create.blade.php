@extends('layouts.main')
@push('styles')
    <link href="{{ asset('css/member/member-create.css') }}" rel="stylesheet">
@endpush

@section('container')
<div id="Member-Create" class="mt-4 mb-5">
    <div class="row justify-content-center">
        <div class="col-6 text-center">
            <h3>Member Create</h3>
        </div>
    </div>
    <div class="row mb-2">
        <div class="col d-flex justify-content-end">
            <a href="/member" class="add-new-counter-link">
                <button type="button" class="button-style-secondary">Kembali</button>
            </a>
        </div>
    </div>
    <div class="form-create">
        <form action="/member" method="post">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" aria-describedby="name" >
                {{-- <small v-if="!responseGeneral?.status" class="form-text invalid-feedback">{{responseGeneral?.message?.title ? responseGeneral?.message?.title[0] : ''}}</small> --}}
            </div>
            <div class="form-group">
                <label for="no_ktp">No KTP</label>
                <input type="text" class="form-control" id="no_ktp" name="no_ktp" aria-describedby="no_ktp" >
                {{-- <small v-if="!responseGeneral?.status" class="form-text invalid-feedback">{{responseGeneral?.message?.title ? responseGeneral?.message?.title[0] : ''}}</small> --}}
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" aria-describedby="email" >
                {{-- <small v-if="!responseGeneral?.status" class="form-text invalid-feedback">{{responseGeneral?.message?.title ? responseGeneral?.message?.title[0] : ''}}</small> --}}
            </div>
            <div class="form-group">
                <label for="gender">Gender</label>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="female" name="female" class="custom-control-input">
                    <label class="custom-control-label" for="female">Female</label>
                  </div>
                  <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="male" name="male" class="custom-control-input">
                    <label class="custom-control-label" for="male">Male</label>
                  </div>
                {{-- <small v-if="!responseGeneral?.status" class="form-text invalid-feedback">{{responseGeneral?.message?.title ? responseGeneral?.message?.title[0] : ''}}</small> --}}
            </div>
            <div class="form-group">
                <label for="date_birth">Date Birth</label>
                <input type="date" class="form-control" id="date_birth" name="date_birth" aria-describedby="date_birth" >
                {{-- <small v-if="!responseGeneral?.status" class="form-text invalid-feedback">{{responseGeneral?.message?.title ? responseGeneral?.message?.title[0] : ''}}</small> --}}
            </div>
            <div class="form-group">
                <label for="position">Position</label>
                <select class="custom-select mr-sm-2" id="position">
                    <option selected>Position Selected</option>
                    <option value="administator">Administator</option>
                    <option value="member">Member</option>
                  </select>
                {{-- <small v-if="!responseGeneral?.status" class="form-text invalid-feedback">{{responseGeneral?.message?.title ? responseGeneral?.message?.title[0] : ''}}</small> --}}
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" aria-describedby="password" >
                {{-- <small v-if="!responseGeneral?.status" class="form-text invalid-feedback">{{responseGeneral?.message?.title ? responseGeneral?.message?.title[0] : ''}}</small> --}}
            </div>
            <div class="form-group" style="display: block;">
                <div for="photo">Uplod Photo</div>
                <input type="file" class="form-input-file" id="photo" name="photo" aria-describedby="photo" accept="image/*">
                {{-- <div>
                    Preview Image
                </div> --}}
                {{-- <small v-if="!responseGeneral?.status" class="form-text invalid-feedback">{{responseGeneral?.message?.title ? responseGeneral?.message?.title[0] : ''}}</small> --}}
            </div>
            <button type="Submit" class="button-style-primary mr-2">Submit</button>
        </form>
    </div>
</div>
@endsection