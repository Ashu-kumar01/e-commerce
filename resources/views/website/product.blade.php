@extends('website.layout.main')
@section('websiteContent')
    <div class="hero-strip py-6">
        <h1 class="serif">Your <em>Product Details</em></h1>
        <p>Review your exquisite selections before checkout</p>
    </div>

    <div class="breadcrumb mt-6 ">
        <a href="index.html">Home</a> / <a href="shop.html">Shop</a> / <span>{{ $product_details->product_name }}</span>
    </div>

    <div class="product-wrap my-6">
        <!-- GALLERY -->
        <div>
            <div class="gallery-main" id="mainImg">
                <img src="{{ asset('uploads/products/' . $product_details->images[0]) }}" alt="Noir Obsidian Cake"
                    id="mainImage" />

                <span class="gallery-badge">Best Seller</span>
            </div>
            <div class="gallery-thumbs">
                @foreach ($product_details->images as $image)
                    <div class="thumb active"
                        onclick="switchImg(this,'https://images.unsplash.com/photo-1578985545062-69928b1d9587?w=800&q=85')">
                        <img src="https://images.unsplash.com/photo-1578985545062-69928b1d9587?w=200&q=70" alt="" />
                    </div>
                @endforeach


            </div>
        </div>

        <!-- INFO -->
        <div class="product-info">
            <div class="info-category"> {{ $product_details->categorys->name }}</div>
            <h1 class="info-title serif">{{ $product_details->product_name }}</h1>
            <p class="info-subtitle serif">{{ $product_details->short_description }}</p>

            <div class="rating-row">
                <span class="stars">★★★★★</span>
                <span class="rating-count">4.9 · 127 reviews</span>
            </div>

            <div class="price-display">from <strong id="priceDisplay">₹{{ $product_details->selling_price }}</strong></div>
            <p class="price-note">* Price varies by size. Inclusive of all taxes & handcrafted decoration.</p>

            <!-- FLAVOUR -->
            {{-- <div class="opt-section">
                <span class="opt-label">Select Flavour</span>
                <div class="flavor-pills">
                    <button class="flavor-pill active" onclick="selectFlavor(this)">Chocolate Ganache</button>
                    <button class="flavor-pill" onclick="selectFlavor(this)">Dark Truffle</button>
                    <button class="flavor-pill" onclick="selectFlavor(this)">Espresso Noir</button>
                    <button class="flavor-pill" onclick="selectFlavor(this)">Hazelnut Praline</button>
                </div>
            </div> --}}

            <!-- SIZE -->
            <div class="opt-section">
                <span class="opt-label">Select Size</span>
                <div class="size-cards">
                    <div class="size-card active" onclick="selectSize(this,1800,'Serves 4–6')">
                        <div class="sw">500g</div>
                        <div class="sh">Serves 4–6</div>
                        <div class="sp">₹1,800</div>
                    </div>
                    <div class="size-card" onclick="selectSize(this,2800,'Serves 8–10')">
                        <div class="sw">1 kg</div>
                        <div class="sh">Serves 8–10</div>
                        <div class="sp">₹2,800</div>
                    </div>
                    <div class="size-card" onclick="selectSize(this,4800,'Serves 18–22')">
                        <div class="sw">2 kg</div>
                        <div class="sh">Serves 18–22</div>
                        <div class="sp">₹4,800</div>
                    </div>
                    <div class="size-card" onclick="selectSize(this,6500,'Serves 30+')">
                        <div class="sw">3 kg</div>
                        <div class="sh">Serves 30+</div>
                        <div class="sp">₹6,500</div>
                    </div>
                </div>
            </div>

            <!-- QTY -->
            <div class="qty-row">
                <div class="qty-ctrl">
                    <button class="qty-btn" onclick="changeQty(-1)">−</button>
                    <span class="qty-num" id="qty">1</span>
                    <button class="qty-btn" onclick="changeQty(1)">+</button>
                </div>
                <span class="qty-total" id="totalPrice">₹{{ $product_details->selling_price }}</span>
            </div>

            <!-- ACTIONS -->
            <div class="action-row">
                <button class="btn-cart-lg" onclick="showToast('Added to cart — Noir Obsidian')">Add to Cart</button>
                <a href="{{ route('website.summary', $product_details->id) }}" class="btn-buy-lg">Buy Now</a>
            </div>

            <!-- TRUST -->
            <div class="trust-row">
                <div class="trust-item"><span class="trust-icon">🎂</span>
                    <div class="trust-text">Made Fresh Daily</div>
                </div>
                <div class="trust-item"><span class="trust-icon">🚚</span>
                    <div class="trust-text">Same Day Delivery</div>
                </div>
                <div class="trust-item"><span class="trust-icon">✦</span>
                    <div class="trust-text">100% Artisanal</div>
                </div>
            </div>

            <!-- TABS -->
            <div class="tabs">
                <div class="tab-headers">
                    <button class="tab-h active" onclick="switchTab(this,'desc')">Description</button>
                    <button class="tab-h" onclick="switchTab(this,'ingr')">Ingredients</button>
                    <button class="tab-h" onclick="switchTab(this,'care')">Care & Delivery</button>
                </div>
                <div class="tab-body active" id="tab-desc">
                    <p>{{ $product_details->full_description }}</p>
                </div>
                <div class="tab-body" id="tab-ingr">
                    <p style="margin-bottom:1rem;color:var(--muted);font-size:.82rem;">All ingredients are ethically
                        sourced. May contain traces of nuts & dairy.</p>

                    <span class="ingr-tag">{{ $product_details->product_tags }}</span>

                </div>
                <div class="tab-body" id="tab-care">
                    <p><strong style="font-weight:500;">Delivery:</strong> We deliver same-day within Indore city
                        limits (orders before 2 PM) and next-day pan-India via our refrigerated courier partners.</p>
                    <br />
                    <p><strong style="font-weight:500;">Storage:</strong> Keep refrigerated at 2–4°C. Best consumed
                        within 48 hours of receipt. Allow 30 minutes at room temperature before serving for optimal
                        texture.</p>
                    <br />
                    <p><strong style="font-weight:500;">Customisation:</strong> Bespoke dedications and corporate
                        monograms available. Contact us at least 48 hours in advance.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- RELATED -->
    <div class="related-section">
        <div class="section-head">
            <p class="section-eyebrow">You May Also Love</p>
            <h2 class="section-title serif">Related Creations</h2>
        </div>
        <div class="related-grid">
            @foreach ($all_Products as $product)
                <a href="product.html" class="rel-card" style="text-decoration:none;color:inherit;">
                    <div class="rel-img"><img src="{{ asset('uploads/products/' . $product->images[0]) }}?w=600&amp;q=80"
                            alt="Ivory Dream" /></div>
                    <div class="rel-body">
                        <div class="rel-name serif">Ivory Dream</div>
                        <div class="rel-price">from ₹1,500</div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>

    <script>
        function switchTab(button, tabKey) {
            // Remove active class from all tab buttons
            document.querySelectorAll('.tab-h').forEach(btn => {
                btn.classList.remove('active');
            });

            // Remove active class from all tab bodies
            document.querySelectorAll('.tab-body').forEach(tab => {
                tab.classList.remove('active');
            });

            // Activate clicked button
            button.classList.add('active');

            // Activate selected tab content
            const activeTab = document.getElementById('tab-' + tabKey);
            if (activeTab) {
                activeTab.classList.add('active');
            }
        }
    </script>
@endsection
