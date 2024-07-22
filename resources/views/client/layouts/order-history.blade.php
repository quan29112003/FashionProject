@include('client.partials.header')

<style>
    .order-header {
        background-color: #f8f9fa;
        padding: 20px;
        margin-bottom: 20px;
    }

    .order-card {
        margin-bottom: 20px;
    }

    .order-card .card-body {
        padding: 20px;
    }

    .product-image {
        max-width: 100px;
        margin-right: 20px;
    }

    .delivered {
        color: green;
    }
</style>


<div class="container">
    <h2>Lịch sử đơn hàng</h2>

    @if ($orders->isEmpty())
        <p>Không có đơn hàng nào.</p>
    @else
        @foreach ($orders as $order)
            <div class="order-header mb-4">
                <div class="row">
                    <div class="col-4">
                        <strong>Order number</strong>
                        <p>{{ $order->id }}</p>
                    </div>
                    <div class="col-4">
                        <strong>Date placed</strong>
                        <p>{{ $order->created_at->format('M d, Y') }}</p>
                    </div>
                    <div class="col-4">
                        <strong>Total amount</strong>
                        <p>{{ number_format($order->total_amount, 0, ',', '.') }}₫</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <a href="{{ route('user.order.detail', $order->id) }}" class="btn btn-primary btn-sm">View
                            Order</a>
                        <a href="#" class="btn btn-secondary btn-sm">View Invoice</a>
                    </div>
                </div>
            </div>
        @endforeach
    @endif
</div>


@include('client.partials.footer')
