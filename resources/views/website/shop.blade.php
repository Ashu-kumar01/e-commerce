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
            <div class="filter-wrapper">
                <div class="filter-section">
                    <span class="filter-label">Price Range</span>
                    <div class="price-range-wrap">
                        <input type="range" name="range" id="priceRange" min="500" max="8000" value="5600"
                            oninput="document.getElementById('priceVal').textContent='₹'+this.value" />
                        <div class="price-row">
                            <span>₹500</span>
                            <span id="priceVal" style="color:var(--gold);font-weight:500;">₹5,600</span>
                            <span>₹8,000</span>
                        </div>
                    </div>
                </div>
                <div class="filter-section">
                    <span class="filter-label">Flavour</span>
                    <div class="check-item">
                        <input type="checkbox" id="choc" checked />
                        <label for="choc">Chocolate Ganache</label>
                    </div>
                    <div class="check-item">
                        <input type="checkbox" id="van" checked />
                        <label for="van">Vanilla
                            Bean</label>
                    </div>
                    <div class="check-item">
                        <input type="checkbox" id="red" />
                        <label for="red">Red Velvet</label>
                    </div>

                </div>
                <div class="filter-section">
                    <span class="filter-label">Size</span>
                    <div class="check-item">
                        <input type="checkbox" id="s500" checked />
                        <label for="s500">500g — Serves 4–6</label>
                    </div>

                    <button class="apply-filter" onclick="showToast('Filters applied')">Apply Filters</button>
                </div>
            </div>
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
                            <a href="{{route('website.product')}}" class="overlay-btn">View Details</a>
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
                                <button class="qty-btn" onclick="changeQty(1,-1)">−</button>
                                <span class="qty-num" id="qty-1">1</span>
                                <button class="qty-btn" onclick="changeQty(1,1)">+</button>
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
                <div class="product-card">
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
                </div>
                <div class="product-card">
                    <div class="img-wrap">
                        <img src="https://images.unsplash.com/photo-1586788224331-947f68671cf1?w=600&amp;q=80"
                            alt="Crimson Velvet" loading="lazy">

                        <div class="img-overlay">
                            <a href="http://127.0.0.1:8000/product-details" class="overlay-btn">View Details</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="card-name serif">Crimson Velvet</div>
                        <div class="card-price">from ₹1,650</div>
                        <div class="card-selects">
                            <select class="elegant-select" id="flavor-3">
                                <option>Red Velvet</option>
                                <option>Cream Cheese</option>
                                <option>Raspberry</option>
                            </select>
                            <select class="elegant-select" id="size-3">
                                <option>500g</option>
                                <option>1 kg</option>
                                <option>2 kg</option>
                                <option>3 kg</option>
                            </select>
                        </div>
                        <div class="qty-row">
                            <span class="qty-label">Qty</span>
                            <div class="qty-ctrl">
                                <button class="qty-btn" onclick="changeQty(3,-1)">−</button>
                                <span class="qty-num" id="qty-3">1</span>
                                <button class="qty-btn" onclick="changeQty(3,1)">+</button>
                            </div>
                        </div>
                        <div class="card-actions">
                            <button class="btn-cart" onclick="addCart('Crimson Velvet',3)">Add to Cart</button>
                            <a href="http://127.0.0.1:8000/product-summary" class="btn-buy"
                                style="text-decoration:none;display:flex;align-items:center;justify-content:center;">Buy
                                Now</a>
                        </div>
                    </div>
                </div>
                <div class="product-card">
                    <div class="img-wrap">
                        <img src="https://images.unsplash.com/photo-1565958011703-44f9829ba187?w=600&amp;q=80"
                            alt="Jardin d'Été" loading="lazy">
                        <span class="badge">Limited</span>
                        <div class="img-overlay">
                            <a href="http://127.0.0.1:8000/product-details" class="overlay-btn">View Details</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="card-name serif">Jardin d'Été</div>
                        <div class="card-price">from ₹2,100</div>
                        <div class="card-selects">
                            <select class="elegant-select" id="flavor-4">
                                <option>Summer Fruit</option>
                                <option>Lychee Rose</option>
                                <option>Mango Passionfruit</option>
                            </select>
                            <select class="elegant-select" id="size-4">
                                <option>500g</option>
                                <option>1 kg</option>
                                <option>2 kg</option>
                                <option>3 kg</option>
                            </select>
                        </div>
                        <div class="qty-row">
                            <span class="qty-label">Qty</span>
                            <div class="qty-ctrl">
                                <button class="qty-btn" onclick="changeQty(4,-1)">−</button>
                                <span class="qty-num" id="qty-4">1</span>
                                <button class="qty-btn" onclick="changeQty(4,1)">+</button>
                            </div>
                        </div>
                        <div class="card-actions">
                            <button class="btn-cart" onclick="addCart('Jardin d'Été',4)">Add to Cart</button>
                            <a href="http://127.0.0.1:8000/product-summary" class="btn-buy"
                                style="text-decoration:none;display:flex;align-items:center;justify-content:center;">Buy
                                Now</a>
                        </div>
                    </div>
                </div>
                <div class="product-card">
                    <div class="img-wrap">
                        <img src="https://images.unsplash.com/photo-1565958011703-44f9829ba187?w=600&amp;q=80"
                            alt="Jardin d'Été" loading="lazy">
                        <span class="badge">Limited</span>
                        <div class="img-overlay">
                            <a href="http://127.0.0.1:8000/product-details" class="overlay-btn">View Details</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="card-name serif">Jardin d'Été</div>
                        <div class="card-price">from ₹2,100</div>
                        <div class="card-selects">
                            <select class="elegant-select" id="flavor-4">
                                <option>Summer Fruit</option>
                                <option>Lychee Rose</option>
                                <option>Mango Passionfruit</option>
                            </select>
                            <select class="elegant-select" id="size-4">
                                <option>500g</option>
                                <option>1 kg</option>
                                <option>2 kg</option>
                                <option>3 kg</option>
                            </select>
                        </div>
                        <div class="qty-row">
                            <span class="qty-label">Qty</span>
                            <div class="qty-ctrl">
                                <button class="qty-btn" onclick="changeQty(4,-1)">−</button>
                                <span class="qty-num" id="qty-4">1</span>
                                <button class="qty-btn" onclick="changeQty(4,1)">+</button>
                            </div>
                        </div>
                        <div class="card-actions">
                            <button class="btn-cart" onclick="addCart('Jardin d'Été',4)">Add to Cart</button>
                            <a href="http://127.0.0.1:8000/product-summary" class="btn-buy"
                                style="text-decoration:none;display:flex;align-items:center;justify-content:center;">Buy
                                Now</a>
                        </div>
                    </div>
                </div>
                <div class="product-card">
                    <div class="img-wrap">
                        <img src="https://images.unsplash.com/photo-1565958011703-44f9829ba187?w=600&amp;q=80"
                            alt="Jardin d'Été" loading="lazy">
                        <span class="badge">Limited</span>
                        <div class="img-overlay">
                            <a href="http://127.0.0.1:8000/product-details" class="overlay-btn">View Details</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="card-name serif">Jardin d'Été</div>
                        <div class="card-price">from ₹2,100</div>
                        <div class="card-selects">
                            <select class="elegant-select" id="flavor-4">
                                <option>Summer Fruit</option>
                                <option>Lychee Rose</option>
                                <option>Mango Passionfruit</option>
                            </select>
                            <select class="elegant-select" id="size-4">
                                <option>500g</option>
                                <option>1 kg</option>
                                <option>2 kg</option>
                                <option>3 kg</option>
                            </select>
                        </div>
                        <div class="qty-row">
                            <span class="qty-label">Qty</span>
                            <div class="qty-ctrl">
                                <button class="qty-btn" onclick="changeQty(4,-1)">−</button>
                                <span class="qty-num" id="qty-4">1</span>
                                <button class="qty-btn" onclick="changeQty(4,1)">+</button>
                            </div>
                        </div>
                        <div class="card-actions">
                            <button class="btn-cart" onclick="addCart('Jardin d'Été',4)">Add to Cart</button>
                            <a href="http://127.0.0.1:8000/product-summary" class="btn-buy"
                                style="text-decoration:none;display:flex;align-items:center;justify-content:center;">Buy
                                Now</a>
                        </div>
                    </div>
                </div>

            </div>
        </main>
    </div>

    <div class="toast" id="toast"></div>
@endsection
