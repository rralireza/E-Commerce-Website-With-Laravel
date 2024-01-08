@extends('admin.layouts.main')
@section('title') Add Properties @endsection
@section('mainTitle') Add properties to product @endsection
@section('container')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Quick Example</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->

        @php
            $propertyGroups = $product->category->propertyGroups;
        @endphp

        <form action="{{ route('createProductPropertyProcess' , $product) }}" method="post">
            @csrf
            @foreach($propertyGroups as $group)
                <h3>{{ $group->title }}</h3>
                @foreach($group->properties as $property)
                    <div class="card-body">
                        <div class="form-group col-sm-6">
                            <div class="row">
                                <div class="col-sm-4">
                                    <label for="exampleInputEmail1">{{ $property->title }}</label>
                                </div>
                                <div class="col-sm-8">
                                    <input type="text" name="properties[{{ $property->id }}][value]" class="form-control" id="exampleInputEmail1" placeholder="Enter property" value="{{ $property->getValuesFromProduct($product) }}">
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endforeach




        <!-- /.card-body -->



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
