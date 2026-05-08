@extends('website.layout.main')
@section('websiteContent')
    <div class="hero-strip py-6">
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
                            <input type="text" class="form-input" required placeholder="House number and street name">
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
                                    <input type="text" class="form-input" placeholder="Name as it appears on card">
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
                    <img src="https://images.unsplash.com/photo-1578985545062-69928b1d9587?w=200&q=80" alt="Noir Obsidian"
                        class="mini-img">
                    <div class="mini-details">
                        <h4 class="serif">Noir Obsidian</h4>
                        <p>1 kg / Dark Truffle</p>
                        <p>Qty: 1</p>
                    </div>
                    <div class="mini-price">₹1,800</div>
                </div>

                <div class="mini-cart-item">
                    <img src="https://images.unsplash.com/photo-1549399542-7e3f8b79c341?w=200&q=80" alt="Celestial Orb"
                        class="mini-img">
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
@endsection
