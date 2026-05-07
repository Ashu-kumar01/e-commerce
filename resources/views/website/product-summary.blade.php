<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Order Summary — Velour Patisserie</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link
        href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,600;1,300;1,400&family=Jost:wght@300;400;500&display=swap"
        rel="stylesheet" />

    <style>
        :root {
            --gold: #c28e00;
            --gold-light: #E8D5A3;
            --cream: #FAF7F2;
            --charcoal: #1C1C1C;
            --muted: #6B6560;
            --border: #e0dbd4;
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

        /* NAV (Identical to your shop page) */
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

        /* SUMMARY LAYOUT */
        .summary-layout {
            max-width: 1200px;
            margin: 4rem auto;
            display: grid;
            grid-template-columns: 1fr 380px;
            gap: 4rem;
            padding: 0 2rem;
        }

        /* CART ITEMS LIST */
        .cart-header {
            font-size: 1.8rem;
            font-weight: 600;
            color: var(--charcoal);
            margin-bottom: 2rem;
            border-bottom: 1px solid var(--gold);
            padding-bottom: 1rem;
        }

        .cart-item {
            display: grid;
            grid-template-columns: 120px 1fr auto;
            gap: 2rem;
            padding: 2rem 0;
            border-bottom: 1px solid var(--border);
            align-items: center;
        }

        .item-img {
            width: 100%;
            aspect-ratio: 1/1;
            object-fit: cover;
            background: #f5f0e8;
        }

        .item-details h3 {
            font-size: 1.4rem;
            font-weight: 600;
            color: var(--charcoal);
            margin-bottom: 0.5rem;
        }

        .item-meta {
            font-size: 0.85rem;
            color: var(--muted);
            margin-bottom: 1rem;
            line-height: 1.6;
        }

        .item-meta span {
            display: block;
        }

        .item-actions {
            display: flex;
            align-items: center;
            gap: 1.5rem;
        }

        .qty-ctrl {
            display: flex;
            align-items: center;
            border: 1px solid var(--border);
            background: #fff;
        }

        .qty-btn {
            width: 32px;
            height: 32px;
            background: none;
            border: none;
            cursor: pointer;
            font-size: 1.2rem;
            color: var(--charcoal);
            transition: background 0.2s;
        }

        .qty-btn:hover {
            background: var(--cream);
        }

        .qty-num {
            width: 40px;
            text-align: center;
            font-size: 0.9rem;
            border-left: 1px solid var(--border);
            border-right: 1px solid var(--border);
            height: 32px;
            line-height: 32px;
        }

        .remove-btn {
            background: none;
            border: none;
            color: #d9534f;
            font-family: 'Jost', sans-serif;
            font-size: 0.75rem;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            cursor: pointer;
            text-decoration: underline;
        }

        .item-total {
            font-size: 1.2rem;
            font-weight: 500;
            color: var(--gold);
            text-align: right;
        }

        /* ORDER SUMMARY BOX */
        .summary-box {
            background: #fff;
            padding: 2.5rem;
            border: 1px solid var(--border);
            height: fit-content;
            position: sticky;
            top: 100px;
        }

        .summary-title {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 1.5rem;
            border-bottom: 1px solid var(--border);
            padding-bottom: 1rem;
        }

        .summary-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 1rem;
            font-size: 0.95rem;
            color: var(--charcoal);
        }

        .summary-row.muted {
            color: var(--muted);
        }

        .summary-divider {
            height: 1px;
            background: var(--border);
            margin: 1.5rem 0;
        }

        .summary-total {
            display: flex;
            justify-content: space-between;
            font-size: 1.4rem;
            font-weight: 600;
            color: var(--gold);
            margin-bottom: 2rem;
        }

        .checkout-btn {
            background: var(--charcoal);
            color: var(--gold);
            border: none;
            width: 100%;
            padding: 1rem;
            font-family: 'Jost', sans-serif;
            font-size: 0.85rem;
            letter-spacing: 0.15em;
            text-transform: uppercase;
            font-weight: 500;
            cursor: pointer;
            transition: background 0.3s;
        }

        .checkout-btn:hover {
            background: #333;
        }

        .empty-cart {
            text-align: center;
            padding: 4rem 0;
            color: var(--muted);
        }

        .empty-cart a {
            display: inline-block;
            margin-top: 1.5rem;
            color: var(--gold);
            text-decoration: none;
            border-bottom: 1px solid var(--gold);
            padding-bottom: 2px;
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

        @media(max-width: 900px) {
            .summary-layout {
                grid-template-columns: 1fr;
            }

            .cart-item {
                grid-template-columns: 80px 1fr;
            }

            .item-total {
                grid-column: 1 / -1;
                text-align: left;
                margin-top: -1rem;
            }

            nav {
                padding: 0;
            }

            .nav-inner {
                padding: 1rem;
            }

            .nav-links {
                display: none;
                /* Usually hidden behind a hamburger menu on mobile */
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
                <a href="cart.html" class="cart-btn" id="navCartBtn">Cart (2)</a>
            </div>
        </div>
    </nav>

    <div class="hero-strip">
        <h1 class="serif">Your <em>Summary</em></h1>
        <p>Review your exquisite selections before checkout</p>
    </div>

    <div class="summary-layout">
        <!-- CART ITEMS -->
        <div class="cart-items-container">
            <h2 class="cart-header serif">Order Details</h2>
            <div id="cartList">
                <!-- Items injected by JS -->
            </div>
        </div>

        <!-- ORDER SUMMARY -->
        <aside>
            <div class="summary-box">
                <h2 class="summary-title serif">Summary</h2>

                <div class="summary-row muted">
                    <span>Subtotal</span>
                    <span id="subtotalDisplay">₹0</span>
                </div>
                <div class="summary-row muted">
                    <span>Taxes (5% GST)</span>
                    <span id="taxDisplay">₹0</span>
                </div>
                <div class="summary-row muted">
                    <span>Delivery</span>
                    <span>Complimentary</span>
                </div>

                <div class="summary-divider"></div>

                <div class="summary-total">
                    <span>Total</span>
                    <span id="totalDisplay">₹0</span>
                </div>

                <button class="checkout-btn" onclick="window.location.href='{{ route('website.checkout') }}'">Proceed to
                    Checkout</button>
            </div>
        </aside>
    </div>

    <footer>
        <span class="logo-f">Velour</span>
        <p>© 2025 Velour Patisserie · All rights reserved</p>
    </footer>

    <script>
        // Mock Cart Data (In a real app, this would be fetched from localStorage)
        let cartData = [{
                id: 1,
                productId: 1,
                name: "Noir Obsidian",
                flavor: "Dark Truffle",
                size: "1 kg",
                price: 1800,
                qty: 1,
                img: "https://images.unsplash.com/photo-1578985545062-69928b1d9587?w=600&q=80"
            },
            {
                id: 2,
                productId: 9,
                name: "Celestial Orb",
                flavor: "Champagne",
                size: "500g",
                price: 3200,
                qty: 2,
                img: "https://images.unsplash.com/photo-1549399542-7e3f8b79c341?w=600&q=80"
            }
        ];

        function renderCart() {
            const cartList = document.getElementById('cartList');
            const navBtn = document.getElementById('navCartBtn');

            if (cartData.length === 0) {
                cartList.innerHTML = `
                    <div class="empty-cart">
                        <h3>Your cart is beautifully empty.</h3>
                        <a href="shop.html">Return to Shop</a>
                    </div>
                `;
                navBtn.textContent = `Cart (0)`;
                updateTotals();
                return;
            }

            let totalItems = 0;

            cartList.innerHTML = cartData.map(item => {
                totalItems += item.qty;
                const itemTotal = item.price * item.qty;
                return `
                    <div class="cart-item">
                        <img src="${item.img}" alt="${item.name}" class="item-img" loading="lazy" />
                        <div class="item-details">
                            <h3 class="serif">${item.name}</h3>
                            <div class="item-meta">
                                <span><strong>Flavor:</strong> ${item.flavor}</span>
                                <span><strong>Size:</strong> ${item.size}</span>
                                <span><strong>Price:</strong> ₹${item.price.toLocaleString('en-IN')}</span>
                            </div>
                            <div class="item-actions">
                                <div class="qty-ctrl">
                                    <button class="qty-btn" onclick="updateQty(${item.id}, -1)">−</button>
                                    <span class="qty-num">${item.qty}</span>
                                    <button class="qty-btn" onclick="updateQty(${item.id}, 1)">+</button>
                                </div>
                                <button class="remove-btn" onclick="removeItem(${item.id})">Remove</button>
                            </div>
                        </div>
                        <div class="item-total">
                            ₹${itemTotal.toLocaleString('en-IN')}
                        </div>
                    </div>
                `;
            }).join('');

            navBtn.textContent = `Cart (${totalItems})`;
            updateTotals();
        }

        function updateQty(id, delta) {
            const item = cartData.find(i => i.id === id);
            if (item) {
                item.qty += delta;
                if (item.qty <= 0) {
                    removeItem(id);
                } else {
                    renderCart();
                }
            }
        }

        function removeItem(id) {
            cartData = cartData.filter(i => i.id !== id);
            renderCart();
        }

        function updateTotals() {
            const subtotal = cartData.reduce((sum, item) => sum + (item.price * item.qty), 0);
            const tax = subtotal * 0.05; // 5% GST example
            const total = subtotal + tax;

            document.getElementById('subtotalDisplay').textContent = '₹' + subtotal.toLocaleString('en-IN');
            document.getElementById('taxDisplay').textContent = '₹' + tax.toLocaleString('en-IN');
            document.getElementById('totalDisplay').textContent = '₹' + total.toLocaleString('en-IN');
        }

        // Initialize page
        renderCart();
    </script>
</body>

</html>
