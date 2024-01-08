@extends('admin.layouts.main')
@section('title') New Offer @endsection
@section('mainTitle') Create a new Offer @endsection
@section('container')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Quick Example</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('createOfferProcess') }}" method="post">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Code</label>
                    <input type="text" name="code" class="form-control" id="exampleInputEmail1" placeholder="Code">
                </div>
            </div>

            <div class="card-body">
                <div class="form-group">
                    <label for="start_at">Starts At</label>
                    <input type="date" class="form-control" name="start_at" id="start_at">
                </div>
            </div>

            <div class="card-body">
                <div class="form-group">
                    <label for="expired_at">Expired At</label>
                    <input type="date" class="form-control" name="expired_at" id="expired_at">
                </div>
            </div>

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
