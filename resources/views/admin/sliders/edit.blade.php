@extends('admin.layouts.main')
@section('title') Edit Slider @endsection
@section('mainTitle') Edit slider @endsection
@section('container')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Quick Example</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('updateSlideProcess' , $slider) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">URL</label>
                    <input type="text" name="link" class="form-control" id="exampleInputEmail1" placeholder="Slider URL" value="{{ $slider->link }}">
                </div>
            </div>


            <input type="file" name="image">
            <img src="{{ str_replace('public' , '/storage' , $slider->image) }}" alt="" width="100">

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
