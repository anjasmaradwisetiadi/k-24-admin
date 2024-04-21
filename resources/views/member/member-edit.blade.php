@extends('layouts.main')
@push('styles')
    <link href="{{ asset('css/member/member-edit.css') }}" rel="stylesheet">
@endpush

@section('container')
<div id="Member-Edit" class="mt-4 mb-5">
    <div class="row justify-content-center">
        <div class="col-6 text-center">
            <h3>{{$active === 'administator' ? 'Administator Edit' : 'Member Edit'}}</h3>
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
        <form action="{{$active === 'administator' ? route('administator.update', $user->id) :  route('member.update', $user->id) }} " method="post" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="name">Name*</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" aria-describedby="name" value="{{old('name',$user->name)}}">
                @error('name')
                <div class="invalid-feedback d-block">
                  {{$message}}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="no_ktp">No KTP*</label>
                <input type="text" class="form-control @error('no_ktp') is-invalid @enderror" id="no_ktp" name="no_ktp" aria-describedby="no_ktp" value="{{old('no_ktp', $user->no_ktp)}}">
                @error('no_ktp')
                <div class="invalid-feedback d-block">
                  {{$message}}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="email">Email*</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" aria-describedby="email" value="{{old('email', $user->email)}}" readonly>
                @error('email')
                <div class="invalid-feedback d-block">
                  {{$message}}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="no_hp">No Handphone*</label>
                <input type="text" class="form-control @error('no_hp') is-invalid @enderror" id="no_hp" name="no_hp" aria-describedby="no_hp" value="{{old('no_hp', $user->no_hp)}}">
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
                        @if(old('gender', ($user->gender === 'female'))) checked @endif
                    >
                    <label class="custom-control-label" for="female">Female</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="male" name="gender" class="custom-control-input" value="male"
                    @if(old('gender', ($user->gender === 'male'))) checked @endif
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
                <input type="date" class="form-input-file @error('date_birth') is-invalid @enderror" id="date_birth" name="date_birth" aria-describedby="date_birth" value="{{old('date_birth', $user->date_birth)}}">
                @error('date_birth')
                <div class="invalid-feedback d-block">
                  {{$message}}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="position">Position*</label>
                <select class="custom-select mr-sm-2 @error('position') is-invalid @enderror" id="position" name="position">
                    <option value="administator" {{ old('position', $user->position) === 'administator' ? 'selected': '' }}>Administator</option>
                    <option value="member" {{ old('position', $user->position) === 'member'? 'selected': ''  }}>Member</option>
                  </select>
                @error('position')
                <div class="invalid-feedback d-block">
                  {{$message}}
                </div>
                @enderror
            </div>
            <div class="form-group ">
                <div class="">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="rePassword"  >
                    <label class="form-check-label" for="gridCheck1">
                      Change Password ?
                    </label>
                  </div>
                  <div>
                    <input type="hidden" type="text"  name='rePasswordConfirm' id="rePasswordConfirm" value="unchecked">
                  </div>
                </div>
              </div>
              <div class="mb-2">
                  <div class="collapse" id="collapseRePassword">
                    <div class="card-trap-spell-preview wrap-card-currently">
                        <div class="form-group">
                            <label for="password">Old Password*</label>
                            <div class="input-group mb-3" id="show_hide_password">
                                <div class="input-group-prepend">
                                    <div class="input-group-text pointer" onclick="oldPassword()">
                                            <span class="material-icons ">
                                                visibility_off
                                            </span>
                                    </div>
                                </div>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" id="oldPassword" aria-describedby="password" name="oldPassword">
                            </div>
                        </div>
                        <div class="invalid-feedback" id="invalid-feedback">
                            Unsuccessfull validate old password
                        </div>

                        <div class="form-group">
                            <label for="password">New Password*</label>
                            <div class="input-group mb-3" id="show_hide_password_new">
                                <div class="input-group-prepend">
                                    <div class="input-group-text pointer" onclick="newPassword()">
                                            <span class="material-icons ">
                                                visibility_off
                                            </span>
                                    </div>
                                </div>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" id="newPassword" aria-describedby="password" name="password">
                            </div>
                        </div>
                        <div class="invalid-feedback" id="need-new-password">
                            Please input new password
                        </div>
                        <div class="mb-2">
                            <div class="valid-feedback" id="valid-feedback">
                                Successfull validate old password
                            </div>
                            <div class="text-light d-hidden" role="status" id="loading">
                                <span class="sr-only">Loading...</span>
                            </div>
                        </div>
                        <div>
                            <button type='button' class="button-style-primary" onclick="checkPassword()" > Check Password </button>
                        </div>
                    </div>
                  </div>
              </div>

            <div class="form-group" style="display: block;">
                <label for="photo" class="d-block">Uplod Photo*</label>
                {{--********* it is hidden image --}}
                <input type="hidden" name="oldPhoto" type="file" value="{{$user->photo}}">
                <input type="file" class="form-input-file " id="photo" name="photo" aria-describedby="photo" accept="image/*"
                    onchange="imagePreview()"
                >
                @error('photo')
                <div class="invalid-feedback d-block">
                  {{$message}}
                </div>
                @enderror
                @if ($user->photo)
                <img class="photo-preview image-fluid mt-2 image-style-preview" src="{{$user->photo}}">
                @else    
                <img class="photo-preview mt-2">
                @endif
            </div>
            <button type="submit" class="button-style-primary mr-2" id="submit" >Submit</button>
            {{-- <button type="button" class="button-style-primary mr-2" onclick="payloadUser()">Payload</button> --}}
        </form>
    </div>
