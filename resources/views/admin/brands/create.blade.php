@extends('admin.layouts.main')
@section('title') New Brand @endsection
@section('mainTitle') Create a new Brand @endsection
@section('container')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Quick Example</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('createBrandProcess') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Brand Title</label>
                    <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Brand Title">
                </div>
            </div>

            <!-- /.card-body -->

{{--            <div class="card-body">--}}
{{--                <div class="form-group">--}}
{{--                    <label for="fileInput">Upload Image</label>--}}
{{--                    <div class="input-group">--}}
{{--                        <div class="custom-file">--}}
{{--                            <input type="file" name="image" class="custom-file-input" id="fileInput">--}}
{{--                            <label class="custom-file-label" for="fileInput">Choose Image</label>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}

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
