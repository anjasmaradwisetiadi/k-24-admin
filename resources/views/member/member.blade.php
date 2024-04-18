@extends('layouts.main')
@push('styles')

@endpush

@section('container')
<div id="Member">
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
                                <span class="material-icons material-button mr-2 pointer">
                                    add_circle
                                </span>
                                <span class="material-icons material-button mr-2 pointer">
                                    edit
                                </span>
                                <span class="material-icons material-button pointer">
                                    delete
                                </span>
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