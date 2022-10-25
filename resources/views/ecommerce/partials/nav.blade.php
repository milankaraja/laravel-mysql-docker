<header>
    <div class="top-nav container">
        <div class="logo">Laravel Ecommerce</div>
        <ul>
            <li><a href="{{route('shop.index')}}">Shop</a></li>
            <li><a href="{{route('home')}}">Login</a></li>
            <li><a href="#">Blog</a></li>
            <li>
                <a href="{{route('cart.index')}}">Cart
                    <span class="cart-count">
                        @if (Cart::instance('default')->count() >0)
                        <span>{{Cart::instance('default')->count() }}</span>

                        @endif


                    </span>

                </a>
            </li>
        </ul>
    </div> <!-- end top-nav -->
</header>
