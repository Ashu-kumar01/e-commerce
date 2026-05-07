<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Shop — Velour Patisserie</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link
        href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,600;1,300;1,400&family=Jost:wght@300;400;500&display=swap"
        rel="stylesheet" />

    <style>
        :root {
            --gold: #C9A84C;
            --gold-light: #E8D5A3;
            --cream: #FAF7F2;
            --charcoal: #1C1C1C;
            --muted: #6B6560;
        }

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

        /* NAV */
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
            letter-spacing: 0.05em;
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
            font-size: 0.8rem;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            font-weight: 400;
            transition: color 0.3s;
        }

        .nav-links a:hover,
        .nav-links a.active {
            color: var(--gold);
        }

        .nav-actions {
            display: flex;
            align-items: center;
            gap: 1.2rem;
        }

        .cart-btn {
            background: var(--gold);
            color: var(--charcoal);
            border: none;
            cursor: pointer;
            padding: 0.55rem 1.3rem;
            font-family: 'Jost', sans-serif;
            font-size: 0.75rem;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            font-weight: 500;
            text-decoration: none;
            transition: background 0.3s;
        }

        .cart-btn:hover {
            background: var(--gold-light);
        }

        /* HERO STRIP */
        .hero-strip {
            background: linear-gradient(135deg, #1C1C1C 60%, #2a2318 100%);
            padding: 3.5rem 2rem;
            text-align: center;
            border-bottom: 1px solid #333;
        }

        .hero-strip h1 {
            font-family: 'Cormorant Garamond', serif;
            font-size: clamp(2.5rem, 5vw, 4rem);
            font-weight: 300;
            color: #fff;
            letter-spacing: 0.02em;
        }

        .hero-strip h1 em {
            color: var(--gold);
            font-style: italic;
        }

        .hero-strip p {
            color: #999;
            font-size: 0.82rem;
            letter-spacing: 0.2em;
            text-transform: uppercase;
            margin-top: 0.8rem;
        }

        /* LAYOUT */
        .shop-layout {
            max-width: 1400px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 280px 1fr;
            gap: 3rem;
            padding: 3rem 2rem;
        }

        /* SIDEBAR */
        .sidebar {
            position: sticky;
            top: 80px;
            height: fit-content;
        }

        .filter-title {
            font-family: 'Cormorant Garamond', serif;
            font-size: 1.5rem;
            font-weight: 600;
            color: var(--charcoal);
            margin-bottom: 2rem;
            letter-spacing: 0.02em;
            border-bottom: 1px solid var(--gold);
            padding-bottom: 0.7rem;
        }

        .filter-section {
            margin-bottom: 2rem;
        }

        .filter-label {
            font-size: 0.72rem;
            letter-spacing: 0.18em;
            text-transform: uppercase;
            font-weight: 500;
            color: var(--muted);
            margin-bottom: 1rem;
            display: block;
        }

        .check-item {
            display: flex;
            align-items: center;
            gap: 0.6rem;
            margin-bottom: 0.6rem;
            cursor: pointer;
        }

        .check-item input[type="checkbox"] {
            accent-color: var(--gold);
            width: 15px;
            height: 15px;
            cursor: pointer;
        }

        .check-item label {
            font-size: 0.85rem;
            color: var(--charcoal);
            cursor: pointer;
        }

        .price-range-wrap {
            display: flex;
            flex-direction: column;
            gap: 0.8rem;
        }

        .price-row {
            display: flex;
            justify-content: space-between;
            font-size: 0.8rem;
            color: var(--muted);
        }

        input[type="range"] {
            -webkit-appearance: none;
            width: 100%;
            height: 2px;
            background: linear-gradient(to right, var(--gold) 0%, var(--gold) 70%, #ddd 70%, #ddd 100%);
            outline: none;
            border-radius: 2px;
        }

        input[type="range"]::-webkit-slider-thumb {
            -webkit-appearance: none;
            width: 16px;
            height: 16px;
            background: var(--gold);
            border-radius: 50%;
            cursor: pointer;
            border: 2px solid #fff;
            box-shadow: 0 0 4px rgba(0, 0, 0, 0.2);
        }

        .apply-filter {
            background: var(--charcoal);
            color: var(--gold);
            border: none;
            padding: 0.7rem 1.5rem;
            font-family: 'Jost', sans-serif;
            font-size: 0.75rem;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            cursor: pointer;
            width: 100%;
            margin-top: 0.5rem;
            transition: background 0.3s;
        }

        .apply-filter:hover {
            background: #333;
        }

        /* PRODUCT GRID */
        .product-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 2rem;
        }

        .product-card {
            background: #fff;
            overflow: hidden;
            position: relative;
            transition: transform 0.4s ease, box-shadow 0.4s ease;
            cursor: pointer;
        }

        .product-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.12);
        }

        .img-wrap {
            position: relative;
            overflow: hidden;
            aspect-ratio: 4/3;
            background: #f5f0e8;
        }

        .img-wrap img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.6s ease;
        }

        .product-card:hover .img-wrap img {
            transform: scale(1.07);
        }

        .img-overlay {
            position: absolute;
            inset: 0;
            background: rgba(28, 28, 28, 0.6);
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: opacity 0.4s;
        }

        .product-card:hover .img-overlay {
            opacity: 1;
        }

        .overlay-btn {
            color: #fff;
            border: 1px solid rgba(255, 255, 255, 0.6);
            padding: 0.5rem 1.2rem;
            font-size: 0.72rem;
            letter-spacing: 0.15em;
            text-transform: uppercase;
            text-decoration: none;
            font-family: 'Jost', sans-serif;
            transition: background 0.3s, border-color 0.3s;
        }

        .overlay-btn:hover {
            background: var(--gold);
            border-color: var(--gold);
        }

        .badge {
            position: absolute;
            top: 12px;
            left: 12px;
            background: var(--gold);
            color: #fff;
            font-size: 0.65rem;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            padding: 0.3rem 0.6rem;
            font-weight: 500;
        }

        .card-body {
            padding: 1.3rem 1.4rem 1.6rem;
        }

        .card-name {
            font-family: 'Cormorant Garamond', serif;
            font-size: 1.3rem;
            font-weight: 600;
            color: var(--charcoal);
            margin-bottom: 0.25rem;
        }

        .card-price {
            font-size: 1rem;
            color: var(--gold);
            font-weight: 500;
            margin-bottom: 1rem;
        }

        .card-selects {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 0.5rem;
            margin-bottom: 0.8rem;
        }

        .elegant-select {
            width: 100%;
            border: 1px solid #e0dbd4;
            background: var(--cream);
            padding: 0.45rem 0.6rem;
            font-family: 'Jost', sans-serif;
            font-size: 0.78rem;
            color: var(--charcoal);
            outline: none;
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='10' height='6' viewBox='0 0 10 6'%3E%3Cpath d='M0 0l5 6 5-6z' fill='%23888'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 8px center;
            cursor: pointer;
        }

        .elegant-select:focus {
            border-color: var(--gold);
        }

        .qty-row {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            margin-bottom: 1rem;
        }

        .qty-label {
            font-size: 0.72rem;
            color: var(--muted);
            letter-spacing: 0.1em;
            text-transform: uppercase;
        }

        .qty-ctrl {
            display: flex;
            align-items: center;
            border: 1px solid #e0dbd4;
        }

        .qty-btn {
            width: 30px;
            height: 30px;
            background: none;
            border: none;
            cursor: pointer;
            font-size: 1rem;
            color: var(--charcoal);
            transition: background 0.2s;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .qty-btn:hover {
            background: var(--cream);
        }

        .qty-num {
            width: 36px;
            text-align: center;
            font-size: 0.85rem;
            border-left: 1px solid #e0dbd4;
            border-right: 1px solid #e0dbd4;
            height: 30px;
            line-height: 30px;
        }

        .card-actions {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 0.5rem;
        }

        .btn-cart {
            background: none;
            border: 1px solid var(--charcoal);
            color: var(--charcoal);
            padding: 0.6rem;
            font-family: 'Jost', sans-serif;
            font-size: 0.72rem;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            cursor: pointer;
            transition: background 0.3s, color 0.3s;
        }

        .btn-cart:hover {
            background: var(--charcoal);
            color: #fff;
        }

        .btn-buy {
            background: var(--gold);
            border: 1px solid var(--gold);
            color: #fff;
            padding: 0.6rem;
            font-family: 'Jost', sans-serif;
            font-size: 0.72rem;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            cursor: pointer;
            transition: background 0.3s;
        }

        .btn-buy:hover {
            background: #b8922e;
            border-color: #b8922e;
        }

        /* SORT BAR */
        .sort-bar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 2rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid #e8e2d8;
        }

        .sort-bar span {
            font-size: 0.78rem;
            color: var(--muted);
        }

        .sort-select {
            border: 1px solid #e0dbd4;
            background: #fff;
            padding: 0.4rem 0.8rem;
            font-family: 'Jost', sans-serif;
            font-size: 0.78rem;
            color: var(--charcoal);
            outline: none;
            cursor: pointer;
        }

        /* TOAST */
        .toast {
            position: fixed;
            bottom: 2rem;
            right: 2rem;
            background: var(--charcoal);
            color: var(--gold);
            padding: 1rem 1.5rem;
            font-size: 0.82rem;
            letter-spacing: 0.1em;
            opacity: 0;
            transform: translateY(20px);
            transition: all 0.4s;
            z-index: 999;
            pointer-events: none;
        }

        .toast.show {
            opacity: 1;
            transform: translateY(0);
        }

        /* FOOTER */
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
            letter-spacing: 0.08em;
            display: block;
            margin-bottom: 1rem;
        }

        footer p {
            font-size: 0.75rem;
            letter-spacing: 0.1em;
        }

        @media(max-width:900px) {
            .shop-layout {
                grid-template-columns: 1fr;
            }

            .sidebar {
                position: static;
            }

            .filter-wrapper {
                display: grid;
                grid-template-columns: 1fr 1fr 1fr;
                gap: 1.5rem;
            }

            nav {
                padding: 0;
            }

            .nav-inner {
                padding: 1rem;
            }

            .nav-links {
                gap: 1rem;
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
                <li><a href="shop.html" class="active">Shop</a></li>
                <li><a href="product.html">Collection</a></li>
                <li><a href="#">About</a></li>
            </ul>
            <div class="nav-actions">
                <a href="cart.html" class="cart-btn">Cart (0)</a>
            </div>
        </div>
    </nav>

    <div class="hero-strip">
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
                        <input type="range" id="priceRange" min="500" max="8000" value="5600"
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
                    <div class="check-item"><input type="checkbox" id="choc" checked /><label
                            for="choc">Chocolate Ganache</label></div>
                    <div class="check-item"><input type="checkbox" id="van" checked /><label
                            for="van">Vanilla Bean</label></div>
                    <div class="check-item"><input type="checkbox" id="red" /><label for="red">Red
                            Velvet</label></div>
                    <div class="check-item"><input type="checkbox" id="fru" /><label for="fru">Summer
                            Fruit</label></div>
                    <div class="check-item"><input type="checkbox" id="matcha" /><label for="matcha">Matcha
                            Yuzu</label></div>
                    <div class="check-item"><input type="checkbox" id="cara" /><label for="cara">Salted
                            Caramel</label></div>
                </div>
                <div class="filter-section">
                    <span class="filter-label">Size</span>
                    <div class="check-item"><input type="checkbox" id="s500" checked /><label for="s500">500g —
                            Serves 4–6</label></div>
                    <div class="check-item"><input type="checkbox" id="s1kg" checked /><label for="s1kg">1 kg —
                            Serves 8–10</label></div>
                    <div class="check-item"><input type="checkbox" id="s2kg" /><label for="s2kg">2 kg — Serves
                            18–22</label></div>
                    <div class="check-item"><input type="checkbox" id="s3kg" /><label for="s3kg">3 kg — Serves
                            30+</label></div>
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
                <!-- Cards generated by JS -->
            </div>
        </main>
    </div>

    <div class="toast" id="toast"></div>

    <footer>
        <span class="logo-f">Velour</span>
        <p>© 2025 Velour Patisserie · All rights reserved</p>
    </footer>

    <script>
        const products = [{
                id: 1,
                name: "Noir Obsidian",
                flavors: ["Chocolate Ganache", "Dark Truffle", "Espresso"],
                price: 1800,
                badge: "Best Seller",
                img: "https://images.unsplash.com/photo-1578985545062-69928b1d9587?w=600&q=80"
            },
            {
                id: 2,
                name: "Ivory Dream",
                flavors: ["Vanilla Bean", "White Chocolate", "Coconut"],
                price: 1500,
                badge: "New",
                img: "https://images.unsplash.com/photo-1535254973040-607b474cb50d?w=600&q=80"
            },
            {
                id: 3,
                name: "Crimson Velvet",
                flavors: ["Red Velvet", "Cream Cheese", "Raspberry"],
                price: 1650,
                badge: null,
                img: "https://images.unsplash.com/photo-1586788224331-947f68671cf1?w=600&q=80"
            },
            {
                id: 4,
                name: "Jardin d'Été",
                flavors: ["Summer Fruit", "Lychee Rose", "Mango Passionfruit"],
                price: 2100,
                badge: "Limited",
                img: "https://images.unsplash.com/photo-1565958011703-44f9829ba187?w=600&q=80"
            },
            {
                id: 5,
                name: "Kyoto Zen",
                flavors: ["Matcha Yuzu", "Hojicha", "Black Sesame"],
                price: 2400,
                badge: "Premium",
                img: "https://images.unsplash.com/photo-1488477181946-6428a0291777?w=600&q=80"
            },
            {
                id: 6,
                name: "Golden Dulce",
                flavors: ["Salted Caramel", "Toffee Praline", "Burnt Butter"],
                price: 1900,
                badge: null,
                img: "https://images.unsplash.com/photo-1563729784474-d77dbb933a9e?w=600&q=80"
            },
            {
                id: 7,
                name: "Blossom Sakura",
                flavors: ["Cherry Blossom", "Strawberry", "Rose Litchi"],
                price: 2200,
                badge: "Seasonal",
                img: "https://images.unsplash.com/photo-1570145820259-b5b80c5c8bd6?w=600&q=80"
            },
            {
                id: 8,
                name: "Forêt Noire",
                flavors: ["Black Forest", "Kirsch Cherry", "Chantilly"],
                price: 1750,
                badge: null,
                img: "https://images.unsplash.com/photo-1606983340126-99ab4feaa64a?w=600&q=80"
            },
            {
                id: 9,
                name: "Celestial Orb",
                flavors: ["Champagne", "Gold Leaf", "Citrus Curd"],
                price: 3200,
                badge: "Signature",
                img: "https://images.unsplash.com/photo-1549399542-7e3f8b79c341?w=600&q=80"
            },
            {
                id: 10,
                name: "Petal & Pearl",
                flavors: ["Elderflower", "Lavender Honey", "Vanilla"],
                price: 2600,
                badge: null,
                img: "https://images.unsplash.com/photo-1516054575922-f0b8eeadec1a?w=600&q=80"
            },
            {
                id: 11,
                name: "Midnight Truffle",
                flavors: ["Chocolate Ganache", "Coffee Kirsch", "Hazelnut"],
                price: 2050,
                badge: null,
                img: "https://images.unsplash.com/photo-1614707267537-b85aaf00c4b7?w=600&q=80"
            },
            {
                id: 12,
                name: "Soleil d'Or",
                flavors: ["Lemon Curd", "Passion Fruit", "Vanilla"],
                price: 1850,
                badge: "New",
                img: "https://images.unsplash.com/photo-1571115177098-24ec42ed204d?w=600&q=80"
            },
        ];
        const sizes = ["500g", "1 kg", "2 kg", "3 kg"];
        const qtys = {};

        function renderProducts() {
            const grid = document.getElementById('productGrid');
            grid.innerHTML = products.map(p => {
                qtys[p.id] = 1;
                return `<div class="product-card">
      <div class="img-wrap">
        <img src="${p.img}" alt="${p.name}" loading="lazy"/>
        ${p.badge?`<span class="badge">${p.badge}</span>`:''}
        <div class="img-overlay">
          <a href="{{ route('website.product') }}" class="overlay-btn">View Details</a>
        </div>
      </div>
      <div class="card-body">
        <div class="card-name serif">${p.name}</div>
        <div class="card-price">from ₹${p.price.toLocaleString('en-IN')}</div>
        <div class="card-selects">
          <select class="elegant-select" id="flavor-${p.id}">
            ${p.flavors.map(f=>`<option>${f}</option>`).join('')}
          </select>
          <select class="elegant-select" id="size-${p.id}">
            ${sizes.map(s=>`<option>${s}</option>`).join('')}
          </select>
        </div>
        <div class="qty-row">
          <span class="qty-label">Qty</span>
          <div class="qty-ctrl">
            <button class="qty-btn" onclick="changeQty(${p.id},-1)">−</button>
            <span class="qty-num" id="qty-${p.id}">1</span>
            <button class="qty-btn" onclick="changeQty(${p.id},1)">+</button>
          </div>
        </div>
        <div class="card-actions">
          <button class="btn-cart" onclick="addCart('${p.name}',${p.id})">Add to Cart</button>
          <a href="{{route('website.summary')}}" class="btn-buy" style="text-decoration:none;display:flex;align-items:center;justify-content:center;">Buy Now</a>
        </div>
      </div>
    </div>`;
            }).join('');
        }

        function changeQty(id, delta) {
            qtys[id] = Math.max(1, qtys[id] + delta);
            document.getElementById('qty-' + id).textContent = qtys[id];
        }

        function addCart(name, id) {
            const fl = document.getElementById('flavor-' + id).value;
            const sz = document.getElementById('size-' + id).value;
            showToast(`"${name}" (${sz}, ${fl}) added to cart`);
        }

        function showToast(msg) {
            const t = document.getElementById('toast');
            t.textContent = msg;
            t.classList.add('show');
            setTimeout(() => t.classList.remove('show'), 3000);
        }

        renderProducts();
    </script>
</body>

</html>
