@extends('admin.layouts.main')
@section('title') List of Brands @endsection
@section('mainTitle') Brands @endsection
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
                            <th>Image</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($brands as $brand)
                            <tr>
                                <td>{{ $brand->name }}</td>
                                <td>
                                    <img src="{{ str_replace('public' , '/storage' , $brand->image) }}" alt="{{ $brand->name }}" width="100px">
                                </td>
                                <td>
                                    <a href="{{ route('updateBrand' , $brand) }}" class="btn btn-sm-square btn-success">Edit</a>
                                </td>
                                <td>
                                    <form action="{{ route('deleteBrand' , $brand) }}" method="post">
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
