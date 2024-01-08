@extends('admin.layouts.main')

@section('title') List of Pictures @endsection

@section('container')
    <div class="col-12">
        <div class="card card-primary">
            <div class="card-header">
                <h4 class="card-title"><span class="font-weight-bold">{{ $product->name }}</span> Gallery</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3">
                        <div class="card">
                            <form action="{{ route('storeNewPictures' , $product) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="Upload">Upload Image</label>
                                    <input type="file" name="image" class="form-control">
                                </div>

                                <div class="form-group">
                                    <button class="btn btn-secondary m-3 type="submit">Upload</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    @foreach($product->pictures as $picture)
                    <div class="col-sm-2">
                        <a href="{{ str_replace('public' , '/storage' , $picture->path) }}" data-toggle="lightbox" data-title="sample 1 - white" data-gallery="gallery">
                            <img src="{{ str_replace('public' , '/storage' , $picture->path) }}" class="img-fluid mb-2" alt="white sample">
                            <form action="{{ route('deletePictures' , ['picture' => $picture , 'product' => $product]) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">Delete</button>
                            </form>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        @include('admin.layouts.errors')
    </div>
@endsection
