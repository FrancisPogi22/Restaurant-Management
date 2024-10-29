<script>
    $(function() {
        $(document).on("click", ".togglePassword", function() {
            let input = $(this).siblings("input");
            input.attr("type", input.attr("type") == "password" ? "text" : "password");
            $(this).toggleClass("bi-eye bi-eye-slash");
        });

        $('#myCart').click((e) => {
            e.preventDefault();
            openCartDrawer();
        })

        $(".closeCart").click(() => {
            closeCartDrawer();
        });

        function openCartDrawer() {
            $(".side-cart-container").addClass("active");
        }

        function closeCartDrawer() {
            $(".side-cart-container").removeClass("active");
        }
    });
</script>