</div>
<script>
    const checkbox = document.getElementById('rePassword');

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


    checkbox.addEventListener('change', (event) => {
        const buttonSubmit = document.querySelector('#submit');
        const rePasswordConfirm = document.querySelector('#rePasswordConfirm');
        const collapseRePassword = document.querySelector('#collapseRePassword');
        let myCollapse = new bootstrap.Collapse(collapseRePassword); 
        if (event.currentTarget.checked) {
            rePasswordConfirm.value = 'checked';
            buttonSubmit.setAttribute('disabled', ''); 
            myCollapse;
        } else {
            rePasswordConfirm.value = 'unchecked';
            buttonSubmit.removeAttribute('disabled');
            myCollapse;
        }
    })

    function oldPassword(){
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

    function newPassword(){
        var buttonVisibility = document.querySelector("#show_hide_password_new span");
        var input = document.querySelector("#show_hide_password_new input");

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

    function checkPassword(){
        const newPassword = document.getElementById('newPassword');
        const oldPassword = document.getElementById('oldPassword');
        const invalidFeedback = document.getElementById('invalid-feedback');
        const validFeedback = document.getElementById('valid-feedback');
        const buttonSubmit = document.getElementById('submit');
        const needNewPassword = document.getElementById('need-new-password');

        const email = document.getElementById('email');
        const loading = document.getElementById('loading');

        invalidFeedback.classList.remove('d-block');
        validFeedback.classList.remove('d-block');
        loading.classList.add('spinner-border');
        needNewPassword.classList.add('d-block');
        console.log('need-new-password = ');
        if(newPassword.value){
            needNewPassword.classList.remove('d-block');
            axios({
                method: 'post',
                url: '/user/confirm-password',
                data: {
                    email: email.value,
                    oldPassword: oldPassword.value,
                    newPassword: newPassword.value,
                },
            })
            .then((response)=>{
                if(response.data.status){
                    validFeedback.classList.add('d-block');
                    invalidFeedback.classList.remove('d-block');
                    buttonSubmit.removeAttribute('disabled');
                } else {
                    invalidFeedback.classList.add('d-block');
                    validFeedback.classList.remove('d-block');
                    buttonSubmit.setAttribute('disabled', ''); 
                }
                loading.classList.remove('spinner-border');
            })
            .catch((error)=>{
                invalidFeedback.classList.add('d-block');
                validFeedback.classList.remove('d-block');
                buttonSubmit.setAttribute('disabled', ''); 
                loading.classList.remove('spinner-border');
            })
        } else {
            needNewPassword.classList.add('d-block');
            loading.classList.remove('spinner-border');
            buttonSubmit.setAttribute('disabled', ''); 
        }
    }

</script>
@endsection