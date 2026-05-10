@extends('website.layout.main')
@section('websiteContent')
    <div class="hero-strip py-6">
        <h1 class="serif">Your <em>Product Details</em></h1>
        <p>Review your exquisite selections before checkout</p>
    </div>

    <div class="breadcrumb mt-6 ">
        <a href="index.html">Home</a> / <a href="shop.html">Shop</a> / <span>Noir Obsidian</span>
    </div>

    <div class="product-wrap my-6">
        <!-- GALLERY -->
        <div>
            <div class="gallery-main" id="mainImg">
                <img src="https://images.unsplash.com/photo-1578985545062-69928b1d9587?w=800&q=85" alt="Noir Obsidian Cake"
                    id="mainImage" />
                <span class="gallery-badge">Best Seller</span>
            </div>
            <div class="gallery-thumbs">
                <div class="thumb active"
                    onclick="switchImg(this,'https://images.unsplash.com/photo-1578985545062-69928b1d9587?w=800&q=85')">
                    <img src="https://images.unsplash.com/photo-1578985545062-69928b1d9587?w=200&q=70" alt="" />
                </div>
                <div class="thumb"
                    onclick="switchImg(this,'https://images.unsplash.com/photo-1606983340126-99ab4feaa64a?w=800&q=85')">
                    <img src="https://images.unsplash.com/photo-1606983340126-99ab4feaa64a?w=200&q=70" alt="" />
                </div>
                <div class="thumb"
                    onclick="switchImg(this,'https://images.unsplash.com/photo-1563729784474-d77dbb933a9e?w=800&q=85')">
                    <img src="https://images.unsplash.com/photo-1563729784474-d77dbb933a9e?w=200&q=70" alt="" />
                </div>
                <div class="thumb"
                    onclick="switchImg(this,'https://images.unsplash.com/photo-1549399542-7e3f8b79c341?w=800&q=85')">
                    <img src="https://images.unsplash.com/photo-1549399542-7e3f8b79c341?w=200&q=70" alt="" />
                </div>
            </div>
        </div>

        <!-- INFO -->
        <div class="product-info">
            <div class="info-category">Signature Collection</div>
            <h1 class="info-title serif">Noir Obsidian</h1>
            <p class="info-subtitle serif">Belgian Dark Chocolate with Gold Leaf Accents</p>

            <div class="rating-row">
                <span class="stars">★★★★★</span>
                <span class="rating-count">4.9 · 127 reviews</span>
            </div>

            <div class="price-display">from <strong id="priceDisplay">₹1,800</strong></div>
            <p class="price-note">* Price varies by size. Inclusive of all taxes & handcrafted decoration.</p>

            <!-- FLAVOUR -->
            <div class="opt-section">
                <span class="opt-label">Select Flavour</span>
                <div class="flavor-pills">
                    <button class="flavor-pill active" onclick="selectFlavor(this)">Chocolate Ganache</button>
                    <button class="flavor-pill" onclick="selectFlavor(this)">Dark Truffle</button>
                    <button class="flavor-pill" onclick="selectFlavor(this)">Espresso Noir</button>
                    <button class="flavor-pill" onclick="selectFlavor(this)">Hazelnut Praline</button>
                </div>
            </div>

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
                <span class="qty-total" id="totalPrice">₹1,800</span>
            </div>

            <!-- ACTIONS -->
            <div class="action-row">
                <button class="btn-cart-lg" onclick="showToast('Added to cart — Noir Obsidian')">Add to Cart</button>
                <a href="checkout.html" class="btn-buy-lg">Buy Now</a>
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
                    <p>The <em>Noir Obsidian</em> is our most celebrated creation — a six-layer masterwork of 72%
                        Valrhona Guanaja chocolate sponge, each stratum brushed with espresso kirsch and sandwiched
                        between silken ganache. The exterior is lacquered with a glossy mirror glaze, then adorned with
                        hand-placed edible gold leaf and bespoke chocolate shards.</p>
                    <br />
                    <p>Every cake is assembled to order in our climate-controlled atelier, ensuring the ganache
                        maintains its signature tempering. The result is a slice that yields with the merest pressure of
                        a knife, revealing concentric layers of deep, complex flavour.</p>
                </div>
                <div class="tab-body" id="tab-ingr">
                    <p style="margin-bottom:1rem;color:var(--muted);font-size:.82rem;">All ingredients are ethically
                        sourced. May contain traces of nuts & dairy.</p>
                    <span class="ingr-tag">Valrhona Guanaja 72%</span>
                    <span class="ingr-tag">Free-range eggs</span>
                    <span class="ingr-tag">Cultured butter</span>
                    <span class="ingr-tag">Madagascar vanilla</span>
                    <span class="ingr-tag">Espresso extract</span>
                    <span class="ingr-tag">Kirsch liqueur</span>
                    <span class="ingr-tag">Organic cream</span>
                    <span class="ingr-tag">Cacao butter</span>
                    <span class="ingr-tag">Edible 24k gold leaf</span>
                    <span class="ingr-tag">Unbleached flour</span>
                    <span class="ingr-tag">Demerara sugar</span>
                    <span class="ingr-tag">Himalayan pink salt</span>
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
            <a href="product.html" class="rel-card" style="text-decoration:none;color:inherit;">
                <div class="rel-img"><img src="https://images.unsplash.com/photo-1535254973040-607b474cb50d?w=400&q=80"
                        alt="Ivory Dream" /></div>
                <div class="rel-body">
                    <div class="rel-name serif">Ivory Dream</div>
                    <div class="rel-price">from ₹1,500</div>
                </div>
            </a>
            <a href="product.html" class="rel-card" style="text-decoration:none;color:inherit;">
                <div class="rel-img"><img src="https://images.unsplash.com/photo-1565958011703-44f9829ba187?w=400&q=80"
                        alt="Jardin d'Été" /></div>
                <div class="rel-body">
                    <div class="rel-name serif">Jardin d'Été</div>
                    <div class="rel-price">from ₹2,100</div>
                </div>
            </a>
            <a href="product.html" class="rel-card" style="text-decoration:none;color:inherit;">
                <div class="rel-img"><img src="https://images.unsplash.com/photo-1488477181946-6428a0291777?w=400&q=80"
                        alt="Kyoto Zen" /></div>
                <div class="rel-body">
                    <div class="rel-name serif">Kyoto Zen</div>
                    <div class="rel-price">from ₹2,400</div>
                </div>
            </a>
            <a href="product.html" class="rel-card" style="text-decoration:none;color:inherit;">
                <div class="rel-img"><img src="https://images.unsplash.com/photo-1549399542-7e3f8b79c341?w=400&q=80"
                        alt="Celestial Orb" /></div>
                <div class="rel-body">
                    <div class="rel-name serif">Celestial Orb</div>
                    <div class="rel-price">from ₹3,200</div>
                </div>
            </a>
        </div>
    </div>
@endsection
