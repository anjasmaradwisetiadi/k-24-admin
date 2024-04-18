@extends('layouts.main')
@push('styles')
    <link href="{{ asset('css/member/member.css') }}" rel="stylesheet">
@endpush

@section('container')
<div id="Member" class="mt-4 mb-5">
    <div class="row justify-content-center">
        <div class="col-6 text-center">
            <h3>Member</h3>
        </div>
    </div>
    <div class="row mb-2">
        <div class="col">
            <button type="button" class="button-style-primary"><a href="/member/create" class="add-new-counter-link" >Add Member</a></button>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col" >No.</th>
                        <th scope="col" >Name</th>
                        <th scope="col" >Email</th>
                        <th scope="col" >Gender</th>
                        <th scope="col" >Posiiton</th>
                        <th scope="col" >Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr scope="row">
                        <td> 
                            <div class="elipsis"> 1. </div>
                        </td>
                        <td> 
                            <div class="elipsis"> Anjasmara </div>
                        </td>
                        <td>
                            <div class="elipsis">
                                anjamara@gmail.com
                            </div>
                        </td>
                        <td>
                            <div class="elipsis">
                                Male
                            </div>
                        </td>
                        <td>
                            <div class="elipsis" >
                                Administator
                            </div>
                        </td>
                        <td>
                            <div class="d-flex action-pointer">
                                <a href="/member/2" class="add-new-counter-link">
                                    <span class="material-icons material-button mr-2 pointer">
                                        visibility
                                    </span>
                                </a>
                                <a href="/member/edit/2" class="add-new-counter-link">
                                    <span class="material-icons material-button mr-2 pointer">
                                        edit
                                    </span>
                                </a>
                                <a href="/member" class="add-new-counter-link">
                                    <span class="material-icons material-button pointer">
                                        delete
                                    </span>
                                </a>
                            </div>
                        </td>
                    </tr>
                    {{-- <tr v-if="!dataDeckBuilders?.data?.length">
                        <td colspan="5">
                            <div class="d-flex justify-content-center">
                                Tidak ada data yang terecord
                            </div>
                        </td>
                    </tr> --}}
                </tbody>
                <tfoot>
                    <th colspan="6">
                        <div class="row" v-if="dataDeckBuilders?.data?.length">
                            <div class="col d-flex justify-content-start align-items-center">
                                <div class="mr-4">
                                    <button class="button-style-primary mr-2"> < </button>
                                    <button class="button-style-primary" > > </button>
                                </div>
                            </div>
                        </div>
                    </th>
                </tfoot>
            </table>
        </div>
    </div>
</div>
@endsection