<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('Partials.HeadPackage')
    <link rel="stylesheet" href="{{ asset('assets/css/HomePage.css') }}">
</head>

<body>
    @include('Partials.Header')
    @include('Partials.SideCart')
    @include('Templates.Banner')
    <section id="products">
        <div class="wrapper">
            <div class="products-container">
                <div class="list-container-header">
                    <h2>Coffee</h2>
                    <a href=""><span>View All Coffee</span><i class="bi bi-arrow-right"></i></a>
                </div>
                <div class="product-list-container">
                    <div class="product-container">
                        <div class="product-overlay-button">
                            <button class="add-to-cart overlay-button">
                                <i class="bi bi-plus-lg"></i>
                            </button>
                            <button class="add-to-wishlist overlay-button">
                                <i class="bi bi-heart"></i>
                            </button>
                        </div>
                        <img src="{{ asset('assets/img/Brown Sugar Oatmilk Shaken Espresso.webp') }}"
                            alt="Product Image">
                    </div>
                    <div class="product-container">
                        <div class="product-overlay-button">
                            <button class="add-to-cart overlay-button">
                                <i class="bi bi-plus-lg"></i>
                            </button>
                            <button class="add-to-wishlist overlay-button">
                                <i class="bi bi-heart"></i>
                            </button>
                        </div>
                        <img src="{{ asset('assets/img/Brown Sugar Oatmilk Shaken Espresso.webp') }}"
                            alt="Product Image">
                    </div>
                    <div class="product-container">
                        <div class="product-overlay-button">
                            <button class="add-to-cart overlay-button">
                                <i class="bi bi-plus-lg"></i>
                            </button>
                            <button class="add-to-wishlist overlay-button">
                                <i class="bi bi-heart"></i>
                            </button>
                        </div>
                        <img src="{{ asset('assets/img/Brown Sugar Oatmilk Shaken Espresso.webp') }}"
                            alt="Product Image">
                    </div>
                    <div class="product-container">
                        <div class="product-overlay-button">
                            <button class="add-to-cart overlay-button">
                                <i class="bi bi-plus-lg"></i>
                            </button>
                            <button class="add-to-wishlist overlay-button">
                                <i class="bi bi-heart"></i>
                            </button>
                        </div>
                        <img src="{{ asset('assets/img/Brown Sugar Oatmilk Shaken Espresso.webp') }}"
                            alt="Product Image">
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('Partials.Footer')
    @include('Partials.Script')
    @include('Partials.Toastr')
</body>

</html>
