@extends('admin.layouts.main')
@section('title') Edit User @endsection
@section('mainTitle') Edit a user @endsection
@section('container')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Quick Example</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('updateUserProcess' , $user) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Username</label>
                    <input type="text" name="username" class="form-control" id="exampleInputEmail1" placeholder="Username" value="{{ $user->username }}">
                </div>
            </div>

            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Firstname</label>
                    <input type="text" name="firstname" class="form-control" id="exampleInputEmail1" placeholder="Firstname" value="{{ $user->name }}">
                </div>
            </div>

            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Lastname</label>
                    <input type="text" name="lastname" class="form-control" id="exampleInputEmail1" placeholder="Lastname" value="{{ $user->lastname }}">
                </div>
            </div>

            <div class="form-group">
                <label for="exampleSelectBorder">User Role</label>
                <select class="custom-select form-control-border" name="role_id" id="exampleSelectBorder">
                    <option value="" disabled selected>Choose user role</option>

                    @foreach($roles as $role)
                        <option
                           @if($role->id == $user->role_id)
                               selected
                           @endif
                            value="{{ $role->id }}">{{ $role->title }}</option>
                    @endforeach

                </select>
            </div>

            <input type="file" name="image">


            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
                <button type="reset" class="btn btn-secondary">Reset</button>
                <button type="submit" class="btn btn-danger">Exit</button>
            </div>

            @if(\Illuminate\Support\Facades\Session::has('success_message'))
                <i class="btn btn-success">
                    {{ \Illuminate\Support\Facades\Session::get('success_message') }}
                </i>
            @endif

            @include('admin.layouts.errors')
        </form>
    </div>
@endsection
