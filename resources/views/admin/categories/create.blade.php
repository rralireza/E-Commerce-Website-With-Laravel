@extends('admin.layouts.main')
@section('title') New Category @endsection
@section('mainTitle') Create a new Category @endsection
@section('container')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Quick Example</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('createCategoryProcess') }}" method="post">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Category Title</label>
                    <input type="text" name="title" class="form-control" id="exampleInputEmail1" placeholder="Category Title">
                </div>
            </div>

            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Category Slug</label>
                    <input type="text" name="slug" class="form-control" id="exampleInputEmail1" placeholder="Category Slug">
                </div>
            </div>
            <!-- /.card-body -->

            <div class="form-group">
                <label for="exampleSelectBorder">Parent Category</label>
                <select class="custom-select form-control-border" name="category_id" id="exampleSelectBorder">
                    <option value="" disabled selected>Choose Category Parent</option>
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>Choose Property Group</label>
                <div class="row">
                    @foreach($properties as $property)
                        <label class="col-sm-3">
                            <input type="checkbox" name="properties[]" value="{{ $property->id }}"> {{ $property->title }}
                        </label>
                    @endforeach
                </div>
            </div>

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
