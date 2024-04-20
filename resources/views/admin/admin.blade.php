@extends('layouts.main')
@push('styles')
    <link href="{{ asset('css/admin/admin.css') }}" rel="stylesheet">
@endpush

@section('container')
<div id="Admin" class="mt-4 mb-5">
    <div class="row justify-content-center">
        <div class="col-6 text-center">
            <h3>Administator</h3>
        </div>
    </div>
    <div class="row">
        <div class="col">
            @include('components.message-alert')
        </div>
    </div>
    <div class="row justify-content-center p-6">
        <div class="col-md-6">
            <form action="/administator">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Search email or name..." aria-label="Search" name="search" value="{{request('search')}}">
                    <div class="input-group-append">
                      <button class="btn button-style-primary text-white" type="submit">Search</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="row mb-2">
        <div class="col">
            <a href="/administator/create" class="add-new-counter-link" > <button type="button" class="button-style-primary"> Add User </button> </a>
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
                        <th scope="col" >Positon</th>
                        <th scope="col" >Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if(isset($users))
                    @foreach ($users as $user)
                    <tr scope="row">
                        <td> 
                            <div class="elipsis"> 
                                    {{(10 * ($users->currentPage() - 1)) + $loop->iteration}}.
                            </div>
                        </td>
                        <td> 
                            <div class="elipsis"> {{$user->name}}</div>
                        </td>
                        <td>
                            <div class="elipsis">
                                {{$user->email}}
                            </div>
                        </td>
                        <td>
                            <div class="elipsis d-flex action-pointer justify-content-center">
                                {{$user->gender}}
                            </div>
                        </td>
                        <td>
                            <div class="elipsis d-flex action-pointer justify-content-center" >
                                {{$user->position}}
                            </div>
                        </td>
                        <td>
                            <div class="d-flex action-pointer justify-content-center">
                                <a href="/administator/{{$user->id}}" class="add-new-counter-link mr-2">
                                    <button class="button-style-primary">
                                        <span class="material-icons">
                                            visibility
                                        </span>
                                    </button>
                                </a>
                                <a href="/administator/{{$user->id}}/edit" class="add-new-counter-link mr-2">
                                    <button class="button-style-primary">
                                        <span class="material-icons">
                                            edit
                                        </span>
                                    </button>
                                </a>
                                <a class="add-new-counter-link">
                                    <form action="/administator/{{$user->id}}" method="post" style="display: inline">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="button-style-primary" onclick="return confirm('Are you Sure want delete it?')" 
                                            {{auth()->user()->email === $user->email ? 'disabled' : '' }}> 
                                            <span class="material-icons">
                                                delete
                                            </span>
                                        </button>
                                      </form>
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    @endif
                    @if(!count($users))
                    <tr>
                        <td colspan="6">
                            <div class="d-flex justify-content-center">
                                Data not record
                            </div>
                        </td>
                    </tr>
                    @endif
                </tbody>
                @if(!count($users))
                <tfoot>
                    <th colspan="6">
                        <div class="row">
                            <div class="col">
                                {{ $users->links() }}
                            </div>
                        </div>
                    </th>
                </tfoot>
                @endif
            </table>
        </div>
    </div>
</div>
@endsection