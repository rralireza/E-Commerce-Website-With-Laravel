@extends('client.layouts.singleMain')

@section('title') Payment Status @endsection

@section('container')

    @if($order->payment_status == "ok")
        <p class="bg-success p-4">Order Completed Successfully!</p>
    @else
        <p class="bg-danger p-4">Order Has Been Failed!</p>
    @endif

@endsection
