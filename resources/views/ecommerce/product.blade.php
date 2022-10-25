@extends('ecommerce.layout')

@section('title', $product -> name)

@section('extra-css')

@endsection

@section('content')

    <div class="breadcrumbs">
        <div class="container">
            <a href="{{route('landing-page')}}">Home</a>
            <i class="fa fa-chevron-right breadcrumb-separator"></i>
            <a href="{{route('shop.index')}}">Shop</a>
            <i class="fa fa-chevron-right breadcrumb-separator"></i>
            <span>Macbook Pro</span>
        </div>
    </div> <!-- end breadcrumbs -->

    <div class="product-section container">

            <img src="{{ asset('img/macbook-pro.png') }}" alt="product">

        <div class="product-section-information">
            <h1 class="product-section-title">{{ $product -> name}}</h1>
            <div class="product-section-subtitle">{{ $product -> details}}</div>
            <div class="product-section-price">{{ $product -> presentPrice()}}</div>
            <p>
                {{$product -> description}}
            </p>

            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas magni accusantium, sapiente dicta iusto ut dignissimos atque placeat tempora iste.</p>
             <!-- <a href="#" class="button">Add to Cart </a> works for GET, for POST we need form like below-->
            <form action ="{{route('cart.store')}}" method="POST">
                {{csrf_field()}}
                <input type ="hidden" name="id" value="{{$product->id}}">
                <input type ="hidden" name="name" value="{{$product->name}}">
                <input type ="hidden" name="price" value="{{$product->price}}">

                <button type="submit" class="button button-plain"> Add to Cart </button>
            </form>

        </div>
    </div> <!-- end product-section -->

    <div class="might-like-section">
        <div class="container">
            <div>
                @include('ecommerce.partials.might-like')

            </div>
        </div>
    </div>


@endsection
