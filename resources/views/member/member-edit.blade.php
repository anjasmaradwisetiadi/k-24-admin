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
                <label for="name">Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" aria-describedby="name" value="{{old('name',$user->name)}}">
                @error('name')
                <div class="invalid-feedback d-block">
                  {{$message}}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="no_ktp">No KTP</label>
                <input type="text" class="form-control @error('no_ktp') is-invalid @enderror" id="no_ktp" name="no_ktp" aria-describedby="no_ktp" value="{{old('no_ktp', $user->no_ktp)}}">
                @error('no_ktp')
                <div class="invalid-feedback d-block">
                  {{$message}}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" aria-describedby="email" value="{{old('email', $user->email)}}">
                @error('email')
                <div class="invalid-feedback d-block">
                  {{$message}}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="no_hp">No Handphone</label>
                <input type="text" class="form-control @error('no_hp') is-invalid @enderror" id="no_hp" name="no_hp" aria-describedby="no_hp" value="{{old('no_hp', $user->no_hp)}}">
                @error('no_hp')
                <div class="invalid-feedback d-block">
                  {{$message}}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="gender" class="d-block">Gender</label>
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
                <label for="date_birth" class="d-block">Date Birth</label>
                <input type="date" class="form-input-file @error('date_birth') is-invalid @enderror" id="date_birth" name="date_birth" aria-describedby="date_birth" value="{{old('date_birth', $user->date_birth)}}">
                @error('date_birth')
                <div class="invalid-feedback d-block">
                  {{$message}}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="position">Position</label>
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
            <div class="form-group" style="display: block;">
                <label for="photo" class="d-block">Uplod Photo</label>
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
            <button type="Submit" class="button-style-primary mr-2">Submit</button>
            <button type="button" class="button-style-primary mr-2" onclick="payloadUser()">Payload</button>
        </form>
    </div>
</div>
<script>
    function payloadUser(){
        $('#name').val('Prasetyo Kurawa');
        $('#no_ktp').val('1111745605050309');
        $('#email').val('enteng.prasetyo@example.net');
        $('#no_hp').val('022 0862 600');
        $('#gender').val('male');
        $('#date_birth').val('23-02-2023');
        $('#position').val('member');
        $('#password').val('memberdefault');
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

</script>
@endsection