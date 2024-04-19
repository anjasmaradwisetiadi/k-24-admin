@extends('layouts.main')
@push('styles')
    <link href="{{ asset('css/member/member-detail.css') }}" rel="stylesheet">
@endpush

@section('container')
<div id="Member-Detail" class="mt-4 mb-5">
    <div class="row justify-content-center">
        <div class="col-6 text-center">
            <h3>{{$active === 'administator' ? 'Administator Detail' : 'Member Detail'}}</h3>
        </div>
    </div>
    <div class="row justify-content-center mt-4">
        <div class="col-9">
            <div class="row mb-2">
                <div class="col">
                    @if (isset(auth()->user()->position) ? auth()->user()->position === 'administator' : false)
                    <a href="/member/{{$user->id}}/edit" class="add-new-counter-link">
                        <button type="button" class="button-style-primary mr-2">Edit Member</button>
                    </a>
                    <a class="add-new-counter-link">
                        <form action="{{$active === 'administator' ?  route('administator.destroy', $user->id) :  route('member.destroy', $user->id) }}" method="post" style="display: inline">
                            @method('delete')
                            @csrf
                            <button type="submit" class="button-style-primary" onclick="return confirm('Are you Sure want delete it ?')" 
                                {{auth()->user()->email === $user->email ? 'disabled' : '' }}> 
                                Delete Member
                            </button>
                        </form>
                    </a>
                    @endif
                </div>
                <div class="col d-flex justify-content-end">
                    <a href="{{$active === 'administator' ? '/administator' : '/member'}}" class="add-new-counter-link">
                        <button type="button" class="button-style-secondary">Kembali</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-9">
            <div class="card-trap-spell-preview wrap-card-currently">
                <div class="d-flex">
                    <div class="image-section">
                        <img class="main-image" src="{{$user->photo}}" alt="{{$user->name}}" >
                    </div>
                    <div class="information-section">
                        <div class="row mb-1">
                            <div class="col-3">
                                Name :
                            </div>
                            <div class="col-9">
                                 {{$user->name}}
                            </div>
                        </div>
                        <div class="row mb-1">
                            <div class="col-3">
                                No KTP :
                            </div>
                            <div class="col-9">
                                {{$user->no_ktp}}
                            </div>
                        </div>
                        <div class="row mb-1">
                            <div class="col-3">
                                Email :
                            </div>
                            <div class="col-9">
                                {{$user->email}}
                            </div>
                        </div>
                        <div class="row mb-1">
                            <div class="col-3">
                                No Handphone :
                            </div>
                            <div class="col-9">
                                {{$user->no_hp}}
                            </div>
                        </div>
                        <div class="row mb-1">
                            <div class="col-3">
                                Date Birth :
                            </div>
                            <div class="col-9">
                                {{$user->date_birth}}
                            </div>
                        </div>
                        <div class="row mb-1">
                            <div class="col-3">
                                Gender :
                            </div>
                            <div class="col-9">
                                {{$user->gender}}
                            </div>
                        </div>
                        <div class="row mb-1">
                            <div class="col-3">
                                Posiiton :
                            </div>
                            <div class="col-9">
                                {{$user->position}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>  
        </div>
    </div>
</div>
@endsection
