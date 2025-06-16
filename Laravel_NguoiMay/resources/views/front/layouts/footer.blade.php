<style>

</style>

<footer class="bg-dark mt-5">
    <div class="container pb-5 pt-3">
        <div class="row">
            <div class="col-md-4">© 2025 Luxury.</div>
            <div class="col-md-4"></div>
            <div class="col-md-4 text-end d-flex justify-content-end align-items-center gap-3">
                <span class="me-2">Tiếng Việt</span>

                <a href="#" class="text-white">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="#" class="text-white">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="#" class="text-white">
                    <i class="fab fa-instagram"></i>
                </a>
            </div>

        </div>

    </div>

</footer>

<script src="{{ asset('front-assets/js/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('front-assets/js/bootstrap.bundle.5.1.3.min.js') }}"></script>
<script src="{{ asset('front-assets/js/instantpages.5.1.0.min.js') }}"></script>
<script src="{{ asset('front-assets/js/lazyload.17.6.0.min.js') }}"></script>
<script src="{{ asset('front-assets/js/slick.min.js') }}"></script>
<script src="{{ asset('front-assets/js/custom.js') }}"></script>

<script>
    window.onscroll = function() {
        myFunction()
    };

    var navbar = document.getElementById("navbar");
    var sticky = navbar.offsetTop;

    function myFunction() {
        if (window.pageYOffset >= sticky) {
            navbar.classList.add("sticky")
        } else {
            navbar.classList.remove("sticky");
        }
    }
</script>
</body>

</html>