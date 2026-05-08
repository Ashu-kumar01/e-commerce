<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Noir Obsidian — Velour Patisserie</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link
        href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,600;1,300;1,400&family=Jost:wght@300;400;500&display=swap"
        rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
    

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Jost', sans-serif;
            background: var(--cream);
            color: var(--charcoal);
        }

        .serif {
            font-family: 'Cormorant Garamond', serif;
        }

        nav {
            background: var(--charcoal);
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .nav-inner {
            max-width: 1400px;
            margin: 0 auto;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 1.2rem 2rem;
        }

        .logo {
            font-family: 'Cormorant Garamond', serif;
            font-size: 1.6rem;
            font-weight: 600;
            color: var(--gold);
            letter-spacing: .05em;
            text-decoration: none;
        }

        .nav-links {
            display: flex;
            gap: 2rem;
            list-style: none;
        }

        .nav-links a {
            color: #ccc;
            text-decoration: none;
            font-size: .8rem;
            letter-spacing: .12em;
            text-transform: uppercase;
            font-weight: 400;
            transition: color .3s;
        }

        .nav-links a:hover {
            color: var(--gold);
        }

        .cart-btn {
            background: var(--gold);
            color: var(--charcoal);
            border: none;
            cursor: pointer;
            padding: .55rem 1.3rem;
            font-family: 'Jost', sans-serif;
            font-size: .75rem;
            letter-spacing: .1em;
            text-transform: uppercase;
            font-weight: 500;
            text-decoration: none;
            transition: background .3s;
        }

        .cart-btn:hover {
            background: var(--gold-light);
        }

        /* BREADCRUMB */
        .breadcrumb {
            max-width: 1400px;
            margin: 0 auto;
            padding: 1.2rem 2rem;
            display: flex;
            gap: .5rem;
            font-size: .75rem;
            color: var(--muted);
            align-items: center;
        }

        .breadcrumb a {
            color: var(--muted);
            text-decoration: none;
        }

        .breadcrumb a:hover {
            color: var(--gold);
        }

        .breadcrumb span {
            color: var(--charcoal);
        }

        /* PRODUCT LAYOUT */
        .product-wrap {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 2rem 4rem;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 5rem;
            align-items: start;
        }

        /* GALLERY */
        .gallery-main {
            aspect-ratio: 1;
            overflow: hidden;
            background: #f0ece4;
            position: relative;
        }

        .gallery-main img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform .6s ease;
        }

        .gallery-main:hover img {
            transform: scale(1.04);
        }

        .gallery-badge {
            position: absolute;
            top: 20px;
            right: 20px;
            background: var(--gold);
            color: #fff;
            font-size: .65rem;
            letter-spacing: .15em;
            text-transform: uppercase;
            padding: .35rem .8rem;
            font-weight: 500;
        }

        .gallery-thumbs {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: .6rem;
            margin-top: .7rem;
        }

        .thumb {
            aspect-ratio: 1;
            overflow: hidden;
            cursor: pointer;
            border: 2px solid transparent;
            transition: border-color .3s;
        }

        .thumb.active,
        .thumb:hover {
            border-color: var(--gold);
        }

        .thumb img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        /* PRODUCT INFO */
        .product-info {
            padding-top: 1rem;
        }

        .info-category {
            font-size: .72rem;
            letter-spacing: .2em;
            text-transform: uppercase;
            color: var(--gold);
            font-weight: 500;
            margin-bottom: .8rem;
        }

        .info-title {
            font-family: 'Cormorant Garamond', serif;
            font-size: 3rem;
            font-weight: 600;
            color: var(--charcoal);
            line-height: 1.1;
            margin-bottom: .5rem;
        }

        .info-subtitle {
            font-family: 'Cormorant Garamond', serif;
            font-size: 1.2rem;
            font-style: italic;
            color: var(--muted);
            margin-bottom: 1.5rem;
        }

        .rating-row {
            display: flex;
            align-items: center;
            gap: .8rem;
            margin-bottom: 1.5rem;
        }

        .stars {
            color: var(--gold);
            letter-spacing: .1em;
        }

        .rating-count {
            font-size: .8rem;
            color: var(--muted);
        }

        .price-display {
            font-size: 2rem;
            font-weight: 300;
            color: var(--charcoal);
            margin-bottom: .3rem;
        }

        .price-display strong {
            color: var(--gold);
            font-weight: 600;
        }

        .price-note {
            font-size: .75rem;
            color: var(--muted);
            margin-bottom: 2rem;
        }

        /* OPTIONS */
        .opt-label {
            font-size: .72rem;
            letter-spacing: .18em;
            text-transform: uppercase;
            color: var(--muted);
            font-weight: 500;
            margin-bottom: .8rem;
            display: block;
        }

        .opt-section {
            margin-bottom: 1.8rem;
        }

        .flavor-pills {
            display: flex;
            flex-wrap: wrap;
            gap: .5rem;
        }

        .flavor-pill {
            padding: .45rem 1rem;
            border: 1px solid #d5cfc5;
            background: #fff;
            font-size: .8rem;
            cursor: pointer;
            font-family: 'Jost', sans-serif;
            color: var(--charcoal);
            transition: all .25s;
        }

        .flavor-pill.active,
        .flavor-pill:hover {
            background: var(--charcoal);
            color: #fff;
            border-color: var(--charcoal);
        }

        .size-cards {
            display: flex;
            gap: .6rem;
        }

        .size-card {
            flex: 1;
            border: 1px solid #d5cfc5;
            padding: .8rem;
            text-align: center;
            cursor: pointer;
            background: #fff;
            transition: all .25s;
        }

        .size-card.active,
        .size-card:hover {
            border-color: var(--gold);
            background: rgba(201, 168, 76, .07);
        }

        .size-card .sw {
            font-size: .95rem;
            font-weight: 500;
            color: var(--charcoal);
        }

        .size-card .sh {
            font-size: .7rem;
            color: var(--muted);
            margin-top: .2rem;
        }

        .size-card .sp {
            font-size: .82rem;
            color: var(--gold);
            font-weight: 500;
            margin-top: .3rem;
        }

        /* QTY */
        .qty-row {
            display: flex;
            align-items: center;
            gap: 1.2rem;
            margin-bottom: 2rem;
        }

        .qty-ctrl {
            display: flex;
            align-items: center;
            border: 1px solid #d5cfc5;
            background: #fff;
        }

        .qty-btn {
            width: 44px;
            height: 44px;
            background: none;
            border: none;
            cursor: pointer;
            font-size: 1.2rem;
            color: var(--charcoal);
            transition: background .2s;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .qty-btn:hover {
            background: var(--cream);
        }

        .qty-num {
            width: 44px;
            text-align: center;
            font-size: 1rem;
            font-weight: 500;
            border-left: 1px solid #d5cfc5;
            border-right: 1px solid #d5cfc5;
            height: 44px;
            line-height: 44px;
        }

        .qty-total {
            font-size: 1.4rem;
            font-family: 'Cormorant Garamond', serif;
            font-weight: 600;
            color: var(--gold);
        }

        /* ACTIONS */
        .action-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: .8rem;
            margin-bottom: 2rem;
        }

        .btn-cart-lg {
            background: none;
            border: 1.5px solid var(--charcoal);
            color: var(--charcoal);
            padding: 1rem;
            font-family: 'Jost', sans-serif;
            font-size: .78rem;
            letter-spacing: .15em;
            text-transform: uppercase;
            cursor: pointer;
            font-weight: 500;
            transition: all .3s;
        }

        .btn-cart-lg:hover {
            background: var(--charcoal);
            color: #fff;
        }

        .btn-buy-lg {
            background: var(--gold);
            border: 1.5px solid var(--gold);
            color: #fff;
            padding: 1rem;
            font-family: 'Jost', sans-serif;
            font-size: .78rem;
            letter-spacing: .15em;
            text-transform: uppercase;
            cursor: pointer;
            font-weight: 500;
            transition: background .3s;
            text-decoration: none;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .btn-buy-lg:hover {
            background: #b8922e;
            border-color: #b8922e;
        }

        /* TRUST ROW */
        .trust-row {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 1rem;
            padding: 1.5rem 0;
            border-top: 1px solid #e8e2d8;
            border-bottom: 1px solid #e8e2d8;
            margin-bottom: 2rem;
        }

        .trust-item {
            text-align: center;
        }

        .trust-icon {
            font-size: 1.2rem;
            margin-bottom: .3rem;
            display: block;
        }

        .trust-text {
            font-size: .7rem;
            color: var(--muted);
            letter-spacing: .08em;
        }

        /* TABS */
        .tabs {
            margin-top: 2rem;
        }

        .tab-headers {
            display: flex;
            border-bottom: 1px solid #e8e2d8;
        }

        .tab-h {
            padding: .8rem 1.2rem;
            font-size: .75rem;
            letter-spacing: .15em;
            text-transform: uppercase;
            cursor: pointer;
            border: none;
            background: none;
            color: var(--muted);
            transition: color .3s;
            border-bottom: 2px solid transparent;
            margin-bottom: -1px;
        }

        .tab-h.active {
            color: var(--gold);
            border-bottom-color: var(--gold);
        }

        .tab-body {
            padding: 1.5rem 0;
            font-size: .88rem;
            line-height: 1.8;
            color: #444;
            display: none;
        }

        .tab-body.active {
            display: block;
        }

        .ingr-tag {
            display: inline-block;
            background: #fff;
            border: 1px solid #e0dbd4;
            padding: .3rem .7rem;
            font-size: .72rem;
            margin: .25rem;
            color: var(--muted);
        }

        /* RELATED */
        .related-section {
            max-width: 1400px;
            margin: 0 auto;
            padding: 4rem 2rem;
            border-top: 1px solid #e8e2d8;
        }

        .section-head {
            text-align: center;
            margin-bottom: 3rem;
        }

        .section-eyebrow {
            font-size: .72rem;
            letter-spacing: .2em;
            text-transform: uppercase;
            color: var(--gold);
            font-weight: 500;
            margin-bottom: .8rem;
        }

        .section-title {
            font-family: 'Cormorant Garamond', serif;
            font-size: 2.5rem;
            font-weight: 300;
            color: var(--charcoal);
        }

        .related-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 1.5rem;
        }

        .rel-card {
            background: #fff;
            overflow: hidden;
            cursor: pointer;
            transition: transform .4s, box-shadow .4s;
        }

        .rel-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, .1);
        }

        .rel-img {
            aspect-ratio: 1;
            overflow: hidden;
        }

        .rel-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform .5s;
        }

        .rel-card:hover .rel-img img {
            transform: scale(1.06);
        }

        .rel-body {
            padding: 1rem;
        }

        .rel-name {
            font-family: 'Cormorant Garamond', serif;
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: .2rem;
        }

        .rel-price {
            font-size: .85rem;
            color: var(--gold);
        }

        /* TOAST */
        .toast {
            position: fixed;
            bottom: 2rem;
            right: 2rem;
            background: var(--charcoal);
            color: var(--gold);
            padding: 1rem 1.5rem;
            font-size: .82rem;
            letter-spacing: .1em;
            opacity: 0;
            transform: translateY(20px);
            transition: all .4s;
            z-index: 999;
            pointer-events: none;
        }

        .toast.show {
            opacity: 1;
            transform: translateY(0);
        }

        footer {
            background: var(--charcoal);
            color: #888;
            padding: 3rem 2rem;
            text-align: center;
            margin-top: 4rem;
        }

        footer .logo-f {
            font-family: 'Cormorant Garamond', serif;
            font-size: 1.8rem;
            color: var(--gold);
            letter-spacing: .08em;
            display: block;
            margin-bottom: 1rem;
        }

        footer p {
            font-size: .75rem;
            letter-spacing: .1em;
        }

        @media(max-width:900px) {
            .product-wrap {
                grid-template-columns: 1fr;
                gap: 2rem;
            }

            .related-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .info-title {
                font-size: 2.2rem;
            }
        }
    </style>
