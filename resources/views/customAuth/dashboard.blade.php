@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div>
                        <h5>User lists</h5>
                            <a href="javascript:void(0);" class="pull-right btn btn-primary mb-2" id="add_btn">Add User</a>
                        </div>
                            <div class="table-responsive">
                                <table class="table table-hover" id="table">
                                    <thead>
                                   <tr>
                                       <th>user_id</th>
                                       <th>username</th>
                                       <th>email</th>
                                       <th>address</th>
                                       <th>phone</th>
                                       <th>Action</th>
                                   </tr>
                                    </thead>
                                    <tbody id="user-list">
                                    @foreach($users as $user)
                                        @foreach($user->phones as $phone)
                                    <tr id="user_id{{$user->id}}">
                                        <td>{{$user->id}}</td>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->address}}</td>
                                        <td>{{$phone->phone}}</td>
                                        <td>
                                        <a href="javascript:void(0);" class="btn btn-info edit-btn" id="edit-btn" data-id="{{$user->id}}" data-username="{{$user->name}}" data-email="{{$user->email}}" data-address="{{$user->address}}" data-phone="{{$phone->phone}}" ><i class="fa fa-edit"></i></a>
                                        <a href="javascript:void(0);" class="btn btn-danger delete-btn" id="delete-btn" data-id="{{$user->id}}"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                            @endforeach
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
