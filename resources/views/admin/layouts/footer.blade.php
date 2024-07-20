<footer class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <script>document.write(new Date().getFullYear())</script>
                © Velzon.
            </div>
            <div class="col-sm-6">
                <div class="text-sm-end d-none d-sm-block">
                    Design & Develop by Themesbrand
                </div>
            </div>
        </div>
    </div>
</footer>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        var hasShownNotification = false; // Biến flag để kiểm tra đã hiển thị thông báo hay chưa

        // Hàm kiểm tra đơn hàng mới
        function checkNewOrder() {
            $.ajax({
                url: '{{ route('check-new-order') }}', // Sử dụng route đã định nghĩa
                method: 'GET',
                success: function(response) {
                    if (response.newOrderCount > 0 && response.newOrders.length > 0) {
                        // Cập nhật nội dung thông báo và hiển thị nó
                        $('#notification').text('Bạn có ' + response.newOrderCount + ' đơn hàng mới!').show();
                        hasShownNotification = true; // Đánh dấu đã hiển thị thông báo

                        // Clear previous notifications
                        $('#notifications-container').empty();

                        // Tạo nội dung thông báo cho từng đơn hàng
                        response.newOrders.forEach(function(order) {
                            var notificationContent = `
                                <div class="text-reset notification-item d-block dropdown-item position-relative">
                                    <div class="d-flex">
                                        <div class="avatar-xs me-3 flex-shrink-0">
                                            <span class="avatar-title bg-info-subtle text-info rounded-circle fs-16">
                                                <i class='bx bx-message-square-dots'></i>
                                            </span>
                                        </div>
                                        <div class="flex-grow-1">
                                            <div>Đơn hàng #${order.id} - Tổng số tiền: ${order.total_amount}</div>
                                            <p class="mb-0 fs-11 fw-medium text-uppercase text-muted">
                                                <span><i class="mdi mdi-clock-outline"></i> Just 30 sec ago</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            `;
                            // Append the notification content
                            $('#notifications-container').append(notificationContent);
                        });
                    }
                },
                error: function(err) {
                    console.error('Lỗi khi kiểm tra đơn hàng mới:', err);
                }
            });
        }

        // Kiểm tra đơn hàng mới khi tải trang lần đầu
        checkNewOrder();

        // Sau đó kiểm tra đơn hàng mới mỗi 30 giây
        setInterval(checkNewOrder, 30000); // Mỗi 30 giây
    });
</script>