</head>

<body>

    <nav>
        <div class="nav-inner">
            <a href="index.html" class="logo">Velour</a>
            <ul class="nav-links">
                <li><a href="index.html">Home</a></li>
                <li><a href="shop.html">Shop</a></li>
                <li><a href="product.html">Collection</a></li>
                <li><a href="#">About</a></li>
            </ul>
            <div class="nav-actions">
                <a href="cart.html" class="cart-btn">Cart (0)</a>
            </div>
        </div>
    </nav>

    <div class="breadcrumb">
        <a href="index.html">Home</a> / <a href="shop.html">Shop</a> / <span>Noir Obsidian</span>
    </div>

    <div class="product-wrap">
        <!-- GALLERY -->
        <div>
            <div class="gallery-main" id="mainImg">
                <img src="https://images.unsplash.com/photo-1578985545062-69928b1d9587?w=800&q=85"
                    alt="Noir Obsidian Cake" id="mainImage" />
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
                <div class="rel-img"><img
                        src="https://images.unsplash.com/photo-1535254973040-607b474cb50d?w=400&q=80"
                        alt="Ivory Dream" /></div>
                <div class="rel-body">
                    <div class="rel-name serif">Ivory Dream</div>
                    <div class="rel-price">from ₹1,500</div>
                </div>
            </a>
            <a href="product.html" class="rel-card" style="text-decoration:none;color:inherit;">
                <div class="rel-img"><img
                        src="https://images.unsplash.com/photo-1565958011703-44f9829ba187?w=400&q=80"
                        alt="Jardin d'Été" /></div>
                <div class="rel-body">
                    <div class="rel-name serif">Jardin d'Été</div>
                    <div class="rel-price">from ₹2,100</div>
                </div>
            </a>
            <a href="product.html" class="rel-card" style="text-decoration:none;color:inherit;">
                <div class="rel-img"><img
                        src="https://images.unsplash.com/photo-1488477181946-6428a0291777?w=400&q=80"
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

    <div class="toast" id="toast"></div>

    <footer>
        <span class="logo-f">Velour</span>
        <p>© 2025 Velour Patisserie · All rights reserved</p>
    </footer>

    <script>
        let qty = 1,
            basePrice = 1800;

        function changeQty(d) {
            qty = Math.max(1, qty + d);
            document.getElementById('qty').textContent = qty;
            document.getElementById('totalPrice').textContent = '₹' + (qty * basePrice).toLocaleString('en-IN');
        }

        function selectSize(el, price, serves) {
            document.querySelectorAll('.size-card').forEach(c => c.classList.remove('active'));
            el.classList.add('active');
            basePrice = price;
            document.getElementById('priceDisplay').textContent = '₹' + price.toLocaleString('en-IN');
            document.getElementById('totalPrice').textContent = '₹' + (qty * price).toLocaleString('en-IN');
        }

        function selectFlavor(el) {
            document.querySelectorAll('.flavor-pill').forEach(p => p.classList.remove('active'));
            el.classList.add('active');
        }

        function switchImg(el, src) {
            document.querySelectorAll('.thumb').forEach(t => t.classList.remove('active'));
            el.classList.add('active');
            document.getElementById('mainImage').src = src;
        }

        function switchTab(el, id) {
            document.querySelectorAll('.tab-h').forEach(t => t.classList.remove('active'));
            document.querySelectorAll('.tab-body').forEach(t => t.classList.remove('active'));
            el.classList.add('active');
            document.getElementById('tab-' + id).classList.add('active');
        }

        function showToast(msg) {
            const t = document.getElementById('toast');
            t.textContent = msg;
            t.classList.add('show');
            setTimeout(() => t.classList.remove('show'), 3000);
        }
    </script>
</body>

</html>
