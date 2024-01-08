@extends('admin.layouts.main')
@section('title') Featured Category @endsection
@section('mainTitle') Create a new Featured Category @endsection
@section('container')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Quick Example</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('newFeaturedCategoryProcess') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="exampleSelectBorder">Featured Category</label>
                <select class="custom-select form-control-border" name="category_id" id="exampleSelectBorder">
                    <option value="" disabled selected>Choose Featured Category</option>
                    @foreach($categories as $category)
                        <option @if($featured->category_id === $category->id) selected @endif value="{{ $category->id }}">{{ $category->title }}</option>
                    @endforeach
                </select>
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
