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
    <h1 class="mt-4">Order history</h1>
    <p>Check the status of recent orders, manage returns, and discover similar products.</p>
    
    <div class="order-header">
        <div class="row">
            <div class="col-4">
                <strong>Order number</strong>
                <p>WU88191111</p>
            </div>
            <div class="col-4">
                <strong>Date placed</strong>
                <p>Jul 6, 2021</p>
            </div>
            <div class="col-4">
                <strong>Total amount</strong>
                <p>$160.00</p>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <a href="{{ route('order.detail') }}" class="btn btn-primary btn-sm">View Order</a>
                <a href="#" class="btn btn-secondary btn-sm">View Invoice</a>
            </div>
        </div>
    </div>
    
    <div class="card order-card">
        <div class="card-body">
            <div class="row">
                <div class="col-2">
                    <img src="https://via.placeholder.com/100" alt="Micro Backpack" class="product-image">
                </div>
                <div class="col-8">
                    <h5>Micro Backpack</h5>
                    <p>Are you a minimalist looking for a compact carry option? The Micro Backpack is the perfect size for your essential everyday carry items. Wear it like a backpack or carry it like a satchel for all-day use.</p>
                </div>
                <div class="col-2 text-right">
                    <p><strong>$70.00</strong></p>
                    <p class="delivered">Delivered on July 12, 2021</p>
                    <a href="#" class="btn btn-link btn-sm">View Product</a>
                    <a href="#" class="btn btn-link btn-sm">Buy again</a>
                </div>
            </div>
        </div>
    </div>

    <div class="card order-card">
        <div class="card-body">
            <div class="row">
                <div class="col-2">
                    <img src="https://via.placeholder.com/100" alt="Nomad Shopping Tote" class="product-image">
                </div>
                <div class="col-8">
                    <h5>Nomad Shopping Tote</h5>
                    <p>The durable shopping tote is perfect for the world traveler. Its yellow construction is water, fray, tear resistant. The matching handle, backpack straps, and shoulder loops provide multiple carry options for a day out on your next adventure.</p>
                </div>
                <div class="col-2 text-right">
                    <p><strong>$90.00</strong></p>
                    <p class="delivered">Delivered on July 12, 2021</p>
                    <a href="#" class="btn btn-link btn-sm">View Product</a>
                    <a href="#" class="btn btn-link btn-sm">Buy again</a>
                </div>
            </div>
        </div>
    </div>

    <div class="order-header">
        <div class="row">
            <div class="col-4">
                <strong>Order number</strong>
                <p>AT48441646</p>
            </div>
            <div class="col-4">
                <strong>Date placed</strong>
                <p>Dec 22, 2020</p>
            </div>
            <div class="col-4">
                <strong>Total amount</strong>
                <p>$40.00</p>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <a href="{{ route('order.detail2') }}" class="btn btn-primary btn-sm">View Order</a>
                <a href="#" class="btn btn-secondary btn-sm">View Invoice</a>
            </div>
        </div>
    </div>

    <div class="card order-card">
        <div class="card-body">
            <div class="row">
                <div class="col-2">
                    <img src="https://via.placeholder.com/100" alt="Double Stack Clothing Bag" class="product-image">
                </div>
                <div class="col-8">
                    <h5>Double Stack Clothing Bag</h5>
                    <p>Save space and protect your favorite clothes in this double-layer garment bag. Each compartment easily holds multiple pairs of jeans or tops, while keeping your items neatly folded throughout your trip.</p>
                </div>
                <div class="col-2 text-right">
                    <p><strong>$40.00</strong></p>
                    <p class="delivered">Delivered</p>
                    <a href="#" class="btn btn-link btn-sm">View Product</a>
                    <a href="#" class="btn btn-link btn-sm">Buy again</a>
                </div>
            </div>
        </div>
    </div>
</div>

@include('client.partials.footer')