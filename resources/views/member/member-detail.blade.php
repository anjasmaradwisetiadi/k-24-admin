@extends('layouts.main')
@push('styles')
    <link href="{{ asset('css/member/member-detail.css') }}" rel="stylesheet">
@endpush

@section('container')
<div id="Member-Detail" class="mt-4 mb-5">
    <div class="row justify-content-center">
        <div class="col-6 text-center">
            <h3>Member Detail</h3>
        </div>
    </div>
    <div class="row justify-content-center mt-4">
        <div class="col-9">
            <div class="row mb-2">
                <div class="col">
                    <button type="button" class="button-style-primary mr-2">Edit Member</button>
                    <button type="button" class="button-style-primary">Delete Member</button>
                </div>
                <div class="col d-flex justify-content-end">
                    <button type="button" class="button-style-secondary">Kembali</button>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-9">
            <div class="card-trap-spell-preview wrap-card-currently">
                <div class="d-flex">
                    <div class="image-section">
                        <img class="main-image" src="https://images.ygoprodeck.com/images/cards_cropped/72270339.jpg" alt="khastira" >
                    </div>
                    <div class="information-section">
                        <div class="row mb-1">
                            <div class="col-3">
                                Name :
                            </div>
                            <div class="col-9">
                                 Anjasmara Dwi Setiadi
                            </div>
                        </div>
                        <div class="row mb-1">
                            <div class="col-3">
                                No KTP :
                            </div>
                            <div class="col-9">
                                 38173518534131334
                            </div>
                        </div>
                        <div class="row mb-1">
                            <div class="col-3">
                                Email :
                            </div>
                            <div class="col-9">
                                 anjasmara@gmail.com
                            </div>
                        </div>
                        <div class="row mb-1">
                            <div class="col-3">
                                No Handphone :
                            </div>
                            <div class="col-9">
                                 013781631313131
                            </div>
                        </div>
                        <div class="row mb-1">
                            <div class="col-3">
                                Date Birth :
                            </div>
                            <div class="col-9">
                                 12-09-1997
                            </div>
                        </div>
                        <div class="row mb-1">
                            <div class="col-3">
                                Gender :
                            </div>
                            <div class="col-9">
                                 Male
                            </div>
                        </div>
                        <div class="row mb-1">
                            <div class="col-3">
                                Posiiton :
                            </div>
                            <div class="col-9">
                                 Administator
                            </div>
                        </div>
                    </div>
                </div>
            </div>  
        </div>
    </div>
</div>
@endsection
