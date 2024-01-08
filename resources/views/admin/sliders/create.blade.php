@extends('admin.layouts.main')
@section('title') New Slider @endsection
@section('mainTitle') Create a new Slider @endsection
@section('container')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Quick Example</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('createSlideProcess') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">URL</label>
                    <input type="text" name="link" class="form-control" id="exampleInputEmail1" placeholder="Slider URL">
                </div>
            </div>

            <!-- /.card-body -->

            <input type="file" name="image">


            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
                <button type="reset" class="btn btn-secondary">Reset</button>
                <button type="submit" class="btn btn-danger">Exit</button>
            </div>

            @if(\Illuminate\Support\Facades\Session::has('slider_add_success'))
                <i class="btn btn-success">
                    {{ \Illuminate\Support\Facades\Session::get('slider_add_success') }}
                </i>
            @endif

            @include('admin.layouts.errors')
        </form>
    </div>
@endsection
