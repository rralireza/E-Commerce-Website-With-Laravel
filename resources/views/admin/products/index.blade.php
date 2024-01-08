@extends('admin.layouts.main')
@section('title') List of Products @endsection
@section('mainTitle') Products @endsection
@section('container')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">You can manage your Brands content here.</h3>

                    <div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Product Category</th>
                            <th>Product Brand</th>
                            <th>Cost</th>
                            <th>Image</th>
                            <th>Discount</th>
                            <th>Gallery</th>
                            <th>Properties</th>
                            <th>Comments</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $product)
                            <tr>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->category->title }}</td>
                                <td>{{ $product->brand->name }}</td>
                                <td>{{ $product->cost }}</td>
                                <td>
                                    <img src="{{ str_replace('public' , '/storage' , $product->image) }}" alt="{{ $product->name }}" width="100">
                                </td>
                                <td>
                                    @if(! $product->discount()->exists())
                                        <a href="{{ route('newDiscount' , $product) }}" class="btn btn-sm-square btn-success">New Discount</a>
                                    @else
                                        <p class="btn btn-outline-danger">{{ $product->discount->value }}%</p>
                                        <form action="{{ route('deleteDiscount' , ['product' => $product , 'discount' => $product->discount]) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm-square btn-dark">Remove Discount</button>
                                        </form>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('showPictures' , $product) }}" class="btn btn-sm-square btn-warning">Show</a>
                                </td>
                                <td>
                                    <a href="{{ route('showProductProperties' , $product) }}" class="btn btn-sm-square btn-warning">Add</a>
                                </td>
                                <td>
                                    <a href="{{ route('showProductComments' , $product) }}" class="btn btn-sm-square btn-dark">Manage</a>
                                </td>
                                <td>
                                    <a href="{{ route('updateProduct' , $product) }}" class="btn btn-sm-square btn-success">Edit</a>
                                </td>
                                <td>
                                    <form action="{{ route('deleteProduct' , $product) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm-square btn-danger" type="submit">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        @if(\Illuminate\Support\Facades\Session::has('success_update_message'))
            <i class="btn btn-success">{{ \Illuminate\Support\Facades\Session::get('success_update_message') }}</i>
        @endif

        @if(\Illuminate\Support\Facades\Session::has('success_delete_message'))
            <i class="btn btn-success">{{ \Illuminate\Support\Facades\Session::get('success_delete_message') }}</i>
        @endif
    </div>
@endsection
