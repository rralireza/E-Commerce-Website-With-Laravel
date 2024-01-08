@extends('admin.layouts.main')
@section('title') New Property @endsection
@section('mainTitle') Create a new Property @endsection
@section('container')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Quick Example</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('createPropertyProcess') }}" method="post">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Property Title</label>
                    <input type="text" name="title" class="form-control" id="exampleInputEmail1" placeholder="Property Title">
                </div>
            </div>

            <div class="form-group">
                <label for="exampleSelectBorder">Parent Category</label>
                <select class="custom-select form-control-border" name="property_group" id="exampleSelectBorder">
                    <option value="" disabled selected>Choose Property Group</option>
                    @foreach($groups as $group)
                        <option value="{{ $group->id }}">{{ $group->title }}</option>
                    @endforeach
                </select>
            </div>

            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
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
