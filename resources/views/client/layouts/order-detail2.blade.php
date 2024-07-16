@include('client.partials.header')

<style>
    body {
        background-color: #f8f9fa;
    }

    .order-status {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
        position: relative;
    }

    .order-status .status {
        text-align: center;
        flex: 1;
        position: relative;
    }

    .order-status .status:before {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        width: 100%;
        height: 2px;
        background-color: #e9ecef;
        z-index: 0;
        transform: translateX(-50%);
    }

    .order-status .status:last-child:before {
        width: 50%;
    }

    .order-status .status:first-child:before {
        width: 50%;
        left: 0;
        transform: none;
    }

    .order-status .status .step {
        position: relative;
        z-index: 1;
        background-color: #fff;
        padding: 10px 20px;
        border-radius: 20px;
        border: 2px solid #007bff;
        color: #007bff;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        margin-bottom: 20px;
    }

    .order-status .status.active .step {
        background-color: #007bff;
        color: #fff;
    }

    .card {
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        border: none;
        border-radius: 10px;
        margin-bottom: 20px;
    }

    .card-header {
        background-color: #fff;
        border-bottom: none;
        font-weight: bold;
        font-size: 1.2rem;
    }

    .card-body p {
        margin-bottom: 0.5rem;
    }

    .table th,
    .table td {
        vertical-align: middle;
    }

    .table thead th {
        border-bottom: none;
    }
</style>


<div class="container my-5">
    <h2 class="mb-4">Order Details</h2>
    <div class="order-status mb-4">
        <div class="status active">
            <div class="step">Order Placed</div>
        </div>
        <div class="status active">
            <div class="step">Packed</div>
        </div>
        <div class="status">
            <div class="step">Shipped</div>
        </div>
        <div class="status">
            <div class="step">Delivered</div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            ITEMS FROM ORDER #12537
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>Item</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>The Military Duffle Bag</td>
                        <td>3</td>
                        <td>$128</td>
                        <td>$384</td>
                    </tr>
                    <tr>
                        <td>Mountain Basket Ball</td>
                        <td>1</td>
                        <td>$199</td>
                        <td>$199</td>
                    </tr>
                    <tr>
                        <td>Wavex Canvas Messenger Bag</td>
                        <td>5</td>
                        <td>$180</td>
                        <td>$900</td>
                    </tr>
                    <tr>
                        <td>The Utility Shirt</td>
                        <td>2</td>
                        <td>$79</td>
                        <td>$158</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-header">
                    SHIPPING INFORMATION
                </div>
                <div class="card-body">
                    <p>Stanley Jones</p>
                    <p>795 Folsom Ave, Suite 600</p>
                    <p>San Francisco, CA 94107</p>
                    <p>P: (123) 456-7890</p>
                    <p>M: (+01) 12345 67890</p>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-header">
                    BILLING INFORMATION
                </div>
                <div class="card-body">
                    <p>Payment Type: Credit Card</p>
                    <p>Provider: Visa ending in 2851</p>
                    <p>Valid Date: 02/2020</p>
                    <p>CVV: xxx</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-header">
                    ORDER SUMMARY
                </div>
                <div class="card-body">
                    <p>Grand Total: $1641</p>
                    <p>Shipping Charge: $23</p>
                    <p>Estimated Tax: $19.22</p>
                    <p><strong>Total: $1683.22</strong></p>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-header">
                    DELIVERY INFO
                </div>
                <div class="card-body">
                    <p>UPS Delivery</p>
                    <p>Order ID: xxxx235</p>
                    <p>Payment Mode: COD</p>
                </div>
            </div>
        </div>
    </div>
</div>

@include('client.partials.footer')
