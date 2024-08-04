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




{{-- 
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Order History</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
  <style>
    body {
      font-family: 'Arial', sans-serif;
      background-color: #f8f9fa;
      color: #333;
    }
    .order-container {
      margin: 2rem auto;
      max-width: 800px;
      background: #fff;
      padding: 2rem;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
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
      align-items: flex-start;
      margin-bottom: 1.5rem;
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
      color: #666;
    }
    .order-status-delivered {
      color: #28a745;
      font-weight: bold;
    }
    .order-status-cancelled {
      color: #dc3545;
      font-weight: bold;
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
</head>
<body>
  <div class="container order-container">
    <div class="order-header">Order history</div>
    <div class="order-subheader">Check the status of recent orders, manage returns, and download invoices.</div>
    
    <!-- Order #WU88191111 -->
    <div class="order-card">
      <div class="d-flex justify-content-between align-items-center mb-3">
        <div>
          <div class="font-weight-bold">Order number WU88191111</div>
          <div class="order-info">Date placed: January 22, 2021</div>
          <div class="order-info order-total">Total amount: $302.00</div>
          <div class="order-status order-status-delivered">Delivered on January 25, 2021</div>

        </div>
        <div>
          <button class="btn btn-outline-primary mr-2">View Order</button>
          <button class="btn btn-outline-primary">View Invoice</button>
        </div>
      </div>
      <div class="order-product">
        <img src="https://via.placeholder.com/80" alt="Nomad Tumbler">
        <div class="product-details">
          <div class="product-title">Nomad Tumbler</div>
          <div class="product-description">
            This durable double-walled insulated tumbler keeps your beverages at the perfect temperature all day long. Hot, cold, or even lukewarm if you're weird like that, this bottle is ready for your next adventure.
          </div>
          <a href="#" class="btn btn-link">View Product</a>
          <a href="#" class="btn btn-link">Buy Again</a>
          <!-- <div class="order-status">Out for delivery</div> -->
        </div>
        <div class="product-price">$35.00</div>
      </div>
      <div class="order-product">
        <img src="https://via.placeholder.com/80" alt="Leather Long Wallet">
        <div class="product-details">
          <div class="product-title">Leather Long Wallet</div>
          <div class="product-description">
            We're not sure who carries cash anymore, but this leather long wallet will keep those bills nice and fold-free. The cashier hasn't seen print money in years, but you'll make a damn fine impression with your pristine cash monies.
          </div>
          <a href="#" class="btn btn-link">View Product</a>
          <a href="#" class="btn btn-link">Buy Again</a>
          <!-- <div class="order-status order-status-delivered">Delivered on January 25, 2021</div> -->
        </div>
        <div class="product-price">$118.00</div>
      </div>
      <div class="order-product">
        <img src="https://via.placeholder.com/80" alt="Minimalist Wristwatch">
        <div class="product-details">
          <div class="product-title">Minimalist Wristwatch</div>
          <div class="product-description">
            This contemporary wristwatch has a clean, minimalist look and high quality components. Everyone knows you'll never use it to check the time, but wow, does that wrist look good with this timepiece on it.
          </div>
          <a href="#" class="btn btn-link">View Product</a>
          <a href="#" class="btn btn-link">Buy Again</a>
          <!-- <div class="order-status order-status-delivered">Delivered on January 25, 2021</div> -->
        </div>
        <div class="product-price">$149.00</div>
      </div>
    </div>

    <!-- Order #WU88191009 -->
    <div class="order-card">
      <div class="d-flex justify-content-between align-items-center mb-3">
        <div>
          <div class="font-weight-bold">Order number WU88191009</div>
          <div class="order-info">Date placed: January 5, 2021</div>
          <div class="order-info order-total">Total amount: $27.00</div>
          <div class="order-status order-status-cancelled">Cancelled</div>

        </div>
        <div>
          <button class="btn btn-outline-primary mr-2">View Order</button>
          <button class="btn btn-outline-primary">View Invoice</button>
        </div>
      </div>
      <div class="order-product">
        <img src="https://via.placeholder.com/80" alt="Mini Sketchbook Set">
        <div class="product-details">
          <div class="product-title">Mini Sketchbook Set</div>
          <div class="product-description">
            These pocket-sized sketchbooks feature recycled paper covers and screen printed designs from our top-selling poster collection. You have ideas, doodles, and notes, but nowhere to write them down. We have paper, wrapped in sturdier paper.
          </div>
          <a href="#" class="btn btn-link">View Product</a>
          <a href="#" class="btn btn-link">Buy Again</a>
        </div>
        <div class="product-price">$27.00</div>
      </div>
    </div>
  </div>
  
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html> --}}
