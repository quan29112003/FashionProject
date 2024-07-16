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
            <h3>Order #32543</h3>
            <div>
                <span class="badge badge-paid">Paid</span>
                <span class="badge badge-ready">Ready to Pickup</span>
            </div>
        </div>
        <p>Aug 17, 2024, 5:48 (ET)</p>
    </div>

    <div class="row">
        <div class="col-md-8">
            <div class="shadow-box shadow-box-table">
                <h5 class="section-title">Order details</h5>
                <table class="table">
                    <thead>
                        <tr>
                            <th>PRODUCTS</th>
                            <th>PRICE</th>
                            <th>QTY</th>
                            <th>TOTAL</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Wooden Chair<br><small>Material: Wooden</small></td>
                            <td>$841</td>
                            <td>2</td>
                            <td>$1682</td>
                        </tr>
                        <tr>
                            <td>Oneplus 10<br><small>Storage: 128gb</small></td>
                            <td>$896</td>
                            <td>3</td>
                            <td>$2688</td>
                        </tr>
                        <tr>
                            <td>Nike Jordan<br><small>Size: 8UK</small></td>
                            <td>$392</td>
                            <td>1</td>
                            <td>$392</td>
                        </tr>
                        <tr>
                            <td>Face cream<br><small>Gender: Women</small></td>
                            <td>$813</td>
                            <td>2</td>
                            <td>$1626</td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="3" class="text-right">Subtotal</td>
                            <td>$2093</td>
                        </tr>
                        <tr>
                            <td colspan="3" class="text-right">Discount</td>
                            <td>$2</td>
                        </tr>
                        <tr>
                            <td colspan="3" class="text-right">Tax</td>
                            <td>$28</td>
                        </tr>
                        <tr>
                            <td colspan="3" class="text-right"><strong>Total</strong></td>
                            <td><strong>$2113</strong></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        <div class="col-md-4">
            <div class="shadow-box">
                <h5 class="section-title">Customer details</h5>
                <div class="border p-3">
                    <p><strong>Shamus Tuttle</strong></p>
                    <p>Customer ID: #58909</p>
                    <p>12 Orders</p>
                    <p>Email: Shamus889@yahoo.com</p>
                    <p>Mobile: +1 (609) 972-22-22</p>
                </div>
            </div>
            <div class="shadow-box">
                <h5 class="section-title">Shipping address</h5>
                <div class="border p-3">
                    <p>45 Roker Terrace</p>
                    <p>Latheronwheel</p>
                    <p>KW5 8NW, London</p>
                    <p>UK</p>
                </div>
            </div>
            <div class="shadow-box">
                <h5 class="section-title">Billing address</h5>
                <div class="border p-3">
                    <p>45 Roker Terrace</p>
                    <p>Latheronwheel</p>
                    <p>KW5 8NW, London</p>
                    <p>UK</p>
                </div>
            </div>
            <div class="shadow-box">
                <h5 class="section-title">Mastercard</h5>
                <div class="border p-3">
                    <p>Card Number: ******4291</p>
                </div>
            </div>
        </div>
    </div>

    <!-- <div class="shadow-box">
      <h5 class="section-title">Shipping activity</h5>
      <ul class="list-unstyled">
          <li>
              <strong>Order was placed (Order ID: #32543)</strong>
              <p>Your order has been placed successfully</p>
              <small class="text-muted">Tuesday 11:29 AM</small>
          </li>
          <li>
              <strong>Pick-up</strong>
              <p>Pick-up scheduled with courier</p>
              <small class="text-muted">Wednesday 11:29 AM</small>
          </li>
          <li>
              <strong>Dispatched</strong>
              <p>Item has been picked up by courier</p>
              <small class="text-muted">Thursday 11:29 AM</small>
          </li>
          <li>
              <strong>Package arrived</strong>
              <p>Package arrived at an Amazon facility, NY</p>
              <small class="text-muted">Saturday 15:20 AM</small>
          </li>
          <li>
              <strong>Dispatched for delivery</strong>
              <p>Package has left an Amazon facility, NY</p>
              <small class="text-muted">Today 14:12 PM</small>
          </li>
          <li>
              <strong>Delivery</strong>
              <p>Package will be delivered by tomorrow</p>
          </li>
      </ul>
  </div> -->
</div>


@include('client.partials.footer')
