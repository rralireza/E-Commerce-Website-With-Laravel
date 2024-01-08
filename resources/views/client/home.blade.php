@extends('client.layouts.main')
@section('title') Home @endsection
@section('container')

    <div class="container-fluid pt-5 pb-3">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Recent Products</span></h2>

        <div class="row px-xl-5">
            @foreach($products as $product)
            <div class="col-lg-3 col-md-4 col-sm-6 pb-1">

                <div class="product-item bg-light mb-4">
                    <div class="product-img position-relative overflow-hidden">
                        <img class="img-fluid w-100" src="{{ str_replace('public' , '/storage' , $product->image) }}" alt="{{ $product->name }}">
                        <div class="product-action">
                            <a class="btn btn-outline-dark btn-square" type="button" onclick="addToCart({{$product->id}});"><i class="fa fa-shopping-cart"></i></a>
                            <a class="btn btn-outline-dark btn-square" href=""><i class="far fa-heart"></i></a>
                            <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-sync-alt"></i></a>
                            <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-search"></i></a>
                        </div>
                    </div>
                    <div class="text-center py-4">
                        <a class="h6 text-decoration-none text-truncate" href="{{ route('client.showProducts' , $product) }}">{{ $product->name }}</a>
                        <div class="d-flex align-items-center justify-content-center mt-2">
                            @if($product->has_discount)
                                <h5>${{ $product->cost_with_discount }}</h5><h5 class="text-muted ml-2"></h5>
                                <h6 class="text-muted ml-2"><del>${{ $product->cost }}</del></h6>
                            @else
                                <h5>${{ $product->cost }}</h5><h5 class="text-muted ml-2"></h5>
                            @endif
                        </div>
                        <p>{{ $product->category->title }}</p>
                        <div class="d-flex align-items-center justify-content-center mb-1">
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small>(99)</small>
                        </div>

                    </div>
                </div>

            </div>
            @endforeach
        </div>

    </div>

@endsection
