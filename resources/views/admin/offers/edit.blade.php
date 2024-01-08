@extends('admin.layouts.main')
@section('title') Update Offer @endsection
@section('mainTitle') Update a Offer @endsection
@section('container')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Quick Example</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('updateOfferProcess' , $offer) }}" method="post">
            @csrf
            @method('PATCH')
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Code</label>
                    <input type="text" name="code" class="form-control" id="exampleInputEmail1" placeholder="Code" value="{{ $offer->code }}">
                </div>
            </div>

            <div class="card-body">
                <div class="form-group">
                    <label for="start_at">Starts At</label>
                    <input type="date" class="form-control" name="start_at" id="start_at" value="{{ $offer->start_at }}">
                </div>
            </div>

            <div class="card-body">
                <div class="form-group">
                    <label for="expired_at">Expired At</label>
                    <input type="date" class="form-control" name="expired_at" id="expired_at" value="{{ $offer->expired_at }}">
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
                <button type="reset" class="btn btn-secondary">Reset</button>
                <button type="submit" class="btn btn-danger">Exit</button>
            </div>


            @include('admin.layouts.errors')
        </form>
    </div>
@endsection
