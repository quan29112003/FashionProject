@include('client.partials.header')

<style>
    body {
        background-color: #f8f9fa;
    }

    .order-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .badge-paid {
        background-color: #28a745;
        color: white;
    }

    .badge-ready {
        background-color: #007bff;
        color: white;
    }

    .section-title {
        font-weight: bold;
        margin-top: 20px;
        padding-top: 20px;
    }

    .table th,
    .table td {
        vertical-align: middle;
    }

    .shadow-box {
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        border-radius: 15px;
        background-color: white;
        margin-bottom: 20px;
        padding: 20px;
    }

    .shadow-box-header {
        padding: 20px;
    }

    .shadow-box-table {
        padding: 0 20px 20px 20px;
    }

    .list-unstyled li {
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        border-radius: 5px;
        background-color: white;
        margin-bottom: 20px;
        padding: 20px;
    }
</style>

<div class="container mt-5">
    <div class="shadow-box shadow-box-header">
        <div class="order-header">
            <h3>Order #{{ $order->id }}</h3>
            <div>
                <span class="badge badge-paid">{{ $order->status->name }}</span>
                <span class="badge badge-ready">{{ $order->payment->name }}</span>
            </div>
        </div>
        <p>{{ $order->created_at->format('M d, Y, g:i A (T)') }}</p>
    </div>

    <div class="row">
        <div class="col-md-8">
            <div class="shadow-box shadow-box-table">
                <h5 class="section-title">Order details</h5>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>PRODUCTS</th>
                            <th>PRICE</th>
                            <th>QTY</th>
                            <th>TOTAL</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orderItems as $item)
                            <tr>
                                <td>
                                    <img width="90" height="120" src="/uploads/{{ $item->thumbnail }}"
                                        alt="">
                                </td>
                                <td>{{ $item->name_product }}<br><small>{{ $item->product ? $item->product->name : 'No product' }}</small>
                                </td>
                                <td>{{ number_format($item->price, 0, ',', '.') }}₫</td>
                                <td>{{ $item->quantity }}</td>
                                <td>{{ number_format($item->price * $item->quantity, 0, ',', '.') }}₫</td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            @if ($voucher)
                                <td colspan="4" class="text-right">Giảm giá:</td>
                                <td class="text-right">{{ number_format($voucher->discount_value, 0, ',', '.') }}{{ $voucher->discount_type === 'percent' ? '%' : '₫' }}</td>
                            @endif
                        </tr>
                        <tr>
                            <td colspan="4" class="text-right">Subtotal:</td>
                            <td class="text-right">{{ number_format($order->total_amount, 0, ',', '.') }}₫</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        <div class="col-md-4">
            <div class="shadow-box">
                <h5 class="section-title">Customer details</h5>
                <div class="border p-3">
                    <p><strong>{{ $order->name }}</strong></p>
                    <p>Email: {{ $order->email }}</p>
                    <p>Mobile: {{ $order->phone }}</p>
                </div>
            </div>
            <div class="shadow-box">
                <h5 class="section-title">Shipping address</h5>
                <div class="border p-3">
                    <p>Địa chỉ: {{ $order->address }}</p>
                    <p></p>
                </div>
            </div>

        </div>
    </div>
</div>

@include('client.partials.footer')
