@include('client.partials.header')
<!-- Header Section End -->

<!-- Categories Section Begin -->
<section class="categories">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 p-0">
                <div class="categories__item categories__large__item set-bg"
                    data-setbg="{{ asset('theme-cli/img/categories/category-1.jpg') }}">
                    <div class="categories__text">
                        <h1>Women’s fashion</h1>
                        <p>Sitamet, consectetur adipiscing elit, sed do eiusmod tempor incidid-unt labore
                            edolore magna aliquapendisse ultrices gravida.</p>
                        <a href="#">Shop now</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 p-0">
                        <div class="categories__item set-bg"
                            data-setbg="{{ asset('theme-cli/img/categories/category-2.jpg') }}">
                            <div class="categories__text">
                                <h4>Men’s fashion</h4>
                                <p>358 items</p>
                                <a href="#">Shop now</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 p-0">
                        <div class="categories__item set-bg"
                            data-setbg="{{ asset('theme-cli/img/categories/category-3.jpg') }}">
                            <div class="categories__text">
                                <h4>Kid’s fashion</h4>
                                <p>273 items</p>
                                <a href="#">Shop now</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 p-0">
                        <div class="categories__item set-bg"
                            data-setbg="{{ asset('theme-cli/img/categories/category-4.jpg') }}">
                            <div class="categories__text">
                                <h4>Cosmetics</h4>
                                <p>159 items</p>
                                <a href="#">Shop now</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 p-0">
                        <div class="categories__item set-bg"
                            data-setbg="{{ asset('theme-cli/img/categories/category-5.jpg') }}">
                            <div class="categories__text">
                                <h4>Accessories</h4>
                                <p>792 items</p>
                                <a href="#">Shop now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Categories Section End -->

<!-- Product Section Begin -->
<section class="product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4">
                <div class="section-title">
                    <h4>New products</h4>
                </div>
            </div>
            <div class="col-lg-8 col-md-8">
                <ul class="filter__controls">
                    <li class="active" data-filter="*">All</li>
                    @foreach ($categories as $category)
                        <li data-filter=".{{ $category->slug }}">{{ $category->name }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
        @php
            $productCount = 0;
        @endphp
        <div class="row property__gallery" id="product-gallery">
            @foreach ($products as $product)
                @foreach ($product->variants as $variant)
                    <div
                        class="col-lg-3 col-md-4 col-sm-6 mix {{ $product->category->slug }} @if ($productCount >= 12) d-none @endif">
                        <div class="product__item">
                            @if ($product->images->isNotEmpty())
                                <div class="product__item__pic set-bg"
                                    data-setbg="{{ asset('storage/' . $product->images->first()->url) }}">
                                    <ul class="product__hover">
                                        <li><a href="{{ asset('storage/' . $product->images->first()->url) }}"
                                                class="image-popup"><span class="arrow_expand"></span></a></li>
                                        <li><a href="#"><span class="icon_heart_alt"></span></a></li>
                                        <li><a href="#"><span class="icon_bag_alt"></span></a></li>
                                    </ul>
                                </div>
                            @endif
                            <div class="product__item__text">
                                <h6><a href="{{ route('detail', $product->id) }}">{{ $product->name_product }}</a>
                                </h6>
                                <div class="rating">
                                    @for ($i = 0; $i < 5; $i++)
                                        @if ($i < $product->rating)
                                            <i class="fa fa-star"></i>
                                        @else
                                            <i class="fa fa-star-o"></i>
                                        @endif
                                    @endfor
                                </div>
                                <div class="product__price">${{ $variant->price }}</div>
                            </div>
                        </div>
                    </div>
                    @php
                        $productCount++;
                    @endphp
                @endforeach
            @endforeach
        </div>
        <!-- Nút Xem thêm -->
        <div class="col-lg-12 text-center">
            <button id="load-more-btn" class="btn btn-primary @if ($productCount <= 12) d-none @endif">Xem
                thêm</button>
        </div>

    </div>
</section>

<!-- Rest of your template -->

@include('client.partials.footer')

<!-- Scripts for filtering functionality -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const filterControls = document.querySelectorAll('.filter__controls li');
        const products = document.querySelectorAll('.mix');

        filterControls.forEach(control => {
            control.addEventListener('click', function() {
                filterControls.forEach(ctrl => ctrl.classList.remove('active'));
                this.classList.add('active');

                const filter = this.getAttribute('data-filter');
                products.forEach(product => {
                    if (filter === '*' || product.classList.contains(filter.slice(1))) {
                        product.style.display = 'block';
                    } else {
                        product.style.display = 'none';
                    }
                });
            });
        });
    });

    // Script to set background images dynamically
    document.querySelectorAll('.set-bg').forEach(el => {
        const bg = el.getAttribute('data-setbg');
        el.style.backgroundImage = `url(${bg})`;
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const loadMoreBtn = document.getElementById('load-more-btn');
        const hiddenProducts = document.querySelectorAll('.property__gallery .mix.d-none');
        let currentCount = 0;

        loadMoreBtn.addEventListener('click', function() {
            for (let i = currentCount; i < currentCount + 12; i++) {
                if (hiddenProducts[i]) {
                    hiddenProducts[i].classList.remove('d-none');
                } else {
                    loadMoreBtn.style.display = 'none'; // Ẩn nút khi hết sản phẩm để hiển thị
                    break;
                }
            }
            currentCount += 12;
        });
    });
</script>
