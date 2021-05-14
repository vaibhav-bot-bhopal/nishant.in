@extends('superadmin.layouts.master')

@section('content')
    <style>
        .error{
            color:red;
        }
    </style>

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <!-- your code start here  -->
        <div class="row">
            <div class="col-lg-10 col-md-10 offset-lg-1 offset-md-1 col-sm-12 mt-5">
                {{-- @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{session('success')}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif --}}
                <div class="card">
                    <h5 class="card-header d-flex">Current Role : {{$user_roles->role_as}}
                        @if($user_roles->status == '0')
                            <span class="badge badge-success ml-auto">Active</span>
                        @elseif($user_roles->status == '1')
                            <span class="badge badge-danger ml-auto">Deactive</span>
                        @endif
                    </h5>
                    <div class="card-body">
                        <form action="{{url('superadmin/role-update/'.$user_roles->id)}}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">User Name: </label>
                                <div class="col-sm-10">
                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{$user_roles->name}}">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">User Email: </label>
                                <div class="col-sm-10">
                                    <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" value="{{$user_roles->email}}">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-2 col-form-label">User Role: </label>
                                <div class="col-sm-10">
                                    <select name="roles" class="form-control @error('roles') is-invalid @enderror">
                                        <option value="">----- Select Role -----</option>
                                        <option value="superadmin">Super Admin</option>
                                        <option value="admin">Admin</option>
                                    </select>
                                    @error('roles')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-secondary">UPDATE</button>
                                <a href="{{url('superadmin/dashboard')}}" class="btn btn-warning">BACK</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- your code end here  -->
    </div>
@endsection
