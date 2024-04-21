@extends('layouts.main')
@push('styles')
    <link href="{{ asset('css/member/member-create.css') }}" rel="stylesheet">
@endpush

@section('container')
<div id="Member-Create" class="mt-4 mb-5">
    <div class="row justify-content-center">
        <div class="col-6 text-center">
            <h3>User Create</h3>
        </div>
    </div>
    <div class="row mb-2">
        <div class="col d-flex justify-content-end">
            <a href="{{$active === 'administator' ? '/administator' : '/member'}}" class="add-new-counter-link">
                <button type="button" class="button-style-secondary">Kembali</button>
            </a>
        </div>
    </div>
    <div class="form-create">
        <form action="{{$active === 'administator' ? route('administator.store') :  route('member.store') }} " method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Name*</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" aria-describedby="name" value="{{old('name')}}">
                @error('name')
                <div class="invalid-feedback d-block">
                  {{$message}}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="no_ktp">No KTP*</label>
                <input type="text" class="form-control @error('no_ktp') is-invalid @enderror" id="no_ktp" name="no_ktp" aria-describedby="no_ktp" value="{{old('no_ktp')}}">
                @error('no_ktp')
                <div class="invalid-feedback d-block">
                  {{$message}}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="email">Email*</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" aria-describedby="email" value="{{old('email')}}">
                @error('email')
                <div class="invalid-feedback d-block">
                  {{$message}}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="no_hp">No Handphone*</label>
                <input type="text" class="form-control @error('no_hp') is-invalid @enderror" id="no_hp" name="no_hp" aria-describedby="no_hp" value="{{old('no_hp')}}">
                @error('no_hp')
                <div class="invalid-feedback d-block">
                  {{$message}}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="gender" class="d-block">Gender*</label>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="female" name="gender" class="custom-control-input" value="female"
                        @if(old('gender')) checked @endif
                    >
                    <label class="custom-control-label" for="female">Female</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="male" name="gender" class="custom-control-input" value="male"
                    @if(old('gender')) checked @endif
                    >
                    <label class="custom-control-label" for="male">Male</label>
                </div>
                @error('gender')
                <div class="invalid-feedback d-block">
                  {{$message}}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="date_birth" class="d-block">Date Birth*</label>
                <div class="input-group mb-3">
                    <input type="date" class="form-input-file @error('date_birth') is-invalid @enderror" id="date_birth" name="date_birth" aria-describedby="date_birth" value="{{old('date_birth')}}">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <span class="material-icons ">
                                calendar_month
                            </span>
                        </div>
                    </div>
                </div>
                @error('date_birth')
                <div class="invalid-feedback d-block">
                  {{$message}}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="position">Position*</label>
                <select class="custom-select mr-sm-2 @error('position') is-invalid @enderror" id="position" name="position">
                    <option value ="" {{ old('position') === ''? 'selected':'' }} selected disabled>Position Selected</option>
                    <option value="administator" {{ old('position') === 'administator' ? '': 'selected' }}>Administator</option>
                    <option value="member" {{ old('position') === 'member'? '': 'selected' }}>Member</option>
                  </select>
                @error('position')
                <div class="invalid-feedback d-block">
                  {{$message}}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="password">Password*</label>
                <div class="input-group mb-3" id="show_hide_password">
                    <div class="input-group-prepend">
                        <div class="input-group-text pointer" onclick="visibility()">
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
            <div class="form-group" style="display: block;">
                <label for="photo" class="d-block">Uplod Photo*</label>
                <input type="file" class="form-input-file " id="photo" name="photo" aria-describedby="photo" accept="image/*"
                    onchange="imagePreview()"
                >
                <img class="photo-preview image-fluid mt-2">
                @error('photo')
                <div class="invalid-feedback d-block">
                  {{$message}}
                </div>
                @enderror
            </div>
            <button type="Submit" class="button-style-primary mr-2">Submit</button>
            {{-- <button type="button" class="button-style-primary mr-2" onclick="payloadUser()">Payload</button> --}}
        </form>
    </div>
</div>
<script>
    // const flatpickr = require("flatpickr");

    const noKtp = document.getElementById('no_ktp');
    const noHp = document.getElementById('no_hp');
    const dateBirth = document.getElementById('date_birth');

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

    function imagePreview(){
          const imageDisplay = document.querySelector('.photo-preview');
          const imageData = document.querySelector('#photo');

          imageDisplay.style.display = 'block';
          imageDisplay.style.height = '150px';
          imageDisplay.style.width = '120px';

          const ofReader = new FileReader();
          ofReader.readAsDataURL(imageData.files[0]);

          ofReader.onload = function(event){
            imageDisplay.src = event.target.result
          }
    }

    noKtp.addEventListener('keyup', (event)=> {
        noKtp.value = event.target.value.replace(/[^0-9]/g, '');
    })
    noHp.addEventListener('keyup', (event)=> {
        noHp.value = event.target.value.replace(/[^0-9]/g, '');
    })

    flatpickr('#date_birth', {
        "maxDate": new Date()
    });

</script>    
@endsection