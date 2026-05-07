<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Secure Checkout — Velour Patisserie</title>
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
            --error: #d9534f;
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

        .nav-links a:hover {
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
            padding: 2.5rem 2rem;
            text-align: center;
            border-bottom: 1px solid #333;
        }

        .hero-strip h1 {
            font-family: 'Cormorant Garamond', serif;
            font-size: clamp(2rem, 4vw, 3rem);
            font-weight: 300;
            color: #fff;
            letter-spacing: 0.02em;
        }

        .hero-strip h1 em {
            color: var(--gold);
            font-style: italic;
        }

        /* CHECKOUT LAYOUT */
        .checkout-layout {
            max-width: 1200px;
            margin: 3rem auto;
            display: grid;
            grid-template-columns: 1fr 400px;
            gap: 4rem;
            padding: 0 2rem;
        }

        /* FORM SECTIONS */
        .form-section {
            margin-bottom: 3rem;
        }

        .section-title {
            font-size: 1.6rem;
            font-weight: 600;
            color: var(--charcoal);
            margin-bottom: 1.5rem;
            padding-bottom: 0.5rem;
            border-bottom: 1px solid var(--gold);
            display: flex;
            align-items: center;
            gap: 0.8rem;
        }

        .section-title span {
            background: var(--gold);
            color: #fff;
            width: 24px;
            height: 24px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            font-family: 'Jost', sans-serif;
            font-size: 0.9rem;
            font-weight: 500;
        }

        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1.2rem;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 0.4rem;
        }

        .form-group.full-width {
            grid-column: 1 / -1;
        }

        .form-label {
            font-size: 0.8rem;
            letter-spacing: 0.05em;
            color: var(--muted);
            text-transform: uppercase;
        }

        .form-input,
        .form-select {
            padding: 0.85rem 1rem;
            border: 1px solid var(--border);
            background: #fff;
            font-family: 'Jost', sans-serif;
            font-size: 0.95rem;
            color: var(--charcoal);
            outline: none;
            transition: border-color 0.3s;
        }

        .form-input:focus,
        .form-select:focus {
            border-color: var(--gold);
        }

        .form-select {
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='10' height='6' viewBox='0 0 10 6'%3E%3Cpath d='M0 0l5 6 5-6z' fill='%23888'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 1rem center;
            cursor: pointer;
        }

        /* PAYMENT OPTIONS */
        .payment-methods {
            border: 1px solid var(--border);
            background: #fff;
        }

        .payment-method {
            padding: 1.2rem;
            border-bottom: 1px solid var(--border);
            display: flex;
            align-items: center;
            gap: 1rem;
            cursor: pointer;
            transition: background 0.3s;
        }

        .payment-method:last-child {
            border-bottom: none;
        }

        .payment-method:hover {
            background: var(--cream);
        }

        .payment-method input[type="radio"] {
            accent-color: var(--gold);
            width: 18px;
            height: 18px;
            cursor: pointer;
        }

        .payment-method label {
            font-size: 1rem;
            cursor: pointer;
            font-weight: 500;
            display: flex;
            justify-content: space-between;
            width: 100%;
            align-items: center;
        }

        .payment-method label img {
            height: 24px;
        }

        /* ORDER SUMMARY SIDEBAR */
        .summary-box {
            background: #fff;
            padding: 2rem;
            border: 1px solid var(--border);
            height: fit-content;
            position: sticky;
            top: 100px;
        }

        .summary-title {
            font-size: 1.4rem;
            font-weight: 600;
            margin-bottom: 1.5rem;
            border-bottom: 1px solid var(--border);
            padding-bottom: 1rem;
        }

        .mini-cart-item {
            display: flex;
            gap: 1rem;
            margin-bottom: 1.5rem;
        }

        .mini-img {
            width: 70px;
            height: 70px;
            object-fit: cover;
            background: var(--cream);
            border: 1px solid var(--border);
        }

        .mini-details h4 {
            font-size: 1rem;
            font-weight: 600;
            color: var(--charcoal);
            margin-bottom: 0.2rem;
        }

        .mini-details p {
            font-size: 0.8rem;
            color: var(--muted);
            line-height: 1.4;
        }

        .mini-price {
            margin-left: auto;
            font-weight: 500;
            color: var(--gold);
            font-size: 0.95rem;
        }

        .summary-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 1rem;
            font-size: 0.9rem;
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
            font-size: 1.3rem;
            font-weight: 600;
            color: var(--charcoal);
            margin-bottom: 2rem;
        }

        .summary-total span:last-child {
            color: var(--gold);
        }

        .btn-submit {
            background: var(--gold);
            color: #fff;
            border: none;
            width: 100%;
            padding: 1.2rem;
            font-family: 'Jost', sans-serif;
            font-size: 0.9rem;
            letter-spacing: 0.15em;
            text-transform: uppercase;
            font-weight: 500;
            cursor: pointer;
            transition: background 0.3s;
        }

        .btn-submit:hover {
            background: #b8922e;
        }

        /* FOOTER */
        footer {
            background: var(--charcoal);
            color: #888;
            padding: 3rem 2rem;
            text-align: center;
            margin-top: 4rem;
        }

        @media(max-width: 900px) {
            .checkout-layout {
                grid-template-columns: 1fr;
                gap: 2rem;
            }

            .form-grid {
                grid-template-columns: 1fr;
            }

            .summary-box {
                position: static;
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
            </ul>
            <div class="nav-actions">
                <a href="cart.html" class="cart-btn">Cart (2)</a>
            </div>
        </div>
    </nav>

    <div class="hero-strip">
        <h1 class="serif">Secure <em>Checkout</em></h1>
    </div>

    <div class="checkout-layout">

        <!-- CHECKOUT FORM -->
        <main>
            <form id="checkoutForm" onsubmit="handleCheckout(event)">

                <!-- Step 1: Contact -->
                <div class="form-section">
                    <h2 class="section-title serif"><span>1</span> Contact Information</h2>
                    <div class="form-grid">
                        <div class="form-group full-width">
                            <label class="form-label">Email Address</label>
                            <input type="email" class="form-input" required placeholder="your@email.com">
                        </div>
                        <div class="form-group full-width">
                            <label class="form-label">Phone Number</label>
                            <input type="tel" class="form-input" required placeholder="+91 XXXXX XXXXX">
                        </div>
                    </div>
                </div>

                <!-- Step 2: Shipping -->
                <div class="form-section">
                    <h2 class="section-title serif"><span>2</span> Delivery Details</h2>
                    <div class="form-grid">
                        <div class="form-group">
                            <label class="form-label">First Name</label>
                            <input type="text" class="form-input" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Last Name</label>
                            <input type="text" class="form-input" required>
                        </div>
                        <div class="form-group full-width">
                            <label class="form-label">Street Address</label>
                            <input type="text" class="form-input" required
                                placeholder="House number and street name">
                        </div>
                        <div class="form-group full-width">
                            <label class="form-label">Apartment, suite, etc. (optional)</label>
                            <input type="text" class="form-input">
                        </div>
                        <div class="form-group">
                            <label class="form-label">City</label>
                            <input type="text" class="form-input" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label">State</label>
                            <select class="form-select" required>
                                <option value="">Select State</option>
                                <option value="MH">Maharashtra</option>
                                <option value="DL">Delhi</option>
                                <option value="KA">Karnataka</option>
                                <option value="TS">Telangana</option>
                                <option value="WB">West Bengal</option>
                                <!-- Add other states as needed -->
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">PIN Code</label>
                            <input type="text" class="form-input" required>
                        </div>
                    </div>
                </div>

                <!-- Step 3: Payment -->
                <div class="form-section">
                    <h2 class="section-title serif"><span>3</span> Payment Method</h2>
                    <p style="font-size: 0.85rem; color: var(--muted); margin-bottom: 1rem;">All transactions are secure
                        and encrypted.</p>

                    <div class="payment-methods">
                        <div class="payment-method">
                            <input type="radio" name="payment" id="pay-card" checked>
                            <label for="pay-card">
                                Credit / Debit Card
                                <span style="font-size:0.75rem; color:var(--muted);">Visa, MasterCard, Amex</span>
                            </label>
                        </div>

                        <!-- Credit Card details expansion (Visible only when Card is selected) -->
                        <div id="card-details"
                            style="padding: 1.5rem; border-bottom: 1px solid var(--border); background: #fafafa;">
                            <div class="form-grid">
                                <div class="form-group full-width">
                                    <label class="form-label">Card Number</label>
                                    <input type="text" class="form-input" placeholder="0000 0000 0000 0000">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Expiration Date</label>
                                    <input type="text" class="form-input" placeholder="MM / YY">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Security Code (CVV)</label>
                                    <input type="text" class="form-input" placeholder="123">
                                </div>
                                <div class="form-group full-width">
                                    <label class="form-label">Name on Card</label>
                                    <input type="text" class="form-input"
                                        placeholder="Name as it appears on card">
                                </div>
                            </div>
                        </div>

                        <div class="payment-method">
                            <input type="radio" name="payment" id="pay-upi">
                            <label for="pay-upi">
                                UPI / QR Code
                                <span style="font-size:0.75rem; color:var(--muted);">GPay, PhonePe, Paytm</span>
                            </label>
                        </div>
                        <div class="payment-method">
                            <input type="radio" name="payment" id="pay-cod">
                            <label for="pay-cod">Cash on Delivery</label>
                        </div>
                    </div>
                </div>

            </form>
        </main>

        <!-- ORDER SUMMARY -->
        <aside>
            <div class="summary-box">
                <h2 class="summary-title serif">In Your Cart</h2>

                <!-- Mock Cart Items -->
                <div class="mini-cart-item">
                    <img src="https://images.unsplash.com/photo-1578985545062-69928b1d9587?w=200&q=80"
                        alt="Noir Obsidian" class="mini-img">
                    <div class="mini-details">
                        <h4 class="serif">Noir Obsidian</h4>
                        <p>1 kg / Dark Truffle</p>
                        <p>Qty: 1</p>
                    </div>
                    <div class="mini-price">₹1,800</div>
                </div>

                <div class="mini-cart-item">
                    <img src="https://images.unsplash.com/photo-1549399542-7e3f8b79c341?w=200&q=80"
                        alt="Celestial Orb" class="mini-img">
                    <div class="mini-details">
                        <h4 class="serif">Celestial Orb</h4>
                        <p>500g / Champagne</p>
                        <p>Qty: 2</p>
                    </div>
                    <div class="mini-price">₹6,400</div>
                </div>

                <div class="summary-divider"></div>

                <div class="summary-row">
                    <span>Subtotal</span>
                    <span>₹8,200</span>
                </div>
                <div class="summary-row">
                    <span>Taxes (5% GST)</span>
                    <span>₹410</span>
                </div>
                <div class="summary-row">
                    <span>Delivery</span>
                    <span style="color: var(--charcoal);">Complimentary</span>
                </div>

                <div class="summary-divider"></div>

                <div class="summary-total">
                    <span>Total</span>
                    <span>₹8,610</span>
                </div>

                <button type="submit" form="checkoutForm" class="btn-submit">Complete Order</button>
            </div>
        </aside>

    </div>

    <footer>
        <p>© 2025 Velour Patisserie · Secure Checkout</p>
    </footer>

    <script>
        // Toggle Card Details view based on payment selection
        const paymentRadios = document.querySelectorAll('input[name="payment"]');
        const cardDetails = document.getElementById('card-details');

        paymentRadios.forEach(radio => {
            radio.addEventListener('change', (e) => {
                if (e.target.id === 'pay-card') {
                    cardDetails.style.display = 'block';
                } else {
                    cardDetails.style.display = 'none';
                }
            });
        });

        // Handle form submission mockup
        function handleCheckout(e) {
            e.preventDefault();
            const btn = document.querySelector('.btn-submit');

            // Simulate processing state
            const originalText = btn.textContent;
            btn.textContent = "Processing...";
            btn.style.opacity = "0.7";
            btn.style.cursor = "not-allowed";

            setTimeout(() => {
                // In a real app, this would redirect to an Order Confirmation / Thank You page
                btn.style.background = "#28a745";
                btn.style.color = "#fff";
                btn.textContent = "Payment Successful!";

                setTimeout(() => {
                    alert("Order placed successfully! Redirecting to confirmation page...");
                    // window.location.href = 'success.html';
                }, 500);
            }, 2000);
        }
    </script>
</body>

</html>
