<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Checkout — NEXUS</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Fraunces:ital,opsz,wght@0,9..144,300;0,9..144,400;0,9..144,500;0,9..144,600;1,9..144,300&family=DM+Sans:opsz,wght@9..40,300;9..40,400;9..40,500;9..40,600&family=DM+Mono:wght@400;500&display=swap" rel="stylesheet">
  <script>
    tailwind.config = {
      theme: {
        extend: {
          fontFamily: {
            sans: ['DM Sans', 'sans-serif'],
            serif: ['Fraunces', 'serif'],
            mono: ['DM Mono', 'monospace'],
          }
        }
      }
    }
  </script>
  <style>
    *, *::before, *::after { box-sizing: border-box; }

    body {
      background: #F7F6F2;
      font-family: 'DM Sans', sans-serif;
      color: #1a1a1a;
      min-height: 100vh;
    }

    /* ── Subtle page texture ── */
    body::before {
      content: '';
      position: fixed; inset: 0;
      background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23000000' fill-opacity='0.015'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
      pointer-events: none; z-index: 0;
    }

    /* ── Scrollbar ── */
    ::-webkit-scrollbar { width: 4px; }
    ::-webkit-scrollbar-track { background: transparent; }
    ::-webkit-scrollbar-thumb { background: rgba(0,0,0,0.15); border-radius: 4px; }

    /* ── Card ── */
    .card {
      background: #ffffff;
      border: 1px solid rgba(0,0,0,0.07);
      border-radius: 20px;
      box-shadow: 0 1px 3px rgba(0,0,0,0.04), 0 4px 20px rgba(0,0,0,0.04);
      transition: box-shadow 0.2s ease;
    }

    /* ── Summary card (right) ── */
    .summary-card {
      background: #1C1C1E;
      border-radius: 20px;
      color: #f5f5f7;
    }

    /* ── Field ── */
    .field {
      width: 100%;
      background: #F7F6F2;
      border: 1.5px solid rgba(0,0,0,0.1);
      border-radius: 12px;
      font-size: 14px;
      font-family: 'DM Sans', sans-serif;
      padding: 12px 14px;
      color: #1a1a1a;
      outline: none;
      transition: all 0.2s;
      -webkit-appearance: none;
    }
    .field::placeholder { color: rgba(0,0,0,0.3); }
    .field:focus {
      background: #fff;
      border-color: #1C1C1E;
      box-shadow: 0 0 0 3px rgba(28,28,30,0.08);
    }

    /* ── Select field ── */
    .sel-field {
      width: 100%;
      background: #F7F6F2;
      border: 1.5px solid rgba(0,0,0,0.1);
      border-radius: 12px;
      font-size: 14px;
      font-family: 'DM Sans', sans-serif;
      padding: 12px 14px;
      color: #1a1a1a;
      outline: none;
      transition: all 0.2s;
      appearance: none;
      cursor: pointer;
      background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 24 24' fill='none' stroke='rgba(0,0,0,0.35)' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpolyline points='6 9 12 15 18 9'%3E%3C/polyline%3E%3C/svg%3E");
      background-repeat: no-repeat;
      background-position: right 14px center;
      padding-right: 36px;
    }
    .sel-field:focus {
      background-color: #fff;
      border-color: #1C1C1E;
      box-shadow: 0 0 0 3px rgba(28,28,30,0.08);
    }
    .sel-field option { background: #fff; color: #1a1a1a; }

    /* ── Label ── */
    .lbl {
      display: block;
      font-size: 11.5px;
      font-weight: 600;
      letter-spacing: 0.05em;
      text-transform: uppercase;
      color: rgba(0,0,0,0.4);
      margin-bottom: 6px;
    }

    /* ── Section title ── */
    .sec-num {
      width: 26px; height: 26px;
      border-radius: 50%;
      background: #1C1C1E;
      color: #fff;
      font-size: 12px;
      font-weight: 700;
      display: flex; align-items: center; justify-content: center;
      flex-shrink: 0;
    }
    .sec-title {
      font-family: 'Fraunces', serif;
      font-weight: 500;
      font-size: 18px;
      color: #1a1a1a;
      letter-spacing: -0.02em;
    }

    /* ── Delivery option ── */
    .delivery-opt {
      border: 1.5px solid rgba(0,0,0,0.1);
      border-radius: 14px;
      padding: 14px 16px;
      cursor: pointer;
      transition: all 0.2s;
      display: flex;
      align-items: center;
      gap: 12px;
      background: #F7F6F2;
    }
    .delivery-opt:hover { border-color: rgba(0,0,0,0.25); background: #f0efe9; }
    .delivery-opt.selected {
      border-color: #1C1C1E;
      background: #fff;
      box-shadow: 0 0 0 3px rgba(28,28,30,0.06);
    }

    /* ── Radio ── */
    .radio-dot {
      width: 18px; height: 18px;
      border-radius: 50%;
      border: 2px solid rgba(0,0,0,0.2);
      display: flex; align-items: center; justify-content: center;
      flex-shrink: 0;
      transition: all 0.2s;
    }
    .delivery-opt.selected .radio-dot {
      border-color: #1C1C1E;
    }
    .radio-inner {
      width: 8px; height: 8px;
      border-radius: 50%;
      background: #1C1C1E;
      opacity: 0;
      transform: scale(0);
      transition: all 0.2s cubic-bezier(0.4,0,0.2,1);
    }
    .delivery-opt.selected .radio-inner { opacity: 1; transform: scale(1); }

    /* ── Payment tabs ── */
    .pay-tab {
      flex: 1;
      padding: 10px 8px;
      border-radius: 10px;
      font-size: 13px;
      font-weight: 600;
      cursor: pointer;
      transition: all 0.2s;
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 7px;
      color: rgba(0,0,0,0.4);
      border: none;
      background: transparent;
    }
    .pay-tab.active {
      background: #fff;
      color: #1C1C1E;
      box-shadow: 0 1px 4px rgba(0,0,0,0.1), 0 2px 12px rgba(0,0,0,0.06);
    }
    .pay-tab-wrap {
      background: #F7F6F2;
      border-radius: 13px;
      padding: 4px;
      display: flex;
      gap: 2px;
      border: 1px solid rgba(0,0,0,0.07);
    }

    /* ── Card number input ── */
    .card-field-wrap {
      position: relative;
    }
    .card-icons {
      position: absolute;
      right: 12px; top: 50%;
      transform: translateY(-50%);
      display: flex; gap: 4px; align-items: center;
    }

    /* ── Primary CTA ── */
    .btn-checkout {
      background: #1C1C1E;
      color: #fff;
      border: none;
      border-radius: 14px;
      padding: 16px 24px;
      font-size: 15px;
      font-weight: 600;
      font-family: 'DM Sans', sans-serif;
      cursor: pointer;
      width: 100%;
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 8px;
      transition: all 0.2s;
      position: relative;
      overflow: hidden;
      letter-spacing: -0.01em;
    }
    .btn-checkout::before {
      content: '';
      position: absolute; inset: 0;
      background: linear-gradient(135deg, rgba(255,255,255,0.06), transparent);
      opacity: 0; transition: opacity 0.2s;
    }
    .btn-checkout:hover::before { opacity: 1; }
    .btn-checkout:hover { box-shadow: 0 4px 20px rgba(0,0,0,0.25); transform: translateY(-1px); }
    .btn-checkout:active { transform: translateY(0); }

    /* ── Secondary button ── */
    .btn-secondary {
      background: transparent;
      border: 1.5px solid rgba(0,0,0,0.12);
      border-radius: 14px;
      padding: 14px 24px;
      font-size: 14px;
      font-weight: 500;
      font-family: 'DM Sans', sans-serif;
      cursor: pointer;
      width: 100%;
      color: rgba(0,0,0,0.5);
      transition: all 0.2s;
    }
    .btn-secondary:hover { border-color: rgba(0,0,0,0.25); color: #1a1a1a; }

    /* ── Promo input ── */
    .promo-wrap {
      display: flex;
      gap: 8px;
    }
    .promo-btn {
      background: #1C1C1E;
      color: #fff;
      border: none;
      border-radius: 10px;
      padding: 0 18px;
      font-size: 13px;
      font-weight: 600;
      cursor: pointer;
      white-space: nowrap;
      transition: all 0.2s;
      font-family: 'DM Sans', sans-serif;
    }
    .promo-btn:hover { box-shadow: 0 4px 12px rgba(0,0,0,0.2); }

    /* ── Summary product item ── */
    .prod-img {
      width: 52px; height: 52px;
      border-radius: 10px;
      flex-shrink: 0;
      position: relative;
      overflow: hidden;
    }
    .qty-badge {
      position: absolute;
      top: -5px; right: -5px;
      width: 18px; height: 18px;
      border-radius: 50%;
      background: rgba(255,255,255,0.2);
      border: 1.5px solid rgba(255,255,255,0.25);
      display: flex; align-items: center; justify-content: center;
      font-size: 10px;
      font-weight: 700;
      color: #fff;
    }

    /* ── Divider ── */
    .divider { border: none; border-top: 1px solid rgba(0,0,0,0.07); }
    .divider-light { border: none; border-top: 1px solid rgba(255,255,255,0.1); }

    /* ── Secure badge ── */
    .secure-badge {
      display: inline-flex;
      align-items: center;
      gap: 5px;
      font-size: 11px;
      color: rgba(0,0,0,0.35);
      font-weight: 500;
    }

    /* ── Step animation ── */
    @keyframes fadeUp {
      from { opacity: 0; transform: translateY(12px); }
      to { opacity: 1; transform: translateY(0); }
    }
    .card { animation: fadeUp 0.4s ease both; }
    .card:nth-child(1) { animation-delay: 0.05s; }
    .card:nth-child(2) { animation-delay: 0.1s; }
    .card:nth-child(3) { animation-delay: 0.15s; }
    .card:nth-child(4) { animation-delay: 0.2s; }

    /* ── Progress steps ── */
    .step-line {
      height: 2px;
      flex: 1;
      border-radius: 99px;
    }

    /* ── Alt pay button ── */
    .alt-pay-btn {
      flex: 1;
      padding: 11px 12px;
      border-radius: 12px;
      border: 1.5px solid rgba(0,0,0,0.1);
      background: #F7F6F2;
      cursor: pointer;
      font-size: 13px;
      font-weight: 600;
      font-family: 'DM Sans', sans-serif;
      color: #1a1a1a;
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 7px;
      transition: all 0.2s;
    }
    .alt-pay-btn:hover {
      border-color: rgba(0,0,0,0.25);
      background: #f0efe9;
    }

    /* ── Toast ── */
    #toast {
      position: fixed;
      bottom: 24px; left: 50%;
      transform: translateX(-50%) translateY(20px);
      opacity: 0;
      pointer-events: none;
      transition: all 0.3s cubic-bezier(0.4,0,0.2,1);
      z-index: 9999;
    }
    #toast.show {
      opacity: 1;
      transform: translateX(-50%) translateY(0);
    }
  </style>
</head>
<body class="relative">

  <!-- ══════════════════════════════
       MAIN CONTENT (no header/footer/sidebar)
  ══════════════════════════════ -->
  <div class="relative z-10 min-h-screen px-4 sm:px-6 lg:px-8 py-8 md:py-12">
    <div class="max-w-6xl mx-auto">

      <!-- ── TOP HEADER ── -->
      <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 mb-8 md:mb-10">
        <div>
          <!-- Brand mark -->
          <div class="flex items-center gap-2 mb-2">
            <div class="w-7 h-7 rounded-lg flex items-center justify-center" style="background:#1C1C1E;">
              <svg width="14" height="14" viewBox="0 0 24 24" fill="none"><path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </div>
            <span style="font-family:'Fraunces',serif;font-weight:500;font-size:16px;letter-spacing:-0.02em;color:#1C1C1E;">NEXUS</span>
          </div>
          <h1 style="font-family:'Fraunces',serif;font-weight:400;font-size:clamp(24px,4vw,34px);letter-spacing:-0.03em;color:#1C1C1E;line-height:1.1;">Complete Your Order</h1>
          <p class="flex items-center gap-1.5 mt-1.5 secure-badge">
            <svg width="11" height="11" viewBox="0 0 24 24" fill="none"><rect x="3" y="11" width="18" height="11" rx="2" stroke="currentColor" stroke-width="2"/><path d="M7 11V7a5 5 0 0110 0v4" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg>
            Secured with 256-bit SSL encryption · Stripe-powered
          </p>
        </div>

        <!-- Progress indicator -->
        <div class="flex items-center gap-2 flex-shrink-0">
          <div class="flex items-center gap-1.5">
            <div class="w-6 h-6 rounded-full flex items-center justify-center text-[10px] font-bold text-white" style="background:#1C1C1E;">✓</div>
            <span class="text-xs font-medium text-gray-400 hidden sm:block">Cart</span>
          </div>
          <div class="step-line w-8 sm:w-12" style="background:#1C1C1E;"></div>
          <div class="flex items-center gap-1.5">
            <div class="w-6 h-6 rounded-full flex items-center justify-center text-[10px] font-bold text-white" style="background:#1C1C1E;">2</div>
            <span class="text-xs font-semibold hidden sm:block" style="color:#1C1C1E;">Checkout</span>
          </div>
          <div class="step-line w-8 sm:w-12" style="background:rgba(0,0,0,0.12);"></div>
          <div class="flex items-center gap-1.5">
            <div class="w-6 h-6 rounded-full flex items-center justify-center text-[10px] font-bold" style="background:rgba(0,0,0,0.08);color:rgba(0,0,0,0.35);">3</div>
            <span class="text-xs font-medium text-gray-400 hidden sm:block">Confirm</span>
          </div>
        </div>
      </div>

      <!-- ── SPLIT LAYOUT ── -->
      <div class="grid grid-cols-1 lg:grid-cols-[1fr_380px] xl:grid-cols-[1fr_420px] gap-6 lg:gap-8 items-start">

        <!-- ═══════════════ LEFT COLUMN ═══════════════ -->
        <div class="space-y-5">

          <!-- 1. SHIPPING INFORMATION -->
          <div class="card p-6 md:p-7">
            <div class="flex items-center gap-3 mb-6">
              <div class="sec-num">1</div>
              <h2 class="sec-title">Shipping Information</h2>
            </div>

            <div class="space-y-4">
              <!-- Name row -->
              <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                  <label class="lbl">First Name</label>
                  <input type="text" class="field" placeholder="Alex">
                </div>
                <div>
                  <label class="lbl">Last Name</label>
                  <input type="text" class="field" placeholder="Rivera">
                </div>
              </div>

              <!-- Email & Phone -->
              <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                  <label class="lbl">Email Address</label>
                  <div style="position:relative;">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" style="position:absolute;left:13px;top:50%;transform:translateY(-50%);color:rgba(0,0,0,0.3);pointer-events:none;"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><polyline points="22,6 12,13 2,6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    <input type="email" class="field" placeholder="alex@example.com" style="padding-left:38px;">
                  </div>
                </div>
                <div>
                  <label class="lbl">Phone Number</label>
                  <div style="position:relative;">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" style="position:absolute;left:13px;top:50%;transform:translateY(-50%);color:rgba(0,0,0,0.3);pointer-events:none;"><path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07A19.5 19.5 0 013.86 9.9 19.79 19.79 0 01.77 1.27 2 2 0 012.76 0h3a2 2 0 012 1.72 12.84 12.84 0 00.7 2.81 2 2 0 01-.45 2.11L6.91 7.91a16 16 0 006.09 6.09l1.27-1.27a2 2 0 012.11-.45 12.84 12.84 0 002.81.7A2 2 0 0122 14.92z" stroke="currentColor" stroke-width="2"/></svg>
                    <input type="tel" class="field" placeholder="+1 (555) 000-0000" style="padding-left:38px;">
                  </div>
                </div>
              </div>

              <!-- Address -->
              <div>
                <label class="lbl">Street Address</label>
                <input type="text" class="field" placeholder="123 Obsidian Lane, Apt 4B">
              </div>

              <!-- City, State, ZIP -->
              <div class="grid grid-cols-2 sm:grid-cols-3 gap-4">
                <div class="col-span-2 sm:col-span-1">
                  <label class="lbl">City</label>
                  <input type="text" class="field" placeholder="New York">
                </div>
                <div>
                  <label class="lbl">State</label>
                  <input type="text" class="field" placeholder="NY">
                </div>
                <div>
                  <label class="lbl">ZIP Code</label>
                  <input type="text" class="field" placeholder="10001" style="font-family:'DM Mono',monospace;font-size:13px;">
                </div>
              </div>

              <!-- Country -->
              <div>
                <label class="lbl">Country</label>
                <select class="sel-field">
                  <option disabled selected>Select country</option>
                  <option>🇺🇸 United States</option>
                  <option>🇬🇧 United Kingdom</option>
                  <option>🇨🇦 Canada</option>
                  <option>🇩🇪 Germany</option>
                  <option>🇫🇷 France</option>
                  <option>🇯🇵 Japan</option>
                  <option>🇦🇺 Australia</option>
                  <option>🇮🇳 India</option>
                </select>
              </div>

              <!-- Save address toggle -->
              <div class="flex items-center gap-3 pt-1">
                <div class="tog-sm on" id="saveAddr" onclick="toggleSave(this)" style="width:36px;height:20px;border-radius:99px;background:#1C1C1E;position:relative;cursor:pointer;transition:background 0.2s;flex-shrink:0;">
                  <div style="width:14px;height:14px;border-radius:50%;background:#fff;position:absolute;top:3px;left:calc(100% - 17px);transition:left 0.2s;"></div>
                </div>
                <span class="text-sm text-gray-500 font-medium">Save this address for future orders</span>
              </div>
            </div>
          </div>

          <!-- 2. DELIVERY OPTIONS -->
          <div class="card p-6 md:p-7">
            <div class="flex items-center gap-3 mb-5">
              <div class="sec-num">2</div>
              <h2 class="sec-title">Delivery Method</h2>
            </div>

            <div class="space-y-3">
              <!-- Standard -->
              <div class="delivery-opt selected" onclick="selectDelivery(this)">
                <div class="radio-dot"><div class="radio-inner"></div></div>
                <div class="flex-1">
                  <div class="flex items-center justify-between">
                    <div>
                      <div class="text-sm font-semibold text-gray-900">Standard Delivery</div>
                      <div class="text-xs text-gray-400 mt-0.5">Arrives in 5–7 business days</div>
                    </div>
                    <div class="text-right">
                      <div class="text-sm font-bold text-emerald-600">Free</div>
                      <div class="text-[10px] text-gray-400">For orders over $50</div>
                    </div>
                  </div>
                </div>
                <div class="flex-shrink-0">
                  <svg width="22" height="22" viewBox="0 0 24 24" fill="none" class="text-gray-400"><rect x="1" y="3" width="15" height="13" rx="1" stroke="currentColor" stroke-width="1.5"/><path d="M16 8h4l3 3v5h-7V8z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/><circle cx="5.5" cy="18.5" r="2.5" stroke="currentColor" stroke-width="1.5"/><circle cx="18.5" cy="18.5" r="2.5" stroke="currentColor" stroke-width="1.5"/></svg>
                </div>
              </div>

              <!-- Express -->
              <div class="delivery-opt" onclick="selectDelivery(this)">
                <div class="radio-dot"><div class="radio-inner"></div></div>
                <div class="flex-1">
                  <div class="flex items-center justify-between">
                    <div>
                      <div class="text-sm font-semibold text-gray-900 flex items-center gap-2">
                        Express Delivery
                        <span style="font-size:9px;font-weight:700;letter-spacing:0.06em;background:#FEF3C7;color:#92400E;padding:2px 7px;border-radius:5px;">FAST</span>
                      </div>
                      <div class="text-xs text-gray-400 mt-0.5">Arrives in 1–2 business days</div>
                    </div>
                    <div class="text-right">
                      <div class="text-sm font-bold text-gray-900">$12.99</div>
                      <div class="text-[10px] text-gray-400">Guaranteed</div>
                    </div>
                  </div>
                </div>
                <div class="flex-shrink-0">
                  <svg width="22" height="22" viewBox="0 0 24 24" fill="none" class="text-gray-400"><path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                </div>
              </div>

              <!-- Overnight -->
              <div class="delivery-opt" onclick="selectDelivery(this)">
                <div class="radio-dot"><div class="radio-inner"></div></div>
                <div class="flex-1">
                  <div class="flex items-center justify-between">
                    <div>
                      <div class="text-sm font-semibold text-gray-900 flex items-center gap-2">
                        Priority Overnight
                        <span style="font-size:9px;font-weight:700;letter-spacing:0.06em;background:#EDE9FE;color:#5B21B6;padding:2px 7px;border-radius:5px;">PREMIUM</span>
                      </div>
                      <div class="text-xs text-gray-400 mt-0.5">Next business day, before noon</div>
                    </div>
                    <div class="text-right">
                      <div class="text-sm font-bold text-gray-900">$24.99</div>
                      <div class="text-[10px] text-gray-400">Next day</div>
                    </div>
                  </div>
                </div>
                <div class="flex-shrink-0">
                  <svg width="22" height="22" viewBox="0 0 24 24" fill="none" class="text-gray-400"><path d="M22 2L11 13M22 2l-7 20-4-9-9-4 20-7z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                </div>
              </div>
            </div>
          </div>

          <!-- 3. PAYMENT METHOD -->
          <div class="card p-6 md:p-7">
            <div class="flex items-center gap-3 mb-5">
              <div class="sec-num">3</div>
              <h2 class="sec-title">Payment Method</h2>
            </div>

            <!-- Payment tabs -->
            <div class="pay-tab-wrap mb-5">
              <button class="pay-tab active" onclick="switchPay(this,'card')">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none"><rect x="1" y="4" width="22" height="16" rx="2" stroke="currentColor" stroke-width="2"/><path d="M1 10h22" stroke="currentColor" stroke-width="2"/></svg>
                Card
              </button>
              <button class="pay-tab" onclick="switchPay(this,'upi')">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none"><path d="M12 2L2 7l10 5 10-5-10-5z" stroke="currentColor" stroke-width="2" stroke-linecap="round"/><path d="M2 17l10 5 10-5M2 12l10 5 10-5" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg>
                UPI
              </button>
              <button class="pay-tab" onclick="switchPay(this,'paypal')">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none"><path d="M7 11C7 9 8.5 8 10 8h5c2 0 3 1.5 3 3 0 2.5-2 4-4 4H9l-1 4H5l2-8z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                PayPal
              </button>
              <button class="pay-tab" onclick="switchPay(this,'wallet')">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none"><path d="M20 7H4a2 2 0 00-2 2v10a2 2 0 002 2h16a2 2 0 002-2V9a2 2 0 00-2-2z" stroke="currentColor" stroke-width="2"/><circle cx="17" cy="14" r="2" fill="currentColor"/></svg>
                Wallet
              </button>
            </div>

            <!-- Card form -->
            <div id="panelCard" class="space-y-4">
              <!-- Card number -->
              <div>
                <label class="lbl">Card Number</label>
                <div class="card-field-wrap">
                  <input type="text" class="field" placeholder="1234  5678  9012  3456"
                    style="font-family:'DM Mono',monospace;font-size:14px;padding-right:100px;letter-spacing:0.08em;"
                    maxlength="19"
                    oninput="formatCard(this)">
                  <div class="card-icons">
                    <!-- Visa -->
                    <div style="width:32px;height:20px;background:#1A1F71;border-radius:4px;display:flex;align-items:center;justify-content:center;">
                      <span style="color:#F9A825;font-size:8px;font-weight:900;font-family:sans-serif;letter-spacing:-0.5px;">VISA</span>
                    </div>
                    <!-- MC -->
                    <div style="width:32px;height:20px;display:flex;align-items:center;justify-content:center;gap:-4px;">
                      <div style="width:14px;height:14px;border-radius:50%;background:#EB001B;opacity:0.9;"></div>
                      <div style="width:14px;height:14px;border-radius:50%;background:#F79E1B;opacity:0.9;margin-left:-5px;"></div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Cardholder name -->
              <div>
                <label class="lbl">Cardholder Name</label>
                <input type="text" class="field" placeholder="ALEX RIVERA" style="text-transform:uppercase;letter-spacing:0.05em;">
              </div>

              <!-- Expiry + CVV -->
              <div class="grid grid-cols-2 gap-4">
                <div>
                  <label class="lbl">Expiry Date</label>
                  <input type="text" class="field" placeholder="MM / YY" maxlength="7"
                    style="font-family:'DM Mono',monospace;font-size:14px;letter-spacing:0.06em;"
                    oninput="formatExpiry(this)">
                </div>
                <div>
                  <label class="lbl">CVV</label>
                  <div style="position:relative;">
                    <input type="password" class="field" placeholder="•••" maxlength="4"
                      style="font-family:'DM Mono',monospace;font-size:16px;letter-spacing:0.1em;"
                      id="cvvField">
                    <button onclick="toggleCvv()" style="position:absolute;right:12px;top:50%;transform:translateY(-50%);background:none;border:none;cursor:pointer;color:rgba(0,0,0,0.3);padding:2px;">
                      <svg width="14" height="14" viewBox="0 0 24 24" fill="none" id="cvvEye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z" stroke="currentColor" stroke-width="2"/><circle cx="12" cy="12" r="3" stroke="currentColor" stroke-width="2"/></svg>
                    </button>
                  </div>
                </div>
              </div>

              <!-- Security note -->
              <div class="flex items-center gap-2 pt-1" style="color:rgba(0,0,0,0.35);">
                <svg width="12" height="12" viewBox="0 0 24 24" fill="none"><rect x="3" y="11" width="18" height="11" rx="2" stroke="currentColor" stroke-width="2"/><path d="M7 11V7a5 5 0 0110 0v4" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg>
                <span style="font-size:11px;">Your card details are encrypted and never stored on our servers.</span>
              </div>
            </div>

            <!-- UPI panel -->
            <div id="panelUpi" class="hidden space-y-4">
              <div>
                <label class="lbl">UPI ID</label>
                <div style="position:relative;">
                  <input type="text" class="field" placeholder="yourname@upi" style="font-family:'DM Mono',monospace;font-size:13px;">
                  <span style="position:absolute;right:12px;top:50%;transform:translateY(-50%);font-size:11px;font-weight:700;color:rgba(0,0,0,0.3);">@verify</span>
                </div>
              </div>
              <div class="flex gap-3 flex-wrap">
                <button class="alt-pay-btn flex-none" style="width:auto;padding:10px 16px;">
                  <span style="font-size:16px;">G</span>
                  <span class="text-sm font-bold" style="color:#4285F4;">Pay</span>
                </button>
                <button class="alt-pay-btn flex-none" style="width:auto;padding:10px 16px;">
                  <span style="font-size:14px;">📱</span>
                  PhonePe
                </button>
                <button class="alt-pay-btn flex-none" style="width:auto;padding:10px 16px;">
                  <span style="font-size:14px;">🏦</span>
                  BHIM
                </button>
                <button class="alt-pay-btn flex-none" style="width:auto;padding:10px 16px;">
                  <span style="font-size:14px;">🅿️</span>
                  Paytm
                </button>
              </div>
            </div>

            <!-- PayPal panel -->
            <div id="panelPaypal" class="hidden text-center py-4">
              <div class="flex items-center justify-center gap-3 mb-5">
                <div style="width:40px;height:40px;border-radius:12px;background:#003087;display:flex;align-items:center;justify-content:center;">
                  <span style="color:#fff;font-weight:900;font-size:14px;font-family:sans-serif;">P</span>
                </div>
                <div>
                  <div class="text-sm font-semibold">PayPal</div>
                  <div class="text-xs text-gray-400">You'll be redirected to PayPal to complete payment</div>
                </div>
              </div>
              <button class="btn-checkout" style="background:#003087;border-radius:12px;">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none"><path d="M7 11C7 9 8.5 8 10 8h5c2 0 3 1.5 3 3 0 2.5-2 4-4 4H9l-1 4H5l2-8z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                Continue with PayPal
              </button>
            </div>

            <!-- Wallet panel -->
            <div id="panelWallet" class="hidden space-y-3">
              <div class="flex items-center justify-between p-4 rounded-xl" style="background:#F7F6F2;border:1.5px solid rgba(0,0,0,0.08);">
                <div class="flex items-center gap-3">
                  <div style="width:36px;height:36px;border-radius:10px;background:linear-gradient(135deg,#667eea,#764ba2);display:flex;align-items:center;justify-content:center;">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none"><path d="M20 7H4a2 2 0 00-2 2v10a2 2 0 002 2h16a2 2 0 002-2V9a2 2 0 00-2-2z" stroke="white" stroke-width="2"/><circle cx="17" cy="14" r="2" fill="white"/></svg>
                  </div>
                  <div>
                    <div class="text-sm font-semibold">NEXUS Wallet</div>
                    <div class="text-xs text-gray-400">Available balance</div>
                  </div>
                </div>
                <div class="text-sm font-bold" style="font-family:'DM Mono',monospace;">$48.50</div>
              </div>
              <div class="p-3 rounded-xl text-center text-sm text-gray-500" style="background:#FEF3C7;border:1px solid rgba(245,158,11,0.2);">
                ⚠️ Insufficient balance to cover full order — combine with card
              </div>
            </div>
          </div>

          <!-- Mobile order summary (visible on mobile only) -->
          <div class="lg:hidden">
            <div class="summary-card p-5">
              <div class="flex items-center justify-between mb-4">
                <h3 style="font-family:'Fraunces',serif;font-weight:500;font-size:16px;color:#f5f5f7;letter-spacing:-0.02em;">Order Summary</h3>
                <span class="text-xs" style="color:rgba(255,255,255,0.4);">3 items</span>
              </div>
              <!-- Products -->
              <div class="space-y-3 mb-4">
                <div class="flex items-center gap-3">
                  <div class="prod-img" style="background:linear-gradient(135deg,rgba(139,92,246,0.4),rgba(6,182,212,0.3));">
                    <div style="width:100%;height:100%;display:flex;align-items:center;justify-content:center;font-size:22px;">🧥</div>
                    <div class="qty-badge">2</div>
                  </div>
                  <div class="flex-1 min-w-0">
                    <div class="text-sm font-medium truncate" style="color:#f5f5f7;">Obsidian Hoodie</div>
                    <div class="text-xs" style="color:rgba(255,255,255,0.4);">Size: L · Black</div>
                  </div>
                  <div class="text-sm font-semibold font-mono" style="color:#f5f5f7;">$188</div>
                </div>
                <div class="flex items-center gap-3">
                  <div class="prod-img" style="background:linear-gradient(135deg,rgba(6,182,212,0.4),rgba(16,185,129,0.3));">
                    <div style="width:100%;height:100%;display:flex;align-items:center;justify-content:center;font-size:22px;">👟</div>
                    <div class="qty-badge">1</div>
                  </div>
                  <div class="flex-1 min-w-0">
                    <div class="text-sm font-medium truncate" style="color:#f5f5f7;">Phantom Runners</div>
                    <div class="text-xs" style="color:rgba(255,255,255,0.4);">Size: 10 · White</div>
                  </div>
                  <div class="text-sm font-semibold font-mono" style="color:#f5f5f7;">$149</div>
                </div>
              </div>
              <hr class="divider-light mb-4">
              <div class="space-y-2 text-sm mb-4">
                <div class="flex justify-between"><span style="color:rgba(255,255,255,0.5);">Subtotal</span><span style="color:rgba(255,255,255,0.8);" class="font-mono">$337.00</span></div>
                <div class="flex justify-between"><span style="color:rgba(255,255,255,0.5);">Shipping</span><span style="color:#34d399;" class="font-semibold">Free</span></div>
                <div class="flex justify-between"><span style="color:rgba(255,255,255,0.5);">Discount</span><span style="color:#f87171;" class="font-mono">−$20.00</span></div>
              </div>
              <hr class="divider-light mb-3">
              <div class="flex justify-between items-center">
                <span style="font-family:'Fraunces',serif;font-size:15px;color:#f5f5f7;font-weight:400;">Total</span>
                <span style="font-family:'DM Mono',monospace;font-size:20px;font-weight:500;color:#fff;">$317.00</span>
              </div>
            </div>
          </div>

          <!-- 4. PROMO CODE (mobile + desktop left) -->
          <div class="card p-6 md:p-7">
            <div class="flex items-center gap-3 mb-4">
              <div class="sec-num">4</div>
              <h2 class="sec-title">Promo Code</h2>
            </div>
            <div class="promo-wrap">
              <input type="text" class="field flex-1" placeholder="Enter promo code" id="promoInput"
                style="font-family:'DM Mono',monospace;font-size:13px;letter-spacing:0.06em;text-transform:uppercase;">
              <button class="promo-btn" onclick="applyPromo()">Apply</button>
            </div>
            <div id="promoMsg" class="hidden mt-2.5 text-xs font-semibold flex items-center gap-1.5"></div>
            <!-- Hint -->
            <p class="text-xs text-gray-400 mt-2">Try <span class="font-mono font-semibold text-gray-500 cursor-pointer hover:text-gray-800 transition-colors" onclick="document.getElementById('promoInput').value='NEXUS20'">NEXUS20</span> for 20% off</p>
          </div>

          <!-- 5. ACTION BUTTONS -->
          <div class="space-y-3">
            <button class="btn-checkout" onclick="placeOrder()">
              <svg width="16" height="16" viewBox="0 0 24 24" fill="none"><rect x="1" y="4" width="22" height="16" rx="2" stroke="white" stroke-width="2"/><path d="M1 10h22" stroke="white" stroke-width="2"/></svg>
              Place Order · $317.00
            </button>
            <button class="btn-secondary" onclick="continueShopping()">
              ← Continue Shopping
            </button>
            <!-- Trust signals -->
            <div class="flex items-center justify-center gap-4 pt-1 flex-wrap">
              <div class="secure-badge"><svg width="11" height="11" viewBox="0 0 24 24" fill="none"><rect x="3" y="11" width="18" height="11" rx="2" stroke="currentColor" stroke-width="2"/><path d="M7 11V7a5 5 0 0110 0v4" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg>SSL Secured</div>
              <div class="secure-badge"><svg width="11" height="11" viewBox="0 0 24 24" fill="none"><path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>Money-back Guarantee</div>
              <div class="secure-badge"><svg width="11" height="11" viewBox="0 0 24 24" fill="none"><path d="M3 9l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><polyline points="9 22 9 12 15 12 15 22" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>Free Returns</div>
            </div>
          </div>

        </div><!-- /left col -->

        <!-- ═══════════════ RIGHT: ORDER SUMMARY (sticky, desktop only) ═══════════════ -->
        <div class="hidden lg:block">
          <div class="sticky top-8 space-y-4">

            <!-- Summary card -->
            <div class="summary-card p-6">
              <div class="flex items-center justify-between mb-5">
                <h3 style="font-family:'Fraunces',serif;font-weight:400;font-size:18px;color:#f5f5f7;letter-spacing:-0.02em;">Order Summary</h3>
                <span class="text-xs" style="color:rgba(255,255,255,0.35);">3 items</span>
              </div>

              <!-- Products list -->
              <div class="space-y-4 mb-5">

                <!-- Product 1 -->
                <div class="flex items-center gap-3.5">
                  <div class="prod-img" style="background:linear-gradient(135deg,rgba(139,92,246,0.4),rgba(6,182,212,0.3));">
                    <div style="width:100%;height:100%;display:flex;align-items:center;justify-content:center;font-size:24px;">🧥</div>
                    <div class="qty-badge">2</div>
                  </div>
                  <div class="flex-1 min-w-0">
                    <div class="text-sm font-semibold" style="color:#f5f5f7;">Obsidian Hoodie</div>
                    <div class="text-xs mt-0.5" style="color:rgba(255,255,255,0.4);">Size: L · Color: Black</div>
                  </div>
                  <div class="text-sm font-semibold" style="color:#f5f5f7;font-family:'DM Mono',monospace;">$188</div>
                </div>

                <!-- Product 2 -->
                <div class="flex items-center gap-3.5">
                  <div class="prod-img" style="background:linear-gradient(135deg,rgba(6,182,212,0.4),rgba(16,185,129,0.3));">
                    <div style="width:100%;height:100%;display:flex;align-items:center;justify-content:center;font-size:24px;">👟</div>
                    <div class="qty-badge">1</div>
                  </div>
                  <div class="flex-1 min-w-0">
                    <div class="text-sm font-semibold" style="color:#f5f5f7;">Phantom Runners</div>
                    <div class="text-xs mt-0.5" style="color:rgba(255,255,255,0.4);">Size: 10 · Color: White</div>
                  </div>
                  <div class="text-sm font-semibold" style="color:#f5f5f7;font-family:'DM Mono',monospace;">$149</div>
                </div>

                <!-- Product 3 -->
                <div class="flex items-center gap-3.5">
                  <div class="prod-img" style="background:linear-gradient(135deg,rgba(245,158,11,0.35),rgba(239,68,68,0.25));">
                    <div style="width:100%;height:100%;display:flex;align-items:center;justify-content:center;font-size:24px;">🕶️</div>
                    <div class="qty-badge">1</div>
                  </div>
                  <div class="flex-1 min-w-0">
                    <div class="text-sm font-semibold" style="color:#f5f5f7;">Eclipse Shades</div>
                    <div class="text-xs mt-0.5" style="color:rgba(255,255,255,0.4);">One size · Matte Black</div>
                  </div>
                  <div class="text-sm font-semibold" style="color:#f5f5f7;font-family:'DM Mono',monospace;">$62</div>
                </div>

              </div>

              <hr class="divider-light mb-4">

              <!-- Price breakdown -->
              <div class="space-y-2.5 text-sm mb-4">
                <div class="flex justify-between">
                  <span style="color:rgba(255,255,255,0.45);">Subtotal (4 items)</span>
                  <span style="color:rgba(255,255,255,0.8);font-family:'DM Mono',monospace;">$399.00</span>
                </div>
                <div class="flex justify-between">
                  <span style="color:rgba(255,255,255,0.45);">Standard Shipping</span>
                  <span style="color:#34d399;font-weight:600;">Free</span>
                </div>
                <div class="flex justify-between items-center">
                  <span style="color:rgba(255,255,255,0.45);">Promo (NEXUS20)</span>
                  <span style="color:#f87171;font-family:'DM Mono',monospace;" id="discountLine">−$0.00</span>
                </div>
                <div class="flex justify-between">
                  <span style="color:rgba(255,255,255,0.45);">Tax (8.5%)</span>
                  <span style="color:rgba(255,255,255,0.8);font-family:'DM Mono',monospace;">$33.92</span>
                </div>
              </div>

              <hr class="divider-light mb-4">

              <!-- Total -->
              <div class="flex justify-between items-center mb-5">
                <div>
                  <div style="font-family:'Fraunces',serif;font-size:16px;color:#f5f5f7;font-weight:400;">Total Due</div>
                  <div class="text-xs mt-0.5" style="color:rgba(255,255,255,0.3);">All taxes & fees included</div>
                </div>
                <div style="font-family:'DM Mono',monospace;font-size:24px;font-weight:500;color:#fff;" id="totalDisplay">$432.92</div>
              </div>

              <!-- Place order button in summary -->
              <button class="btn-checkout" onclick="placeOrder()" style="border-radius:12px;font-size:14px;padding:14px 20px;">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none"><path d="M5 13l4 4L19 7" stroke="white" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                Place Order
              </button>

              <!-- Trust signals -->
              <div class="flex flex-col gap-2 mt-4">
                <div class="flex items-center gap-2" style="color:rgba(255,255,255,0.3);font-size:11px;">
                  <svg width="11" height="11" viewBox="0 0 24 24" fill="none"><rect x="3" y="11" width="18" height="11" rx="2" stroke="currentColor" stroke-width="2"/><path d="M7 11V7a5 5 0 0110 0v4" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg>
                  <span>Payments secured by Stripe</span>
                </div>
                <div class="flex items-center gap-2" style="color:rgba(255,255,255,0.3);font-size:11px;">
                  <svg width="11" height="11" viewBox="0 0 24 24" fill="none"><path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg>
                  <span>30-day free returns & money-back guarantee</span>
                </div>
              </div>
            </div>

            <!-- Promo input on desktop right side -->
            <div class="card p-5">
              <div class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-3">Promo / Gift Card</div>
              <div class="promo-wrap">
                <input type="text" class="field flex-1" placeholder="CODE" id="promoInputDesktop"
                  style="font-family:'DM Mono',monospace;font-size:13px;letter-spacing:0.08em;text-transform:uppercase;">
                <button class="promo-btn" onclick="applyPromoDesktop()">Apply</button>
              </div>
              <div id="promoMsgDesktop" class="hidden mt-2 text-xs font-semibold flex items-center gap-1.5"></div>
              <p class="text-xs text-gray-400 mt-2">Try <span class="font-mono font-semibold text-gray-500 cursor-pointer hover:text-gray-800 transition-colors" onclick="document.getElementById('promoInputDesktop').value='NEXUS20'">NEXUS20</span></p>
            </div>

            <!-- Estimated delivery -->
            <div class="card p-5">
              <div class="flex items-center gap-3">
                <div style="width:36px;height:36px;border-radius:10px;background:#F7F6F2;border:1px solid rgba(0,0,0,0.08);display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                  <svg width="16" height="16" viewBox="0 0 24 24" fill="none" style="color:rgba(0,0,0,0.4);"><rect x="1" y="3" width="15" height="13" rx="1" stroke="currentColor" stroke-width="1.5"/><path d="M16 8h4l3 3v5h-7V8z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/><circle cx="5.5" cy="18.5" r="2.5" stroke="currentColor" stroke-width="1.5"/><circle cx="18.5" cy="18.5" r="2.5" stroke="currentColor" stroke-width="1.5"/></svg>
                </div>
                <div>
                  <div class="text-sm font-semibold">Estimated Delivery</div>
                  <div class="text-xs text-gray-400 mt-0.5">Standard · Mon, Apr 14 – Wed, Apr 16</div>
                </div>
              </div>
            </div>

          </div>
        </div><!-- /right sticky -->

      </div><!-- /split layout -->
    </div><!-- /container -->
  </div>

  <!-- ── Toast ── -->
  <div id="toast">
    <div style="background:#1C1C1E;color:#f5f5f7;padding:12px 20px;border-radius:12px;font-size:13px;font-weight:500;font-family:'DM Sans',sans-serif;box-shadow:0 8px 30px rgba(0,0,0,0.2);display:flex;align-items:center;gap:10px;" id="toastInner">
      <span id="toastIcon">✓</span>
      <span id="toastText">Order placed!</span>
    </div>
  </div>

  <script>
    // ── Delivery option select ──
    function selectDelivery(el) {
      document.querySelectorAll('.delivery-opt').forEach(o => o.classList.remove('selected'));
      el.classList.add('selected');
      // Update price
      const isExpress = el.querySelector('.text-sm.font-semibold.text-gray-900')?.textContent?.includes('Express');
      const isOvernight = el.querySelector('.text-sm.font-semibold.text-gray-900')?.textContent?.includes('Overnight');
      let shipping = 'Free';
      let total = 432.92;
      if (isExpress) { shipping = '$12.99'; total += 12.99; }
      else if (isOvernight) { shipping = '$24.99'; total += 24.99; }
      document.getElementById('totalDisplay').textContent = `$${total.toFixed(2)}`;
    }

    // ── Payment tab switch ──
    function switchPay(tab, type) {
      document.querySelectorAll('.pay-tab').forEach(t => t.classList.remove('active'));
      tab.classList.add('active');
      const panels = ['card','upi','paypal','wallet'];
      panels.forEach(p => {
        const el = document.getElementById('panel' + p.charAt(0).toUpperCase() + p.slice(1));
        if (el) el.classList.toggle('hidden', p !== type);
      });
    }

    // ── Format card number ──
    function formatCard(input) {
      let v = input.value.replace(/\D/g, '').substring(0, 16);
      input.value = v.match(/.{1,4}/g)?.join('  ') || v;
    }

    // ── Format expiry ──
    function formatExpiry(input) {
      let v = input.value.replace(/\D/g, '').substring(0, 4);
      if (v.length >= 2) v = v.slice(0,2) + ' / ' + v.slice(2);
      input.value = v;
    }

    // ── Toggle CVV visibility ──
    function toggleCvv() {
      const f = document.getElementById('cvvField');
      f.type = f.type === 'password' ? 'text' : 'password';
    }

    // ── Save address toggle ──
    function toggleSave(el) {
      const thumb = el.querySelector('div');
      const isOn = thumb.style.left !== '3px';
      if (isOn) {
        thumb.style.left = '3px';
        el.style.background = 'rgba(0,0,0,0.15)';
      } else {
        thumb.style.left = 'calc(100% - 17px)';
        el.style.background = '#1C1C1E';
      }
    }

    // ── Promo code ──
    function applyPromo() { _applyPromo('promoInput','promoMsg'); }
    function applyPromoDesktop() { _applyPromo('promoInputDesktop','promoMsgDesktop'); }
    function _applyPromo(inputId, msgId) {
      const val = document.getElementById(inputId).value.trim().toUpperCase();
      const msg = document.getElementById(msgId);
      msg.classList.remove('hidden');
      if (val === 'NEXUS20') {
        msg.innerHTML = '<svg width="12" height="12" viewBox="0 0 24 24" fill="none"><path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" stroke="#16a34a" stroke-width="2" stroke-linecap="round"/></svg><span style="color:#16a34a;">NEXUS20 applied — 20% off!</span>';
        document.getElementById('discountLine').textContent = '−$79.80';
        document.getElementById('totalDisplay').textContent = '$353.12';
        showToast('🎉 Promo code applied successfully!', 'success');
      } else if (val === '') {
        msg.innerHTML = '<span style="color:rgba(0,0,0,0.4);">Enter a promo code first.</span>';
      } else {
        msg.innerHTML = '<svg width="12" height="12" viewBox="0 0 24 24" fill="none"><circle cx="12" cy="12" r="10" stroke="#dc2626" stroke-width="2"/><path d="M15 9l-6 6M9 9l6 6" stroke="#dc2626" stroke-width="2" stroke-linecap="round"/></svg><span style="color:#dc2626;">Invalid promo code.</span>';
      }
    }

    // ── Place order ──
    function placeOrder() {
      const btn = document.querySelector('.btn-checkout');
      btn.disabled = true;
      btn.innerHTML = '<svg class="animate-spin" width="16" height="16" viewBox="0 0 24 24" fill="none"><circle cx="12" cy="12" r="10" stroke="rgba(255,255,255,0.3)" stroke-width="3"/><path d="M12 2a10 10 0 0110 10" stroke="white" stroke-width="3" stroke-linecap="round"/></svg>Processing…';
      setTimeout(() => {
        showToast('✓ Order placed! Confirmation sent to your email.', 'success');
        btn.innerHTML = '✓ Order Confirmed!';
        btn.style.background = '#16a34a';
        btn.disabled = false;
      }, 2200);
    }

    // ── Continue shopping ──
    function continueShopping() {
      showToast('Returning to store…', 'info');
    }

    // ── Toast ──
    let toastTimer;
    function showToast(msg, type) {
      const toast = document.getElementById('toast');
      const inner = document.getElementById('toastInner');
      document.getElementById('toastText').textContent = msg;
      if (type === 'success') inner.style.borderLeft = '3px solid #34d399';
      else if (type === 'info') inner.style.borderLeft = '3px solid #60a5fa';
      else inner.style.borderLeft = '3px solid #f87171';
      toast.classList.add('show');
      clearTimeout(toastTimer);
      toastTimer = setTimeout(() => toast.classList.remove('show'), 3500);
    }

    // ── Spin animation for processing ──
    const style = document.createElement('style');
    style.textContent = `@keyframes spin{from{transform:rotate(0deg)}to{transform:rotate(360deg)}}.animate-spin{animation:spin 0.8s linear infinite}`;
    document.head.appendChild(style);
  </script>
</body>
</html>