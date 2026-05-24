@extends('website.layout.main')
@section('websiteContent')
    <div class="hero-strip py-6  ">
        <h1 class="serif">Our <em>Exquisite</em> Collection</h1>
        <p>Handcrafted with finest Belgian couverture & seasonal botanicals</p>
    </div>

    <div class="shop-layout">
        <!-- SIDEBAR -->
        <aside class="sidebar">
            <p class="filter-title serif">Refine</p>
            <form action="" method="get">
                <div class="filter-wrapper">
                    <div class="filter-section">
                        <span class="filter-label">Price Range</span>
                        <div class="price-range-wrap">
                            <input type="range" name="range" id="priceRange" min="500" max="8000"
                                value="5600" oninput="document.getElementById('priceVal').textContent='₹'+this.value" />
                            <div class="price-row">
                                <span>₹500</span>
                                <span id="priceVal" style="color:var(--gold);font-weight:500;">₹5,600</span>
                                <span>₹8,000</span>
                            </div>
                        </div>
                    </div>
                    <div class="filter-section">
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="filter-label">Flavour</span>
                            <span class="filter-label"><button class="btn btn-primary btn-sm">View All</button></span>
                        </div>
                        @foreach ($categorys as $category)
                            <div class="check-item">
                                <label for="choc{{ $category->id }}">
                                    <input type="checkbox" id="choc{{ $category->id }}"
                                        name="category_{{ $category->id }}" />
                                    {{ $category->name }}
                                </label>
                            </div>
                        @endforeach



                    </div>
                    <div class="filter-section">
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="filter-label">Size</span>
                            <span class="filter-label"><button class="btn btn-primary btn-sm">View All</button></span>
                        </div>
                        @foreach ($sizess as $sizes)
                            <div class="check-item">
                                <label for="size_{{ $sizes->id }}">
                                    <input type="checkbox" id="size_{{ $sizes->id }}" name="size_{{ $sizes->id }}" />
                                    {{ $sizes->size }}</label>
                            </div>
                        @endforeach
                        <button class="apply-filter" onclick="showToast('Filters applied')">Apply Filters</button>
                    </div>
                </div>
            </form>
        </aside>

        <!-- PRODUCTS -->
        <main>
            <div class="sort-bar">
                <span>Showing <strong>12</strong> cakes</span>
                <select class="sort-select">
                    <option>Sort: Featured</option>
                    <option>Price: Low to High</option>
                    <option>Price: High to Low</option>
                    <option>Newest First</option>
                    <option>Best Sellers</option>
                </select>
            </div>

            <div class="product-grid" id="productGrid">
                @foreach ($all_Products as $products)
                    <div class="product-card">
                        <div class="img-wrap">
                            <img src="{{ asset('uploads/products/' . $products->images[0]) }}?w=600&amp;q=80"
                                alt="Noir Obsidian" loading="lazy">
                            @if ($products->bestseller == 1)
                                <span class="badge">Best Seller</span>
                            @endif

                            <div class="img-overlay">
                                <a href="{{ route('website.product', $products->id) }}" class="overlay-btn">View Details</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <span class="qty-label">category</span>
                            <div class="card-name serif">{{ $products->product_name }}</div>
                            <div class="card-price">from ₹{{ $products->selling_price }}</div>
                            <div class="card-selects">

                                <select class="elegant-select" id="size-1">
                                    @foreach ($products->sizes as $size)
                                        <option value="{{ $size }}">{{ $size }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="qty-row">
                                <span class="qty-label">Qty</span>
                                <div class="qty-ctrl">

                                    <button type="button" class="qty-btn"
                                        onclick="changeQty(-1, 'qty{{ $products->id }}')">
                                        −
                                    </button>

                                    <input type="text" class="qty-num" id="qty{{ $products->id }}" value="1"
                                        readonly>

                                    <button type="button" class="qty-btn"
                                        onclick="changeQty(1, 'qty{{ $products->id }}')">
                                        +
                                    </button>

                                </div>
                            </div>
                            <div class="card-actions">
                                <button class="btn-cart"
                                    onclick="addCart({{ $products->id }},'{{ $products->product_name }}')">Add
                                    to
                                    Cart</button>
                                <a href="{{ route('website.summary', $products->id) }}" class="btn-buy"
                                    style="text-decoration:none;display:flex;align-items:center;justify-content:center;">Buy
                                    Now</a>
                            </div>
                        </div>
                    </div>
                @endforeach



            </div>
        </main>
    </div>

    <div class="toast" id="toast"></div>

    <script>
        function changeQty(key, id) {
            let RowInputQty = document.getElementById(id);
            if (!RowInputQty) {
                console.log("ID Not Found:", id);
                return;
            }
            let currentQty = parseInt(RowInputQty.value);
            let newQty = currentQty + key;
            if (newQty < 1) {
                newQty = 1;
            }
            RowInputQty.value = newQty;
        }
    </script>
    <script>
        function addCart(id, name) {
            let carts = document.getElementById('carts');

            let cartsNum = parseInt(carts.innerText) || 0;

            carts.innerText = cartsNum + 1;

        }
    </script>
@endsection
