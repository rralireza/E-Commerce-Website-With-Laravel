@extends('admin.layouts.main')
@section('title') Edit Property Group @endsection
@section('mainTitle') Edit Property Group @endsection
@section('container')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Quick Example</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('updatePropertyGroupProcess' , $property) }}" method="post">
            @csrf
            @method('PATCH')
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Property Group Title</label>
                    <input type="text" name="title" class="form-control" id="exampleInputEmail1" placeholder="Property Title" value="{{ $property->title }}">
                </div>
            </div>


            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>

            @if(\Illuminate\Support\Facades\Session::has('success_message'))
                <alert class="btn-success">
                    {{ \Illuminate\Support\Facades\Session::get('success_message') }}
                </alert>
            @endif

            @include('admin.layouts.errors')
        </form>
    </div>
@endsection
