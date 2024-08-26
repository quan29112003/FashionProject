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
                        <li><a href="{{ route('blog') }}">Blogs</a></li>
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
                        All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i>
                        by <a href="https://colorlib.com" target="_blank">Colorlib</a>
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
            <input type="text" id="search-input" placeholder="Search here.....">
        </form>
    </div>
</div>
<!-- Search End -->

<!-- Nút cuộn lên -->
<button class="btn btn-primary scroll-to-top" id="scrollToTopBtn">
    <span class="visually-hidden">Back to top</span>
    <i class="bi bi-arrow-up"></i> <!-- Bootstrap Icons -->
</button>
<!-- Js Plugins -->
<!-- JS Plugins -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const totalValueElement = document.getElementById('total-value');
        const totalAmountInput = document.querySelector('input[name="total_amount"]');
        const voucherIdInput = document.getElementById('voucher-id'); // Lấy input ẩn để lưu ID voucher
        const saveButtons = document.querySelectorAll('.btn-save');
        let appliedVoucherButton = null;
        const originalTotalValue = parseInt(totalValueElement.textContent.replace('₫', '').replace(/,/g, ''),
            10);

        let currentTotalValue = originalTotalValue;
        totalAmountInput.value = currentTotalValue;

        function updateSaveButtonState() {
            saveButtons.forEach(button => {
                const minPurchaseAmount = parseFloat(button.dataset.minPurchase);

                if (button === appliedVoucherButton) {
                    button.classList.remove('disabled');
                } else if (originalTotalValue < minPurchaseAmount) {
                    button.classList.add('disabled');
                } else {
                    button.classList.remove('disabled');
                }
            });
        }

        saveButtons.forEach(button => {
            button.addEventListener('click', function(event) {
                event.preventDefault();

                if (button.classList.contains('disabled')) {
                    return;
                }

                if (appliedVoucherButton && appliedVoucherButton !== button) {
                    appliedVoucherButton.classList.remove('disabled');
                }

                const discountValue = parseFloat(button.dataset.discount);
                const discountType = button.dataset.discountType;

                let discountAmount;
                if (discountType === 'discount') {
                    discountAmount = discountValue;
                } else {
                    discountAmount = originalTotalValue * (discountValue / 100);
                    discountAmount = Math.round(discountAmount);
                }

                currentTotalValue = originalTotalValue - discountAmount;

                totalValueElement.textContent = numberWithCommas(currentTotalValue) + '₫';
                totalAmountInput.value = currentTotalValue;

                appliedVoucherButton = button;
                updateSaveButtonState();

                const voucherValueElement = document.getElementById('voucher-value');
                const voucherDiscountElement = document.getElementById('voucher-discount');
                voucherDiscountElement.textContent =
                `Giảm ${numberWithCommas(discountAmount)}₫`;
                voucherValueElement.style.display = 'block';

                // Cập nhật giá trị của input ẩn với ID của voucher đã chọn
                voucherIdInput.value = button.dataset.voucherId;

                button.classList.add('disabled');
            });
        });

        function numberWithCommas(x) {
            return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',');
        }
    });

    var swiper = new Swiper('.swiper-container', {
        slidesPerView: 'auto',
        /* Hiển thị nhiều slide cùng lúc */
        spaceBetween: 30,
        /* Khoảng cách giữa các slide */
        centeredSlides: true,
        /* Bật vòng lặp để slide quay trở lại đầu */
        speed: 600,
        autoplay: {
            delay: 3000,
        },
    });

    function closeOffcanvas() {
        document.getElementById('offcanvasExample').style.maxHeight = '0';
    }
    // Hiển thị nút cuộn lên khi cuộn xuống
    window.addEventListener('scroll', function() {
        const scrollToTopBtn = document.getElementById('scrollToTopBtn');
        if (window.scrollY > 300) { // Thay đổi giá trị này để điều chỉnh khi nào nút xuất hiện
            scrollToTopBtn.style.display = 'block';
        } else {
            scrollToTopBtn.style.display = 'none';
        }
    });

    // Cuộn lên đầu trang khi nhấp vào nút
    document.getElementById('scrollToTopBtn').addEventListener('click', function() {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });

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
    $(document).ready(function() {
        function loadContent() {
            $.ajax({
                url: "{{ url('login') }}",
                method: "GET",
                success: function(data) {
                    $('#content').html(data);
                },
                error: function() {
                    alert('Có lỗi xảy ra trong quá trình load content.');
                }
            });
        }

        // Gọi hàm loadContent() khi cần thiết
        loadContent();
    });

    function deleteWishlistItem(id) {
        $.ajax({
            url: '/wishlist/' + id,
            type: 'DELETE',
            data: {
                _token: '{{ csrf_token() }}',
            },
            success: function(response) {
                if (response.success) {
                    // Xóa hàng trong bảng
                    $('#wishlist-item-' + id).remove();
                    showToast(response.message, 'success');
                } else {
                    showToast(response.message, 'error');
                }
            },
            error: function(xhr) {
                showToast('An error occurred. Please try again later.', 'error');
            }
        });
    }

    function showToast(message, type) {
        var toastContainer = $('#toast-container');
        var autoHideDelay = 5000; // 5 seconds

        var toastClass = 'bg-' + (type === 'success' ? 'success' : 'danger');
        var toast = $('<div class="toast text-white ' + toastClass +
            '" role="alert" aria-live="assertive" aria-atomic="true">' +
            '<div class="toast-header">' +
            '<strong class="me-auto">Notification</strong>' +
            '<button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>' +
            '</div>' +
            '<div class="toast-body">' + message + '</div>' +
            '</div>');

        // Append toast to container and show it
        toastContainer.append(toast);
        var bootstrapToast = new bootstrap.Toast(toast[0], {
            delay: autoHideDelay
        });
        bootstrapToast.show();

        // Remove toast after it's hidden
        toast.on('hidden.bs.toast', function() {
            toast.remove();
        });
    }

    function addToWishlist(productId) {
        event.preventDefault();
        var form = $('#wishlist-form-' + productId);

        $.ajax({
            url: form.attr('action'),
            method: form.attr('method'),
            data: form.serialize(),
            success: function(response) {
                showToast('Product added to wishlist!', 'success');
                updateWishlist();
            },
            error: function(response) {
                if (response.status === 400) {
                    showToast('Product is already in the wishlist.', 'danger');
                } else {
                    showToast('Failed to add product to wishlist.', 'danger');
                }
            }
        });
    }
</script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/mixitup/3.3.1/mixitup.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
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
</body>

</html>
