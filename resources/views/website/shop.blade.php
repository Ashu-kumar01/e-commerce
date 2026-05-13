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
                <div class="product-card">
                    <div class="img-wrap">
                        <img src="https://images.unsplash.com/photo-1578985545062-69928b1d9587?w=600&amp;q=80"
                            alt="Noir Obsidian" loading="lazy">
                        <span class="badge">Best Seller</span>
                        <div class="img-overlay">
                            <a href="{{ route('website.product') }}" class="overlay-btn">View Details</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="card-name serif">Noir Obsidian</div>
                        <div class="card-price">from ₹1,800</div>
                        <div class="card-selects">
                            <select class="elegant-select" id="flavor-1">
                                <option>Chocolate Ganache</option>
                                <option>Dark Truffle</option>
                                <option>Espresso</option>
                            </select>
                            <select class="elegant-select" id="size-1">
                                <option>500g</option>
                                <option>1 kg</option>
                                <option>2 kg</option>
                                <option>3 kg</option>
                            </select>
                        </div>
                        <div class="qty-row">
                            <span class="qty-label">Qty</span>
                            <div class="qty-ctrl">
                                <button class="qty-btn" onclick="changeQty(-1)">−</button>

                                <input type="text" name="qty-1" class="qty-num" id="qty" value="1" readonly>
                                <button class="qty-btn" onclick="changeQty(1)">+</button>
                            </div>
                        </div>
                        <div class="card-actions">
                            <button class="btn-cart" onclick="addCart('Noir Obsidian',1)">Add to Cart</button>
                            <a href="http://127.0.0.1:8000/product-summary" class="btn-buy"
                                style="text-decoration:none;display:flex;align-items:center;justify-content:center;">Buy
                                Now</a>
                        </div>
                    </div>
                </div>
                {{-- <div class="product-card">
                    <div class="img-wrap">
                        <img src="https://images.unsplash.com/photo-1535254973040-607b474cb50d?w=600&amp;q=80"
                            alt="Ivory Dream" loading="lazy">
                        <span class="badge">New</span>
                        <div class="img-overlay">
                            <a href="http://127.0.0.1:8000/product-details" class="overlay-btn">View Details</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="card-name serif">Ivory Dream</div>
                        <div class="card-price">from ₹1,500</div>
                        <div class="card-selects">
                            <select class="elegant-select" id="flavor-2">
                                <option>Vanilla Bean</option>
                                <option>White Chocolate</option>
                                <option>Coconut</option>
                            </select>
                            <select class="elegant-select" id="size-2">
                                <option>500g</option>
                                <option>1 kg</option>
                                <option>2 kg</option>
                                <option>3 kg</option>
                            </select>
                        </div>
                        <div class="qty-row">
                            <span class="qty-label">Qty</span>
                            <div class="qty-ctrl">
                                <button class="qty-btn" onclick="changeQty(2,-1)">−</button>
                                <span class="qty-num" id="qty-2">1</span>
                                <button class="qty-btn" onclick="changeQty(2,1)">+</button>
                            </div>
                        </div>
                        <div class="card-actions">
                            <button class="btn-cart" onclick="addCart('Ivory Dream',2)">Add to Cart</button>
                            <a href="http://127.0.0.1:8000/product-summary" class="btn-buy"
                                style="text-decoration:none;display:flex;align-items:center;justify-content:center;">Buy
                                Now</a>
                        </div>
                    </div>
                </div> --}}

            </div>
        </main>
    </div>

    <div class="toast" id="toast"></div>

    <script>
        function changeQty(key) {
            let RowInputQty = document.getElementById('qty');
            let currentQty = parseInt(RowInputQty.value);

            let newQty = currentQty + key;

            if (newQty < 0) {
                newQty = 0;
            }
            RowInputQty.value = newQty
            // console.log(newQty);
            // let typeof1 = typeof(RowInputQty, currenytQt)
            // console.log(newQty);

        }
    </script>
@endsection
