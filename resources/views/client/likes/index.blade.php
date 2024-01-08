@extends('client.layouts.singleMain')



@section('container')
    <!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="#">Home</a>
                    <a class="breadcrumb-item text-dark" href="#">Shop</a>
                    <span class="breadcrumb-item active">Wishlists</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->


    <!-- Cart Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-lg-12 table-responsive mb-5">
                <table class="table table-light table-borderless table-hover text-center mb-0">
                    <thead class="thead-dark">
                    <tr>
                        <th>Products Image</th>
                        <th>Products</th>
                        <th>Price</th>
                        <th>Remove</th>
                    </tr>
                    </thead>
                    <tbody class="align-middle">
                    @foreach($products as $product)
                    <tr>
                        <td><img src="{{ str_replace('public' , '/storage' , $product->image) }}" alt="{{ $product->name }}" style="width: 150px;"></td>
                        <td class="align-middle"><a href="{{ route('client.showProducts' , $product) }}">{{ $product->name }}</a> </td>
                        <td class="align-middle">{{ $product->cost }}</td>
                        <td class="align-middle">
                            <form action="{{ route('client.deleteLike' , $product) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger"><i class="fa fa-times"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
                @if(\Illuminate\Support\Facades\Session::has('delete_success'))
                    <i class="btn btn-danger">{{ \Illuminate\Support\Facades\Session::get('delete_success') }}</i>
                @endif
            </div>

        </div>
    </div>
    <!-- Cart End -->
@endsection
