@extends('client.layouts.singleMain')

@section('title') Order Products @endsection

@section('container')
    <!-- Checkout Start -->
    <form action="{{ route('client.storeOrder') }}" method="post">
        <div class="container-fluid">
            <div class="row px-xl-5">
                <div class="col-lg-8">
                    <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Billing Address</span></h5>
                    <div class="bg-light p-30 mb-5">
                        <div class="row">
                            <div class="col-md-12 form-group">
                                <label>Discount Code</label>
                                <input class="form-control" type="text" placeholder="Enter Discount Code" id="offer" name="offer">
                            </div>
                            <div class="col-md-12 form-group">
                                <label>Address</label>
                                <textarea class="form-control" rows="20" cols="10" placeholder="Enter address" name="address" id="address" ></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Order Total</span></h5>
                    <div class="bg-light p-30 mb-5">
                        <div class="border-bottom">
                            <h6 class="mb-3">Products</h6>
                            @foreach($items as $item)
                                @php
                                    $product = $item['product'];
                                    $productQty = $item['quantity'];
                                @endphp
                            <div class="d-flex justify-content-between">
                                <p>{{ $product->name }}</p>
                                <p>${{ $product->cost_with_discount }}</p>
                            </div>
                            @endforeach
                        </div>
                        <div class="border-bottom pt-3 pb-2">
                            <div class="d-flex justify-content-between mb-3">
                                <h6>Subtotal</h6>
                                <h6>${{ $product->cost - $product->cost_with_discount }}</h6>
                            </div>
                            <div class="d-flex justify-content-between">
                                <h6 class="font-weight-medium">Shipping</h6>
                                <h6 class="font-weight-medium">$10</h6>
                            </div>
                        </div>
                        <div class="pt-2">
                            <div class="d-flex justify-content-between mt-2">
                                <h5>Total</h5>
                                <h5>${{ $totalAmount }}</h5>
                            </div>
                        </div>
                    </div>
                    <div class="mb-5">
                        <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Payment</span></h5>
                        <div class="bg-light p-30">
                            <div class="form-group">
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" name="payment" id="paypal">
                                    <label class="custom-control-label" for="paypal">Paypal</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" name="payment" id="directcheck">
                                    <label class="custom-control-label" for="directcheck">Direct Check</label>
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" name="payment" id="banktransfer">
                                    <label class="custom-control-label" for="banktransfer">Bank Transfer</label>
                                </div>
                            </div>

                                @csrf
                                <button class="btn btn-block btn-primary font-weight-bold py-3" type="submit">Place Order</button>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!-- Checkout End -->
@endsection
