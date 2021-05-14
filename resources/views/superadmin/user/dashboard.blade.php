@extends('superadmin.layouts.master')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <!-- your code start here  -->
        <div class="row">
            <div class="col-lg-10 col-md-10 offset-lg-1 offset-md-1 col-sm-12 mt-5">
                <div id="myAlert"></div>
                {{-- @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{session('success')}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif --}}
                <div class="card">
                    <h5 class="card-header">User List</h5>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="myTable" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th class="text-center">Active/Deactive</th>
                                        <th>Created_At</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>

                                <tbody>
                                @php
                                    $id = 1;
                                @endphp
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{$id}}</td>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->role_as}}</td>
                                        <td class="text-center">
                                            <input data-id="{{$user->id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-size="small" data-toggle="toggle" data-style="slow" data-on="Active" data-off="Deactive" {{ $user->status ? '' : 'checked' }}>
                                        </td>
                                        <!-- <td class="text-center">
                                            @if($user->status == '0')
                                                <span class="badge badge-success">Active</span>
                                            @elseif($user->status == '1')
                                                <span class="badge badge-danger">Deactive</span>
                                            @endif
                                        </td> -->
                                        <td>{{$user->created_at}}</td>
                                        <td><a href="{{ url('superadmin/role-edit') }}/{{$user->id}}" class="btn btn-sm btn-primary">Edit</a></td>
                                        <td><button type="button" class="btn btn-sm btn-warning" id="del-modal" data-id="{{$user->id}}" data-token="{{csrf_token()}}" data-target="delModal">Delete</button></td>
                                    </tr>
                                    @php
                                        $id++;
                                    @endphp
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- your code end here  -->
    </div>

    <!-- Modal -->
    <div class="modal fade" id="delModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure, you want to delete this user account ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No, Cancel</button>
                    <button type="button" class="btn btn-danger" id="del-user">Yes, Delete</button>
                </div>
            </div>
        </div>
    </div>
@endsection

