@extends('website.layout.main')
@section('websiteContent')
    <div class="hero-strip py-6">
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
@endsection
