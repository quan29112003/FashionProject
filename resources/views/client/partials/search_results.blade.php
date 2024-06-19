{{-- resources/views/search-results.blade.php --}}
@if($products->isEmpty())
    <p>No products found.</p>
@else
    <ul>
        @foreach($products as $product)
            @foreach ($product->variants as $variant)
            <li>
                <div class="product-item">
                    <div class="pi-pic">
                        <a href="{{ route('detail', $product->id) }}"><img src="{{ asset('storage/' . $product->images->first()->url) }}" alt="{{ $product->name_product }}"></a>
                    </div>
                    <div class="pi-text">
                        <a href="{{ route('detail', $product->id) }}"><h6>{{ $product->name_product }}</h6></a>
                        <p>${{ $variant->price }}</p>
                        
                    </div>
                </div>
            </li>
            @endforeach
        @endforeach
    </ul>
@endif
