@extends('ecommerce.layout')

@section('title', 'Products')

@section('extra-css')
    <link rel="stylesheet" href="{{ asset('css/plugins/dataTables/jquery.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/colorbox.css') }}">
@endsection

@section('content')

    <div class="breadcrumbs">
        <div class="container">
            <a href="{{route('landing-page')}}">Home</a>
            <i class="fa fa-chevron-right breadcrumb-separator"></i>
            <span>Shop</span>
        </div>
    </div> <!-- end breadcrumbs -->

    <div class="products-section container">
        <div class="sidebar">
            <h3>By Category</h3>
            <ul>
                <li><a href="#">Laptops</a></li>
                <li><a href="#">Desktops</a></li>
                <li><a href="#">Mobile Phones</a></li>
                <li><a href="#">Tablets</a></li>
                <li><a href="#">TVs</a></li>
                <li><a href="#">Digital Cameras</a></li>
                <li><a href="#">Appliances</a></li>
            </ul>

            <h3>By Price</h3>
            <ul>
                <li><a href="#">$0 - $700</a></li>
                <li><a href="#">$700 - $2500</a></li>
                <li><a href="#">$2500+</a></li>
            </ul>
        </div> <!-- end sidebar -->
        <div class="products">
            @foreach ($products as $product)
            <div class="product">
                <a href="{{route('shop.show',$product->slug)}}"><img src="/img/macbook-pro.png" alt="product"></a>
                <a href="{{route('shop.show',$product->slug)}}"><div class="product-name">{{$product->name}}</div></a>
                <div class="product-price">{{$product->presentPrice()}}</div>
            </div>
            @endforeach


        </div> <!-- end products -->
    </div>


@endsection
