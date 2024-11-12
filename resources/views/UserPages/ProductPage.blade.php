<!DOCTYPE html>
<html lang="en">

<head>
    @include('Partials.HeadPackage')
    <link rel="stylesheet" href="{{ asset('assets/css/Product.css') }}">
</head>

<body>
    @include('Partials.Header')
    @include('Partials.SideCart')
    <section id="product">
        <div class="wrapper">
            <div class="product-container">
                <h2>Products</h2>
                <ul class="product-nav-links">
                    @foreach ($categories as $category)
                        <li>
                            <a href="#!" class="product-link"
                                data-category="{{ $category->category_name }}">{{ $category->category_name }}</a>
                        </li>
                    @endforeach
                </ul>
                <div class="product-list-container">
                    @forelse ($products as $product)
                        <div class="product-widget {{ $product->category->category_name }}">
                            <img src="{{ asset('products_images/' . $product->product_image) }}" alt="Product Image">
                            <div class="product-details">
                                <p>{{ $product->category->category_name }}</p>
                                <p>{{ $product->product_name }}</p>
                                @include('Snippet.Ratings')
                                <p>{{ $product->product_price }}</p>
                            </div>
                        </div>
                    @empty
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quo, provident.</p>
                    @endforelse
                </div>
            </div>
            <button id="createProductButton"><i class="bi bi-plus-lg"></i></button>
            @include('Modals.ProductModal')
        </div>
    </section>
    @include('Partials.Footer')
    @include('Partials.Script')
    @include('Partials.Toastr')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"
        integrity="sha512-rstIgDs0xPgmG6RX1Aba4KV5cWJbAMcvRCVmglpam9SoHZiUCyQVDdH2LPlxoHtrv17XWblE/V/PP+Tr04hbtA=="
        crossorigin="anonymous"></script>
    <script>
        $(function() {
            let operation, modal = $("#productModal"),
                formButton = $('#createProductBtn');

            $('.product-link').click(function() {
                let category = $(this).data('category');
                $('.product-widget').toggle(category === '' || $(this).data('category') === category);
            });

            let validator = $("#productForm").validate({
                rules: {
                    category: 'required',
                    product_name: 'required',
                    product_description: 'required'
                },
                messages: {
                    category: 'Please Select Category.',
                    product_name: 'Please Enter Product Name.',
                    product_description: 'Please Enter Product Description.'
                },
                errorElement: 'span',
                submitHandler(form, event) {
                    event.preventDefault();
                    let formData = $(form).serialize();

                    $.ajax({
                        url: "{{ route('product.create') }}",
                        method: "POST",
                        data: new FormData(form),
                        cache: false,
                        contentType: false,
                        processData: false,
                        beforeSend() {
                            $('#createProductBtn').prop('disabled', 1)
                        },
                        success(response) {
                            response.status == 'warning' ? showWarningMessage(response
                                .message) : (
                                showSuccessMessage(
                                    `Product successfully ${operation == "create" ? "created" : "updated"}.`
                                ), $('#closeModalBtn').click());

                            const newProductHtml = `
                                <div class="product-widget">
                                    <p>${response.product.product_name}</p>
                                    <img src="{{ asset('products_images') }}/${response.product.product_image}" alt="${response.product.product_name}" class="product-image">
                                    <p>${response.product.product_name}</p>
                                    <p>${response.product.product_price}</p>
                                </div>
                            `;
                            $('.product-list-container').append(newProductHtml);
                            $('#closeModalBtn').click();
                            $(form)[0].reset();
                        },
                        error: showErrorMessage,
                        complete() {
                            $('input, select, #closeModalBtn, #createProductBtn').prop(
                                'disabled',
                                0)
                        }
                    });
                }
            });

            $('#createProductButton').click(() => {
                formButton.find('#btn-text').text('Create Product');
                operation = "create";
                modal.modal('show');
            });
        });
    </script>
</body>

</html>
