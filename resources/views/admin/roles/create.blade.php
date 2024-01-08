@extends('admin.layouts.main')
@section('title') New Role @endsection
@section('mainTitle') Create new role @endsection
@section('container')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Quick Example</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('createRoleProcess') }}" method="post">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Role Title</label>
                    <input type="text" name="title" class="form-control" id="exampleInputEmail1" placeholder="Role Title">
                </div>
            </div>


            <div class="form-group">
                <label>Choose Permissions</label>
                <div class="row">
                    @foreach($permissions as $permission)
                        <label class="col-sm-3">
                            <input type="checkbox" name="permissions[]" value="{{ $permission->id }}"> {{ $permission->title }}
                        </label>
                    @endforeach
                </div>
            </div>


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
