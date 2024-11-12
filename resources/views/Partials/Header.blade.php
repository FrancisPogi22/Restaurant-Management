<section id="header">
    <div class="wrapper">
        <div class="header-container">
            <a href="{{ route('home') }}" class="logo"><img src="{{ asset('assets/img/Coffee Logo.webp') }}"
                    alt="Logo"></a>
            <ul class="header-nav-bar">
                <li>
                    <a href="{{ auth()->check() ? route('home.page') : route('home') }}">Home</a>
                </li>
                <li>
                    <a href="#">Shop</a>
                </li>
                @if (auth()->check())
                    @if (auth()->user()->user_role == 3)
                        <li>
                            <a href="#!" id="myCart">Cart</a>
                        </li>
                    @endif
                    @if (auth()->user()->user_role == 2)
                        <li>
                            <a href="{{ route('product') }}">Products</a>
                        </li>
                    @endif
                    <li>
                        <a href="{{ route('sign.out.user') }}">Sign Out</a>
                    </li>
                @else
                    <li>
                        <a href="{{ route('sign.in.page') }}">Sign In</a>
                    </li>
                    <li>
                        <a href="{{ route('sign.up.page') }}">Sign Up</a>
                    </li>
                @endif
            </ul>
            <div id="mobile-btn">
                <i class="bi bi-list"></i>
            </div>
        </div>
    </div>
</section>
<section id="mobile-nav">
    <ul class="mobile-nav-container">
        <li>
            <a href="{{ route('home') }}">Home</a>
        </li>
        <li>
            <a href="#">Shop</a>
        </li>
        @if (auth()->check())
            <li>
                <a href="#!" id="myCart">Cart</a>
            </li>
            <li>
                <a href="{{ route('sign.out.user') }}">Sign Out</a>
            </li>
        @else
            <li>
                <a href="{{ route('sign.in.page') }}">Sign In</a>
            </li>
            <li>
                <a href="{{ route('sign.up.page') }}">Sign Up</a>
            </li>
        @endif
    </ul>
</section>
