@extends('admin.layouts.main')
@section('title') Product Properties @endsection
@section('mainTitle') List of Product Properties @endsection
@section('container')
    <div class="row">
        <div class="col-sm-6">
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
                            <th>Value</th>
                        </tr>
                        </thead>
                        <tbody>

                            <tr>
                                @foreach($product->properties as $property)
                                <td>{{ $property->title }}</td>
                                <td>{{ $property->pivot->value }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
                <!-- /.card-body -->
            </div>
            <a href="{{ route('createProductProperties' , $product) }}" class="btn btn-success">Edit</a>
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
