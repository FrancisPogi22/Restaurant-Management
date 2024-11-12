<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>
<script>
    $(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        
        $(document).on("click", ".togglePassword", function() {
            let input = $(this).siblings("input");
            input.attr("type", input.attr("type") == "password" ? "text" : "password");
            $(this).toggleClass("bi-eye bi-eye-slash");
        });

        $('#mobile-btn').click(() => {
            $('#mobile-nav').slideToggle();
        });

        $("#year").text(new Date().getFullYear());

        $('#myCart').click((e) => {
            e.preventDefault();
            openCartDrawer();
        })

        $(".closeCart").click(() => {
            closeCartDrawer();
        });
    });

    function openCartDrawer() {
        $(".side-cart-container").addClass("active");
    }

    function closeCartDrawer() {
        $(".side-cart-container").removeClass("active");
    }

    function showWarningMessage(message = "No changes were made.") {
        return toastr.warning(message, 'Warning');
    }

    function showSuccessMessage(message) {
        return toastr.success(message, 'Success');
    }

    function showInfoMessage(message) {
        return toastr.info(message, 'Info');
    }

    function showErrorMessage(message = 'An error occurred while processing your request.') {
        return toastr.error(message, 'Error');
    }
</script>
