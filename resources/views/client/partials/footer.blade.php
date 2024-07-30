<!-- Footer Section Begin -->
<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-7">
                <div class="footer__about">
                    <div class="footer__logo">
                        <a href="./index.html"><img src="{{ asset('theme-cli/img/logo.png') }}" alt=""></a>
                    </div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                        cilisis.</p>
                    <div class="footer__payment">
                        <a href="#"><img src="{{ asset('theme-cli/img/payment/payment-1.png') }}"
                                alt=""></a>
                        <a href="#"><img src="{{ asset('theme-cli/img/payment/payment-2.png') }}"
                                alt=""></a>
                        <a href="#"><img src="{{ asset('theme-cli/img/payment/payment-3.png') }}"
                                alt=""></a>
                        <a href="#"><img src="{{ asset('theme-cli/img/payment/payment-4.png') }}"
                                alt=""></a>
                        <a href="#"><img src="{{ asset('theme-cli/img/payment/payment-5.png') }}"
                                alt=""></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-5">
                <div class="footer__widget">
                    <h6>Quick links</h6>
                    <ul>
                        <li><a href="#">About</a></li>
                        <li><a href="{{ route('blog')}}">Blogs</a></li>
                        <li><a href="#">Contact</a></li>
                        <li><a href="#">FAQ</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-sm-4">
                <div class="footer__widget">
                    <h6>Account</h6>
                    <ul>
                        <li><a href="#">My Account</a></li>
                        <li><a href="#">Orders Tracking</a></li>
                        <li><a href="#">Checkout</a></li>
                        <li><a href="#">Wishlist</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-8 col-sm-8">
                <div class="footer__newslatter">
                    <h6>NEWSLETTER</h6>
                    <form action="#">
                        <input type="text" placeholder="Email">
                        <button type="submit" class="site-btn">Subscribe</button>
                    </form>
                    <div class="footer__social">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-youtube-play"></i></a>
                        <a href="#"><i class="fa fa-instagram"></i></a>
                        <a href="#"><i class="fa fa-pinterest"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                <div class="footer__copyright__text">
                    <p>Copyright &copy;
                        <script>
                            document.write(new Date().getFullYear());
                        </script>
                        All rights reserved | This template is made with <i class="fa fa-heart"
                            aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                    </p>
                </div>
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </div>
        </div>
    </div>
</footer>
<!-- Footer Section End -->

<!-- Search Begin -->
<div class="search-model">
    <div class="h-100 d-flex align-items-center justify-content-center">
        <div class="search-close-switch">+</div>
        <form class="search-model-form">
            <form role="search" id="searchForm" action="{{ route('product.search') }}" method="GET"
                  class="search-form">
                <!-- Input tìm kiếm -->
{{--                <input class="search-input" type="search" name="keyword" id="searchInput"--}}
{{--                       placeholder="Search" aria-label="Search">--}}
                <input type="text" id="search-input" name="keyword" placeholder="Search here.....">
                <!-- Gạch chân dưới -->
{{--                <div class="underline"></div>--}}
                <!-- Nút tìm kiếm -->
{{--                <button class="search-btn" type="submit">--}}
{{--                    <!-- Icon tìm kiếm -->--}}
{{--                    <i class="fa fa-search"></i>--}}
{{--                </button>--}}
            </form>

        </form>
    </div>
</div>
<!-- Search End -->

<!-- Js Plugins -->
<!-- JS Plugins -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        // Show search popup when clicking on search icon
        $('.search-switch').on('click', function() {
            $('#searchPopup').fadeIn();
        });

        // Close search popup when clicking on close button or overlay
        $('#closeSearchPopup, #closeSearchPopupBtn').on('click', function() {
            $('#searchPopup').fadeOut();
        });

        // Handle form submission for search
        $('#searchForm').on('submit', function(event) {
            event.preventDefault();
            var query = $('#searchInput').val();
            if (query.trim() !== '') {
                searchProducts(query);
                // searchProducts(query);
            }
        });

        // Function to perform AJAX search
        function searchProducts(query) {
            $.ajax({
                url: '{{ route('product.search') }}',
                type: 'GET',
                data: {
                    keyword: query
                },
                success: function(response) {
                    $('#searchResults').html(response);
                    $('#searchPopup').fadeIn();
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        }
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var searchInput = document.getElementById('searchInput');
        var searchForm = document.getElementById('searchForm');

        searchInput.addEventListener('focus', function() {
            searchForm.classList.add('expanded');
        });

        searchInput.addEventListener('blur', function() {
            if (!searchInput.value) {
                searchForm.classList.remove('expanded');
            }
        });
    });
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    {{--$(document).ready(function() {--}}
    {{--    function loadContent() {--}}
    {{--        $.ajax({--}}
    {{--            url: "{{ url('login') }}",--}}
    {{--            method: "GET",--}}
    {{--            success: function(data) {--}}
    {{--                $('#content').html(data);--}}
    {{--            },--}}
    {{--            error: function() {--}}
    {{--                alert('Có lỗi xảy ra trong quá trình load content.');--}}
    {{--            }--}}
    {{--        });--}}
    {{--    }--}}

    {{--    // Gọi hàm loadContent() khi cần thiết--}}
    {{--    loadContent();--}}
    {{--});--}}
</script>

<script src="{{ asset('theme-cli/js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('theme-cli/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('theme-cli/js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('theme-cli/js/jquery-ui.min.js') }}"></script>
<script src="{{ asset('theme-cli/js/mixitup.min.js') }}"></script>
<script src="{{ asset('theme-cli/js/jquery.countdown.min.js') }}"></script>
<script src="{{ asset('theme-cli/js/jquery.slicknav.js') }}"></script>
<script src="{{ asset('theme-cli/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('theme-cli/js/jquery.nicescroll.min.js') }}"></script>
<script src="{{ asset('theme-cli/js/main.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/mixitup/3.3.1/mixitup.min.js"></script>
</body>

</html>
