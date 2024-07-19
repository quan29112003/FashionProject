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

{{-- inform order --}}
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

                        // Cập nhật nội dung thông báo và hiển thị nó
                        $('#notification').text('Bạn có ' + response.newOrderCount + ' đơn hàng mới!').show();
                        hasShownNotification = true; // Đánh dấu đã hiển thị thông báo

                        // Tạo nội dung thông báo
                        response.newOrders.forEach(function(order) {
                            notificationContent = 'Đơn hàng #' + order.id + ' - Tổng số tiền: ' + order.total_amount;
                        });

                        // Cập nhật nội dung thông báo và hiển thị nó
                        $('#textNotification').html(notificationContent).show();
                        hasShownNotification = true; // Đánh dấu đã hiển thị thông báo

                },
                error: function(err) {
                    console.error('Lỗi khi kiểm tra đơn hàng mới:', err);
                }
            });
        }

        // Kiểm tra đơn hàng mới khi tải trang lần đầu
        checkNewOrder();

        // Sau đó kiểm tra đơn hàng mới mỗi 30 giây
        //setInterval(checkNewOrder, 30000); // Mỗi 30 giây
    });
</script>
