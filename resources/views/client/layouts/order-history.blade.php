@include('client.partials.header')

<style>
    body {
        font-family: 'Arial', sans-serif;
        background-color: #f8f9fa;
        color: #333;
    }

    .order-container {
        margin: 2rem auto;
        /* max-width: 1200px; */
        max-width: 70%;
        background: #fff;
        padding: 2rem;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        border-radius: 15px
    }

    .order-header {
        font-size: 1.75rem;
        font-weight: bold;
        margin-bottom: 1rem;
    }

    .order-subheader {
        font-size: 1rem;
        color: #666;
        margin-bottom: 2rem;
    }

    .order-note {
        font-size: 0.9rem;
        color: #dc3545;
        /* Màu đỏ cho dòng lưu ý */
        margin-bottom: 2rem;
    }

    .order-card {
        border: 1px solid #eaeaea;
        border-radius: 0.5rem;
        padding: 1.5rem;
        margin-bottom: 1.5rem;
        background: #fff;
    }

    .order-info {
        font-size: 0.9rem;
        color: #666;
    }

    .order-product {
        display: flex;
        align-items: center;
        /* margin-bottom: 1.5rem; */
    }

    .order-product img {
        width: 80px;
        height: 80px;
        object-fit: cover;
        margin-right: 1rem;
        border-radius: 0.25rem;
    }

    .product-details {
        flex-grow: 1;
    }

    .product-title {
        font-size: 1rem;
        font-weight: bold;
        margin-bottom: 0.5rem;
    }

    .product-description {
        font-size: 0.9rem;
        color: #666;
        margin-bottom: 0.5rem;
    }

    .product-price {
        font-size: 1rem;
        font-weight: bold;
        color: #333;
    }

    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
    }

    .btn-outline-primary {
        border-color: #007bff;
        color: #007bff;
    }

    .order-status {
        font-size: 0.9rem;
        font-weight: bold;
        /* Giữ nguyên chữ đậm */
        color: #28a745;
        /* Màu xanh mặc định */
    }

    .order-status-cancelled {
        color: #dc3545;
        /* Màu đỏ cho trạng thái đã hủy */
    }

    .order-total {
        font-weight: bold;
        color: #333;
    }

    .btn-link {
        padding: 0;
        margin-right: 1rem;
        color: #007bff;
        font-weight: bold;
    }

    .btn-link:hover {
        text-decoration: underline;
    }
</style>

<div class="container order-container">
    <div class="order-header">Lịch sử đơn hàng</div>
    <div class="order-subheader">Kiểm tra trạng thái các đơn hàng gần đây, quản lý trả hàng và tải hóa đơn.</div>
    <div class="order-note">Lưu ý: Sau khi xác nhận sẽ không thể hủy đơn hàng.</div>

    @if ($orders->isEmpty())
        <p>Không có đơn hàng nào.</p>
    @else
        @foreach ($orders as $order)
            <div class="order-card">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div>
                        <div class="font-weight-bold">Mã đơn hàng #{{ $order->id }}</div>
                        <div class="order-info">Ngày đặt: {{ $order->created_at->format('d-m-Y') }}</div>
                        <div class="order-info order-total">Tổng tiền:
                            {{ number_format($order->total_amount, 0, ',', '.') }}₫</div>
                        <div class="order-status {{ $order->status_id == 8 ? 'order-status-cancelled' : '' }}">
                            Trạng thái: {{ $order->status->name }}
                        </div>
                    </div>
                    <div>
                        <a href="{{ route('user.order.detail', $order->id) }}" class="btn btn-outline-primary mr-2">Xem
                            đơn hàng</a>
                        <a href="#" class="btn btn-outline-primary">Xem hóa đơn</a>
                        @if ($order->status_id == 1 || $order->status_id == 2)
                            <form action="{{ route('orders.cancel', $order->id) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                <button type="submit" class="btn btn-outline-danger"
                                    onclick="return confirm('Bạn có chắc chắn muốn hủy đơn hàng này?')">Hủy đơn
                                    hàng</button>
                            </form>
                        @endif
                    </div>
                </div>
                @foreach ($order->orderItems as $item)
                    <div class="order-product">
                        <img src="/uploads/{{ $item->thumbnail }}" alt="{{ $item->name_product }}">
                        <div class="product-details">
                            <div class="product-title">{{ $item->name_product }}</div>
                            <div class="product-description">{{ $item->description ?? 'Không có mô tả' }}</div>
                            <a href="{{ route('detail', ['id' => $item->product_id, 'name' => Str::slug($item->name_product)]) }}"
                                class="btn btn-link">Xem sản phẩm</a>

                        </div>
                        <div class="product-price">{{ number_format($item->price, 0, ',', '.') }}₫</div>
                    </div>
                @endforeach
            </div>
        @endforeach
    @endif
</div>

@include('client.partials.footer')
