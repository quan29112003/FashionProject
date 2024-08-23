<html>

<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .header {
            text-align: center;
            padding-bottom: 20px;
        }

        .header img {
            max-width: 150px;
        }

        .content {
            text-align: left;
        }

        .content h1 {
            font-size: 24px;
            margin-bottom: 10px;
        }

        .content p {
            font-size: 16px;
            margin-bottom: 20px;
        }

        .order-details {
            margin-bottom: 20px;
        }

        .order-details h2 {
            font-size: 20px;
            border-bottom: 1px solid #eee;
            padding-bottom: 10px;
            margin-bottom: 10px;
        }

        .order-details table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .order-details table th,
        .order-details table td {
            padding: 10px;
            border: 1px solid #eee;
            text-align: left;
        }

        .order-details table th {
            background-color: #f5f5f5;
        }

        .footer {
            text-align: center;
            font-size: 12px;
            color: #888;
            padding-top: 20px;
            border-top: 1px solid #eee;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <img src="/uploads/{{ asset('images/logo.png') }}" alt="Logo">
        </div>
        <div class="content">
            <h1>Xác nhận đơn hàng</h1>
            <p>Cảm ơn bạn đã đặt hàng, {{ $order->name }}!</p>
            <p>Đơn hàng của bạn đã được đặt thành công. Dưới đây là chi tiết đơn hàng:</p>

            <div class="order-details">
                <h2>Chi tiết đơn hàng #{{ $order->id }}</h2>
                <table>
                    <tr>
                        <th>Trạng thái thanh toán</th>
                        <td>
                            @if ($order->payment_id == 1)
                                Chưa thanh toán
                            @elseif ($order->payment_id == 2)
                                Đã thanh toán
                            @else
                                Trạng thái không xác định
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Tổng số tiền</th>
                        <td>{{ number_format($order->total_amount, 0, ',', '.') }} VND</td>
                    </tr>
                    <tr>
                        <th>Địa chỉ</th>
                        <td>{{ $order->address }}</td>
                    </tr>
                    <tr>
                        <th>Số điện thoại</th>
                        <td>{{ $order->phone }}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>{{ $order->email }}</td>
                    </tr>
                </table>

                <h2>Chi tiết sản phẩm</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Sản phẩm</th>
                            <th>Số lượng</th>
                            <th>Giá</th>
                            <th>Tổng</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order->orderItems as $item)
                            <tr>
                                <td>{{ $item->name_product }}</td>
                                <td>{{ $item->quantity }}</td>
                                <td>{{ number_format($item->price, 0, ',', '.') }} VND</td>
                                <td>{{ number_format($item->price * $item->quantity, 0, ',', '.') }} VND</td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="3">Tổng số tiền</th>
                            <th>{{ number_format($order->total_amount, 0, ',', '.') }} VND</th>
                        </tr>
                    </tfoot>
                </table>
            </div>

            <p>Nếu bạn có bất kỳ câu hỏi nào, vui lòng liên hệ với chúng tôi qua email freshfusionwd@gmail.com.</p>
            <p>Khuyến cáo đăng ký tài khoản khi mua hàng để có thể quản lý đơn hàng thuận tiện hơn.</p>
        </div>
        <div class="footer">
            <p>&copy; {{ date('Y') }} FreshFusion. Tất cả các quyền được bảo lưu.</p>
        </div>
    </div>
</body>

</html>
{{-- MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=freshfusionwd@gmail.com
MAIL_PASSWORD=mmgewdwqhugcoogf
MAIL_ENCRYPTION=tls 
MAIL_FROM_ADDRESS=freshfusionwd@gmail.com
MAIL_FROM_NAME="Fresh Fusion" --}}
