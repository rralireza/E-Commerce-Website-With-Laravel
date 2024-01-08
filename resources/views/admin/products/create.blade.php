@extends('admin.layouts.main')
@section('title') New Product @endsection
@section('mainTitle') Create a new Product @endsection
@section('container')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Quick Example</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('createProductProcess') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Product Title</label>
                    <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Product Title">
                </div>
            </div>

            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Product Slug</label>
                    <input type="text" name="slug" class="form-control" id="exampleInputEmail1" placeholder="Product Slug">
                </div>
            </div>

            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Product Cost</label>
                    <input type="text" name="cost" class="form-control" id="exampleInputEmail1" placeholder="Product Cost - Enter a decimal number">
                </div>
            </div>

            <div class="form-group">
                <label for="exampleSelectBorder">Product Category</label>
                <select class="custom-select form-control-border" name="category_id" id="exampleSelectBorder">
                    <option value="" disabled selected>Choose Category</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->title }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="exampleSelectBorder">Product Brand</label>
                <select class="custom-select form-control-border" name="brand_id" id="exampleSelectBorder">
                    <option value="" disabled selected>Choose Brand</option>
                    @foreach($brands as $brand)
                        <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                    @endforeach
                </select>
            </div>


            <div class="form-group">
                <label for="description">Product Description</label>
                <textarea name="description" id="description" class="form-control"></textarea>
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
