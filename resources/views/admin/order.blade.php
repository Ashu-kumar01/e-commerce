@extends('admin.layouts.app')
@section('content')
    <style>
        /* Cards */
        .card {
            background: var(--card);
            border: 1px solid rgba(0, 0, 0, 0.07);
            border-radius: 20px;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.04), 0 4px 16px rgba(0, 0, 0, 0.03);
            transition: box-shadow 0.2s, transform 0.2s;
        }

        .card-hover:hover {
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.07), 0 8px 32px rgba(0, 0, 0, 0.06);
            transform: translateY(-1px);
        }

        /* KPI metric card */
        .metric-card {
            background: var(--card);
            border: 1px solid rgba(0, 0, 0, 0.07);
            border-radius: 18px;
            padding: 20px 22px;
            transition: all 0.2s;
            position: relative;
            overflow: hidden;
        }

        .metric-card::after {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            width: 80px;
            height: 80px;
            border-radius: 50%;
            filter: blur(30px);
            opacity: 0.06;
            pointer-events: none;
        }

        .metric-card:hover {
            box-shadow: 0 4px 24px rgba(0, 0, 0, 0.07);
            transform: translateY(-1px);
        }

        .metric-v::after {
            background: #7c3aed;
        }

        .metric-g::after {
            background: #059669;
        }

        .metric-b::after {
            background: #2563eb;
        }

        .metric-o::after {
            background: #d97706;
        }

        /* Buttons */
        .btn-dark {
            background: var(--ink);
            color: #fff;
            border: none;
            border-radius: 12px;
            padding: 10px 18px;
            font-size: 13px;
            font-weight: 600;
            font-family: 'DM Sans', sans-serif;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            transition: all 0.2s;
            white-space: nowrap;
        }

        .btn-dark:hover {
            background: #27272A;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.2);
            transform: translateY(-1px);
        }

        .btn-outline {
            background: transparent;
            color: var(--ink-2);
            border: 1.5px solid rgba(0, 0, 0, 0.12);
            border-radius: 12px;
            padding: 10px 18px;
            font-size: 13px;
            font-weight: 500;
            font-family: 'DM Sans', sans-serif;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            transition: all 0.2s;
            white-space: nowrap;
        }

        .btn-outline:hover {
            border-color: rgba(0, 0, 0, 0.25);
            color: var(--ink);
            background: rgba(0, 0, 0, 0.02);
        }

        .btn-danger {
            background: #FEF2F2;
            color: #DC2626;
            border: 1.5px solid #FECACA;
            border-radius: 12px;
            padding: 10px 18px;
            font-size: 13px;
            font-weight: 600;
            font-family: 'DM Sans', sans-serif;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            transition: all 0.2s;
        }

        .btn-danger:hover {
            background: #FEE2E2;
            border-color: #FCA5A5;
        }

        .btn-sm {
            padding: 7px 14px;
            font-size: 12px;
            border-radius: 9px;
        }

        /* Status badges */
        .badge {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            padding: 4px 12px;
            border-radius: 99px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: 0.02em;
        }

        .badge::before {
            content: '';
            width: 6px;
            height: 6px;
            border-radius: 50%;
            flex-shrink: 0;
        }

        .badge-shipped {
            background: #EFF6FF;
            color: #1D4ED8;
            border: 1px solid #BFDBFE;
        }

        .badge-shipped::before {
            background: #3B82F6;
            box-shadow: 0 0 5px rgba(59, 130, 246, 0.6);
        }

        .badge-pending {
            background: #FFFBEB;
            color: #92400E;
            border: 1px solid #FDE68A;
        }

        .badge-pending::before {
            background: #F59E0B;
        }

        .badge-delivered {
            background: #ECFDF5;
            color: #065F46;
            border: 1px solid #A7F3D0;
        }

        .badge-delivered::before {
            background: #10B981;
            box-shadow: 0 0 5px rgba(16, 185, 129, 0.5);
        }

        .badge-cancelled {
            background: #FEF2F2;
            color: #991B1B;
            border: 1px solid #FECACA;
        }

        .badge-cancelled::before {
            background: #EF4444;
        }

        .badge-processing {
            background: #F5F3FF;
            color: #5B21B6;
            border: 1px solid #DDD6FE;
        }

        .badge-processing::before {
            background: #8B5CF6;
            box-shadow: 0 0 5px rgba(139, 92, 246, 0.5);
            animation: pulse-dot 1.5s infinite;
        }

        .badge-paid {
            background: #ECFDF5;
            color: #065F46;
            border: 1px solid #A7F3D0;
        }

        .badge-paid::before {
            background: #10B981;
        }

        .badge-unpaid {
            background: #FEF2F2;
            color: #991B1B;
            border: 1px solid #FECACA;
        }

        .badge-unpaid::before {
            background: #EF4444;
        }

        @keyframes pulse-dot {

            0%,
            100% {
                opacity: 1;
                transform: scale(1);
            }

            50% {
                opacity: 0.5;
                transform: scale(0.7);
            }
        }

        /* Labels */
        .lbl {
            font-size: 10.5px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            color: var(--ink-3);
            margin-bottom: 5px;
            display: block;
        }

        /* Field */
        .field {
            width: 100%;
            background: #FAFAF9;
            border: 1.5px solid rgba(0, 0, 0, 0.09);
            border-radius: 12px;
            color: var(--ink);
            font-size: 13px;
            font-family: 'DM Sans', sans-serif;
            padding: 10px 13px;
            outline: none;
            transition: all 0.2s;
        }

        .field::placeholder {
            color: rgba(0, 0, 0, 0.25);
        }

        .field:focus {
            background: #fff;
            border-color: var(--ink);
            box-shadow: 0 0 0 3px rgba(24, 24, 27, 0.07);
        }

        /* Select */
        .sel {
            width: 100%;
            background: #141414ca;
            border: 1.5px solid rgba(0, 0, 0, 0.09);
            border-radius: 12px;
            color: var(--ink);
            font-size: 13px;
            font-family: 'DM Sans', sans-serif;
            padding: 10px 34px 10px 13px;
            outline: none;
            appearance: none;
            cursor: pointer;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 24 24' fill='none' stroke='rgba(0,0,0,0.35)' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpolyline points='6 9 12 15 18 9'%3E%3C/polyline%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 13px center;
            transition: all 0.2s;
        }

        .sel:focus {
            background-color: #07052c;
            border-color: var(--ink);
            box-shadow: 0 0 0 3px rgba(24, 24, 27, 0.07);
        }

        .sel option {
            background: #fff;
        }

        /* Divider */
        .dim {
            border: none;
            border-top: 1px solid rgba(0, 0, 0, 0.06);
        }

        /* Table */
        .tbl {
            width: 100%;
            border-collapse: collapse;
        }

        .tbl th {
            text-align: left;
            padding: 11px 16px;
            font-size: 10px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.09em;
            color: var(--ink-3);
            border-bottom: 1px solid rgba(0, 0, 0, 0.06);
            background: rgba(0, 0, 0, 0.015);
        }

        .tbl td {
            padding: 14px 16px;
            font-size: 13px;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
            vertical-align: middle;
        }

        .tbl tr:last-child td {
            border-bottom: none;
        }

        .tbl tbody tr {
            transition: background 0.15s;
        }

        .tbl tbody tr:hover {
            background: rgba(0, 0, 0, 0.018);
        }

        /* Product image placeholder */
        .prod-thumb {
            width: 46px;
            height: 46px;
            border-radius: 10px;
            border: 1px solid rgba(0, 0, 0, 0.07);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            flex-shrink: 0;
        }

        /* Timeline */
        .timeline-item {
            position: relative;
            padding-left: 32px;
            padding-bottom: 28px;
        }

        .timeline-item:last-child {
            padding-bottom: 0;
        }

        .timeline-item::before {
            content: '';
            position: absolute;
            left: 9px;
            top: 26px;
            width: 2px;
            bottom: 0;
            background: rgba(0, 0, 0, 0.08);
        }

        .timeline-item:last-child::before {
            display: none;
        }

        .tl-dot {
            position: absolute;
            left: 0;
            top: 2px;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .tl-dot-done {
            background: var(--ink);
        }

        .tl-dot-active {
            background: #3B82F6;
            box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.15);
        }

        .tl-dot-pending {
            background: rgba(0, 0, 0, 0.08);
            border: 2px solid rgba(0, 0, 0, 0.12);
        }

        /* Info row */
        .info-row {
            display: flex;
            gap: 12px;
            padding: 11px 0;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        }

        .info-row:last-child {
            border-bottom: none;
            padding-bottom: 0;
        }

        .info-row:first-child {
            padding-top: 0;
        }

        /* Section head */
        .sec-head {
            font-family: 'Instrument Serif', serif;
            font-size: 17px;
            color: var(--ink);
            letter-spacing: -0.02em;
        }

        /* Sticky action bar */
        .action-bar {
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border-top: 1px solid rgba(0, 0, 0, 0.07);
        }

        /* Animations */
        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .anim {
            animation: fadeUp 0.35s ease both;
        }

        .anim-1 {
            animation-delay: 0.04s;
        }

        .anim-2 {
            animation-delay: 0.08s;
        }

        .anim-3 {
            animation-delay: 0.12s;
        }

        .anim-4 {
            animation-delay: 0.16s;
        }

        .anim-5 {
            animation-delay: 0.20s;
        }

        .anim-6 {
            animation-delay: 0.24s;
        }

        .anim-7 {
            animation-delay: 0.28s;
        }

        /* Toast */
        #toast {
            position: fixed;
            bottom: 24px;
            left: 50%;
            transform: translateX(-50%) translateY(20px);
            opacity: 0;
            pointer-events: none;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            z-index: 9999;
        }

        #toast.show {
            opacity: 1;
            transform: translateX(-50%) translateY(0);
        }

        /* Print action indicator */
        .print-highlight {
            outline: 2px dashed rgba(0, 0, 0, 0.2);
            outline-offset: 4px;
            border-radius: 4px;
        }

        /* Hover copy */
        .copy-row:hover .copy-icon {
            opacity: 1;
        }

        .copy-icon {
            opacity: 0;
            transition: opacity 0.15s;
            cursor: pointer;
        }
    </style>


    <!-- ════════════════════════════ MAIN CONTENT ════════════════════════════ -->
    <div class="relative z-10 px-4 sm:px-6 lg:px-8 py-7 max-w-[1320px] mx-auto pb-28 overflow-y-auto">

        <!-- ── PAGE HEADER ── -->
        <div class="anim anim-1 flex flex-col sm:flex-row sm:items-start sm:justify-between gap-4 mb-7">
            <div>
                <!-- Breadcrumb -->
                <div class="flex items-center gap-1.5 mb-2.5 text-[11px]">
                    <a href="#" class="text-zinc-400 hover:text-zinc-600 transition-colors">Dashboard</a>
                    <svg width="9" height="9" viewBox="0 0 24 24" fill="none" class="text-zinc-300">
                        <path d="M9 18l6-6-6-6" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                    </svg>
                    <a href="#" class="text-zinc-400 hover:text-zinc-600 transition-colors">Orders</a>
                    <svg width="9" height="9" viewBox="0 0 24 24" fill="none" class="text-zinc-300">
                        <path d="M9 18l6-6-6-6" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                    </svg>
                    <span class="text-[11px] text-violet-400 font-medium">#ORD-10234</span>
                </div>

                <div class="flex items-center gap-3 flex-wrap">
                    <h1 class="font-display text-2xl md:text-[28px] font-bold grad-text leading-tight">
                        Order Details</h1>
                    <div class="flex items-center gap-2.5">
                        <span class="font-mono text-sm text-zinc-400 font-medium">#ORD-10234</span>
                        <span class="badge badge-shipped" id="mainStatusBadge">Shipped</span>
                    </div>
                </div>
                <p class="text-sm text-zinc-400 mt-1">Placed on <span class="font-medium text-zinc-600">March 29,
                        2026</span> · Last updated 2 hours ago</p>
            </div>

            <!-- Action buttons -->
            <div class="flex items-center gap-2.5 flex-shrink-0 flex-wrap">
                <button
                    class="btn-ghost text-xs py-2 px-4 sm:flex items-center gap-1.5 px-3 py-2 rounded-xl text-xs font-semibold text-white"
                    onclick="printInvoice()">
                    <svg width="13" height="13" viewBox="0 0 24 24" fill="none">
                        <polyline points="6 9 6 2 18 2 18 9" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" />
                        <path d="M6 18H4a2 2 0 01-2-2v-5a2 2 0 012-2h16a2 2 0 012 2v5a2 2 0 01-2 2h-2" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        <rect x="6" y="14" width="12" height="8" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    Print Invoice
                </button>
                <button
                    class="btn-sm btn-primary text-xs py-2 px-4 sm:flex items-center gap-1.5 px-3 py-2 rounded-xl text-xs font-semibold text-white"
                    onclick="showToast('Order exported as PDF','info')">
                    <svg width="13" height="13" viewBox="0 0 24 24" fill="none">
                        <path d="M21 15v4a2 2 0 01-2 2H5a2 2 0 01-2-2v-4M7 10l5 5 5-5M12 15V3" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    Export
                </button>
                <button
                    class="btn-sm btn-sm-primary text-xs py-2 px-4 sm:flex items-center gap-1.5 px-3 py-2 rounded-xl text-xs font-semibold text-white"
                    style="background:linear-gradient(135deg,#0891b2,#0e7490);border-color:rgba(6,182,212,0.4);"
                    onclick="openStatusModal()">
                    <svg width="13" height="13" viewBox="0 0 24 24" fill="none">
                        <path d="M11 4H4a2 2 0 00-2 2v14a2 2 0 002 2h14a2 2 0 002-2v-7" stroke="white" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M18.5 2.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 9.5-9.5z" stroke="white" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    Update Status
                </button>
            </div>
        </div>

        <!-- ── KPI METRIC CARDS ── -->
        <div class="anim anim-2 grid grid-cols-2 md:grid-cols-4 gap-4 mb-6">

            <!-- Total Amount -->
            <div class="metric-card metric-v">
                <div class="flex items-start justify-between mb-3">
                    <div class="text-[10px] text-gray-500 uppercase tracking-widest">Total Amount</div>
                    <div
                        style="width:32px;height:32px;border-radius:9px;background:rgba(124,58,237,0.08);border:1px solid rgba(124,58,237,0.12);display:flex;align-items:center;justify-content:center;">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" class="text-violet-500">
                            <path d="M12 1v22M17 5H9.5a3.5 3.5 0 100 7h5a3.5 3.5 0 110 7H6" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" />
                        </svg>
                    </div>
                </div>
                <div class="text-xl font-display font-bold text-white">
                    $432.92</div>
                <div class="text-xs text-zinc-400 mt-1">4 items · Incl. tax</div>
            </div>

            <!-- Payment Status -->
            <div class="metric-card metric-g">
                <div class="flex items-start justify-between mb-3">
                    <div class="text-[10px] text-gray-500 uppercase tracking-widest">Payment</div>
                    <div
                        style="width:32px;height:32px;border-radius:9px;background:rgba(5,150,105,0.08);border:1px solid rgba(5,150,105,0.12);display:flex;align-items:center;justify-content:center;">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" class="text-emerald-600">
                            <rect x="1" y="4" width="22" height="16" rx="2" stroke="currentColor"
                                stroke-width="2" />
                            <path d="M1 10h22" stroke="currentColor" stroke-width="2" />
                        </svg>
                    </div>
                </div>
                <div class="flex items-center gap-2">
                    <span class="badge badge-paid">Paid</span>
                </div>
                <div class="text-xs text-zinc-400 mt-2">Visa •••• 4242</div>
            </div>

            <!-- Delivery -->
            <div class="metric-card metric-b">
                <div class="flex items-start justify-between mb-3">
                    <div class="text-[10px] text-gray-500 uppercase tracking-widest">Delivery</div>
                    <div
                        style="width:32px;height:32px;border-radius:9px;background:rgba(37,99,235,0.08);border:1px solid rgba(37,99,235,0.12);display:flex;align-items:center;justify-content:center;">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" class="text-blue-600">
                            <rect x="1" y="3" width="15" height="13" rx="1" stroke="currentColor"
                                stroke-width="2" />
                            <path d="M16 8h4l3 3v5h-7V8z" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" />
                            <circle cx="5.5" cy="18.5" r="2.5" stroke="currentColor" stroke-width="2" />
                            <circle cx="18.5" cy="18.5" r="2.5" stroke="currentColor" stroke-width="2" />
                        </svg>
                    </div>
                </div>
                <div class="text-sm font-display font-bold text-white">Express Courier</div>
                <div class="text-xs text-zinc-400 mt-1">Est. Apr 1, 2026</div>
            </div>

            <!-- Order Date -->
            <div class="metric-card metric-o">
                <div class="flex items-start justify-between mb-3">
                    <div class="text-[10px] text-gray-500 uppercase tracking-widest">Order Date</div>
                    <div
                        style="width:32px;height:32px;border-radius:9px;background:rgba(217,119,6,0.08);border:1px solid rgba(217,119,6,0.12);display:flex;align-items:center;justify-content:center;">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" class="text-amber-600">
                            <rect x="3" y="4" width="18" height="18" rx="2" stroke="currentColor"
                                stroke-width="2" />
                            <path d="M16 2v4M8 2v4M3 10h18" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" />
                        </svg>
                    </div>
                </div>
                <div class="text-sm font-display font-bold text-white">Mar 29, 2026</div>
                <div class="text-xs text-zinc-400 mt-1">10:42 AM EST</div>
            </div>
        </div>

        <!-- ── MAIN GRID: LEFT + RIGHT ── -->
        <div class="grid grid-cols-1 lg:grid-cols-[1fr_340px] xl:grid-cols-[1fr_380px] gap-5 items-start">

            <!-- ═══ LEFT COLUMN ═══ -->
            <div class="space-y-5">

                <!-- ── PRODUCT LIST ── -->
                <div class="anim anim-3 card">
                    <div class="flex items-center justify-between px-5 md:px-6 py-4 border-b"
                        style="border-color:rgba(0,0,0,0.06);">
                        <div class="flex items-center gap-3">
                            <h2 class="sec-head">Products</h2>
                            <span class="text-[10px] text-gray-500 uppercase tracking-widest">4
                                items</span>
                        </div>
                        <button class="btn-outline btn-sm text-xs">
                            <svg width="12" height="12" viewBox="0 0 24 24" fill="none">
                                <path d="M11 4H4a2 2 0 00-2 2v14a2 2 0 002 2h14a2 2 0 002-2v-7" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" />
                            </svg>
                            Edit Items
                        </button>
                    </div>

                    <!-- Scrollable table wrapper -->
                    <div class="overflow-x-auto">
                        <table class="tbl" style="min-width:580px;">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>SKU</th>
                                    <th>Qty</th>
                                    <th>Unit Price</th>
                                    <th class="text-right">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Row 1 -->
                                <tr>
                                    <td>
                                        <div class="flex items-center gap-3">
                                            <div class="prod-thumb"
                                                style="background:linear-gradient(135deg,rgba(139,92,246,0.12),rgba(6,182,212,0.08));">
                                                🧥</div>
                                            <div>
                                                <div class="text-sm font-display font-bold text-white">Obsidian Hoodie
                                                </div>
                                                <div class="text-[11px] text-zinc-400 mt-0.5">Size: L · Color: Black</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td><span class="font-mono text-[11px] text-zinc-400">OBH-L-BLK</span></td>
                                    <td><span class="text-sm font-display font-bold text-white">×2</span></td>
                                    <td><span class="text-sm font-display font-bold text-white">$94.00</span></td>
                                    <td class="text-right"><span
                                            class="text-sm font-display font-bold text-white">$188.00</span></td>
                                </tr>
                                <!-- Row 2 -->
                                <tr>
                                    <td>
                                        <div class="flex items-center gap-3">
                                            <div class="prod-thumb"
                                                style="background:linear-gradient(135deg,rgba(6,182,212,0.12),rgba(16,185,129,0.08));">
                                                👟</div>
                                            <div>
                                                <div class="text-sm font-display font-bold text-white">Phantom Runners
                                                </div>
                                                <div class="text-[11px] text-zinc-400 mt-0.5">Size: 10 · Color: White</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td><span class="font-mono text-[11px] text-zinc-400">PHR-10-WHT</span></td>
                                    <td><span class="text-sm font-display font-bold text-white">×1</span></td>
                                    <td><span class="text-sm font-display font-bold text-white">$149.00</span></td>
                                    <td class="text-right"><span
                                            class="text-sm font-display font-bold text-white">$149.00</span></td>
                                </tr>
                                <!-- Row 3 -->
                                <tr>
                                    <td>
                                        <div class="flex items-center gap-3">
                                            <div class="prod-thumb"
                                                style="background:linear-gradient(135deg,rgba(245,158,11,0.12),rgba(239,68,68,0.08));">
                                                🕶️</div>
                                            <div>
                                                <div class="text-sm font-display font-bold text-white">Eclipse Shades</div>
                                                <div class="text-[11px] text-zinc-400 mt-0.5">One size · Matte Black</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td><span class="font-mono text-[11px] text-zinc-400">ECL-OS-BLK</span></td>
                                    <td><span class="text-sm font-display font-bold text-white">×1</span></td>
                                    <td><span class="text-sm font-display font-bold text-white">$62.00</span></td>
                                    <td class="text-right"><span
                                            class="text-sm font-display font-bold text-white">$62.00</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <!-- Totals -->
                    <div class="px-5 md:px-6 py-4" style="border-top:1px solid rgba(0,0,0,0.06);">
                        <div class="flex flex-col items-end gap-2.5 max-w-xs ml-auto text-sm">
                            <div class="flex justify-between w-full text-zinc-500">
                                <span>Subtotal</span>
                                <span class="font-mono">$399.00</span>
                            </div>
                            <div class="flex justify-between w-full text-zinc-500">
                                <span>Shipping (Express)</span>
                                <span class="font-mono">$12.99</span>
                            </div>
                            <div class="flex justify-between w-full text-emerald-600">
                                <span>Discount (NEXUS20)</span>
                                <span class="font-mono font-semibold">−$79.80</span>
                            </div>
                            <div class="flex justify-between w-full text-zinc-500">
                                <span>Tax (8.5%)</span>
                                <span class="font-mono">$28.08</span>
                            </div>
                            <hr class="dim w-full my-0.5">
                            <div class="flex justify-between w-full">
                                <span class="font-semibold text-zinc-900">Total</span>
                                <span
                                    style="font-family:'DM Mono',monospace;font-size:16px;font-weight:600;color:#18181B;">$360.27</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ── ORDER TIMELINE ── -->
                <div class="anim anim-4 card p-5 md:p-6">
                    <div class="flex items-center justify-between mb-5">
                        <h2 class="sec-head">Order Timeline</h2>
                        <button class="btn-outline btn-sm text-xs" onclick="showToast('Activity exported','info')">
                            <svg width="11" height="11" viewBox="0 0 24 24" fill="none">
                                <path d="M21 15v4a2 2 0 01-2 2H5a2 2 0 01-2-2v-4M7 10l5 5 5-5M12 15V3"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                            </svg>
                            Export
                        </button>
                    </div>

                    <div>
                        <!-- Step 1: Order Placed -->
                        <div class="timeline-item">
                            <div class="tl-dot tl-dot-done">
                                <svg width="10" height="10" viewBox="0 0 24 24" fill="none">
                                    <path d="M5 13l4 4L19 7" stroke="white" stroke-width="2.5" stroke-linecap="round" />
                                </svg>
                            </div>
                            <div class="flex items-start justify-between">
                                <div>
                                    <div class="text-sm text-sm font-display font-bold text-white">Order Placed</div>
                                    <div class="text-xs text-zinc-400 mt-0.5">Customer completed checkout successfully
                                    </div>
                                    <div class="flex items-center gap-2 mt-2">
                                        <span
                                            style="font-size:10px;background:rgba(0,0,0,0.05);color:rgba(0,0,0,0.45);padding:2px 8px;border-radius:5px;font-weight:500;">IP:
                                            192.168.1.44</span>
                                    </div>
                                </div>
                                <div class="text-right flex-shrink-0 ml-4">
                                    <div class="text-xs font-medium text-zinc-500">Mar 29, 2026</div>
                                    <div class="text-xs text-zinc-400">10:42 AM</div>
                                </div>
                            </div>
                        </div>

                        <!-- Step 2: Payment -->
                        <div class="timeline-item">
                            <div class="tl-dot tl-dot-done">
                                <svg width="10" height="10" viewBox="0 0 24 24" fill="none">
                                    <path d="M5 13l4 4L19 7" stroke="white" stroke-width="2.5" stroke-linecap="round" />
                                </svg>
                            </div>
                            <div class="flex items-start justify-between">
                                <div>
                                    <div class="text-sm text-sm font-display font-bold text-white">Payment Confirmed</div>
                                    <div class="text-xs text-zinc-400 mt-0.5">$360.27 charged via Visa •••• 4242</div>
                                    <div class="flex items-center gap-2 mt-2">
                                        <span
                                            style="font-size:10px;background:#ECFDF5;color:#065F46;padding:2px 8px;border-radius:5px;font-weight:600;border:1px solid #A7F3D0;">Stripe
                                            Verified</span>
                                        <span class="font-mono text-[10px] text-zinc-400">txn_3Q9VXA2eZvKYlo2C</span>
                                    </div>
                                </div>
                                <div class="text-right flex-shrink-0 ml-4">
                                    <div class="text-xs font-medium text-zinc-500">Mar 29, 2026</div>
                                    <div class="text-xs text-zinc-400">10:43 AM</div>
                                </div>
                            </div>
                        </div>

                        <!-- Step 3: Processing -->
                        <div class="timeline-item">
                            <div class="tl-dot tl-dot-done">
                                <svg width="10" height="10" viewBox="0 0 24 24" fill="none">
                                    <path d="M5 13l4 4L19 7" stroke="white" stroke-width="2.5" stroke-linecap="round" />
                                </svg>
                            </div>
                            <div class="flex items-start justify-between">
                                <div>
                                    <div class="text-sm text-sm font-display font-bold text-white">Warehouse Processing
                                    </div>
                                    <div class="text-xs text-zinc-400 mt-0.5">Items picked, packed, and quality checked
                                    </div>
                                    <div class="flex items-center gap-2 mt-2">
                                        <span
                                            style="font-size:10px;background:rgba(0,0,0,0.05);color:rgba(0,0,0,0.45);padding:2px 8px;border-radius:5px;font-weight:500;">Station
                                            #WH-04 · Michael T.</span>
                                    </div>
                                </div>
                                <div class="text-right flex-shrink-0 ml-4">
                                    <div class="text-xs font-medium text-zinc-500">Mar 30, 2026</div>
                                    <div class="text-xs text-zinc-400">08:15 AM</div>
                                </div>
                            </div>
                        </div>

                        <!-- Step 4: Shipped (Active) -->
                        <div class="timeline-item">
                            <div class="tl-dot tl-dot-active">
                                <svg width="10" height="10" viewBox="0 0 24 24" fill="none">
                                    <rect x="1" y="3" width="15" height="13" rx="1" stroke="white"
                                        stroke-width="2" />
                                    <path d="M16 8h4l3 3v5h-7V8z" stroke="white" stroke-width="2"
                                        stroke-linecap="round" />
                                    <circle cx="5.5" cy="18.5" r="2.5" fill="white" />
                                    <circle cx="18.5" cy="18.5" r="2.5" fill="white" />
                                </svg>
                            </div>
                            <div class="flex items-start justify-between">
                                <div>
                                    <div class="text-sm font-semibold text-blue-700 flex items-center gap-2">
                                        Shipped
                                        <span
                                            style="font-size:9px;font-weight:700;letter-spacing:0.06em;background:#DBEAFE;color:#1D4ED8;padding:2px 6px;border-radius:4px;">CURRENT</span>
                                    </div>
                                    <div class="text-xs text-zinc-400 mt-0.5">In transit via FedEx Express</div>
                                    <div class="flex items-center gap-2 mt-2 flex-wrap">
                                        <span
                                            style="font-size:10px;background:#EFF6FF;color:#1D4ED8;padding:2px 8px;border-radius:5px;font-weight:600;border:1px solid #BFDBFE;">FedEx</span>
                                        <span class="font-mono text-[10px] text-blue-500 cursor-pointer hover:underline"
                                            onclick="showToast('Tracking copied!','success')">782493821743</span>
                                    </div>
                                </div>
                                <div class="text-right flex-shrink-0 ml-4">
                                    <div class="text-xs font-medium text-zinc-500">Mar 31, 2026</div>
                                    <div class="text-xs text-zinc-400">09:30 AM</div>
                                </div>
                            </div>
                        </div>

                        <!-- Step 5: Delivered (pending) -->
                        <div class="timeline-item" style="opacity:0.45;">
                            <div class="tl-dot tl-dot-pending"></div>
                            <div class="flex items-start justify-between">
                                <div>
                                    <div class="text-sm font-semibold text-zinc-500">Delivered</div>
                                    <div class="text-xs text-zinc-400 mt-0.5">Expected arrival by Apr 1, 2026</div>
                                </div>
                                <div class="text-right flex-shrink-0 ml-4">
                                    <div class="text-xs text-zinc-400">Pending</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ── ADMIN NOTES ── -->
                <div class="anim anim-5 card p-5 md:p-6">
                    <div class="flex items-center gap-3 mb-4">
                        <h2 class="sec-head">Internal Notes</h2>
                        <span
                            style="font-size:10px;font-weight:600;background:#FEF3C7;color:#92400E;padding:2px 8px;border-radius:5px;border:1px solid #FDE68A;">Admin
                            only</span>
                    </div>

                    <!-- Existing note -->
                    <div class="mb-4 p-4 rounded-xl" style="background:#FAFAF9;border:1px solid rgba(0,0,0,0.07);">
                        <div class="flex items-start gap-3">
                            <div
                                style="width:28px;height:28px;border-radius:8px;background:#18181B;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                                <span style="font-size:11px;font-weight:700;color:#fff;">SR</span>
                            </div>
                            <div class="flex-1 min-w-0">
                                <div class="flex items-center gap-2 mb-1">
                                    <span class="text-xs font-semibold text-zinc-700">Sara R. (Admin)</span>
                                    <span class="text-[11px] text-zinc-400">Mar 30, 9:15 AM</span>
                                </div>
                                <p class="text-sm text-zinc-600 leading-relaxed">Customer requested gift wrapping for the
                                    hoodie. Applied free gift wrap as per loyalty program. Noted warehouse team via Slack.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Add note -->
                    <div class="mb-4">
                        <label class="lbl">Add Note</label>
                        <textarea class="field resize-none" rows="3" placeholder="Add an internal note visible only to admin team…"
                            id="noteArea"></textarea>
                    </div>

                    <div class="flex items-center gap-3 flex-wrap">
                        <button class="btn-dark btn-sm" onclick="addNote()">
                            <svg width="12" height="12" viewBox="0 0 24 24" fill="none">
                                <path d="M12 5v14M5 12h14" stroke="white" stroke-width="2.5" stroke-linecap="round" />
                            </svg>
                            Post Note
                        </button>
                        <div class="flex items-center gap-2 ml-auto">
                            <label
                                class="flex items-center gap-2 cursor-pointer text-xs text-zinc-500 font-medium select-none">
                                <input type="checkbox" class="rounded" style="accent-color:#18181B;">
                                Notify customer
                            </label>
                        </div>
                    </div>
                </div>

            </div><!-- /left col -->

            <!-- ═══ RIGHT COLUMN ═══ -->
            <div class="space-y-5">

                <!-- ── CUSTOMER INFO ── -->
                <div class="anim anim-2 card p-5 card-hover">
                    <div class="flex items-center justify-between mb-4">
                        <h2 class="sec-head">Customer</h2>
                        <a href="#"
                            class="text-xs font-semibold text-blue-600 hover:text-blue-700 transition-colors">View Profile
                            →</a>
                    </div>

                    <!-- Avatar + name -->
                    <div class="flex items-center gap-3 mb-4 pb-4" style="border-bottom:1px solid rgba(0,0,0,0.06);">
                        <div
                            style="width:44px;height:44px;border-radius:12px;background:linear-gradient(135deg,#7c3aed,#4f46e5);display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                            <span
                                style="font-size:15px;font-weight:700;color:#fff;font-family:'Instrument Serif',serif;">AR</span>
                        </div>
                        <div>
                            <div class="text-md font-display font-bold text-white">Alex Rivera</div>
                            <div class="text-xs text-zinc-400">Customer since Jan 2024</div>
                        </div>
                        <div class="ml-auto">
                            <span
                                style="font-size:10px;font-weight:700;background:#ECFDF5;color:#065F46;padding:3px 9px;border-radius:6px;border:1px solid #A7F3D0;">VIP</span>
                        </div>
                    </div>

                    <!-- Contact info -->
                    <div class="space-y-0">
                        <div class="info-row copy-row">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none"
                                class="text-zinc-400 flex-shrink-0 mt-0.5">
                                <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"
                                    stroke="currentColor" stroke-width="2" />
                                <polyline points="22,6 12,13 2,6" stroke="currentColor" stroke-width="2" />
                            </svg>
                            <div class="flex-1 min-w-0">
                                <div class="lbl">Email</div>
                                <div class="text-[13px] text-zinc-700 truncate">alex.rivera@example.com</div>
                            </div>
                            <button class="copy-icon p-1 rounded" onclick="copyText('alex.rivera@example.com')">
                                <svg width="12" height="12" viewBox="0 0 24 24" fill="none"
                                    class="text-zinc-400">
                                    <rect x="9" y="9" width="13" height="13" rx="2" stroke="currentColor"
                                        stroke-width="2" />
                                    <path d="M5 15H4a2 2 0 01-2-2V4a2 2 0 012-2h9a2 2 0 012 2v1" stroke="currentColor"
                                        stroke-width="2" />
                                </svg>
                            </button>
                        </div>
                        <div class="info-row copy-row">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none"
                                class="text-zinc-400 flex-shrink-0 mt-0.5">
                                <path
                                    d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07A19.5 19.5 0 013.86 9.9 19.79 19.79 0 01.77 1.27 2 2 0 012.76 0h3a2 2 0 012 1.72 12.84 12.84 0 00.7 2.81 2 2 0 01-.45 2.11L6.91 7.91a16 16 0 006.09 6.09l1.27-1.27a2 2 0 012.11-.45 12.84 12.84 0 002.81.7A2 2 0 0122 14.92z"
                                    stroke="currentColor" stroke-width="2" />
                            </svg>
                            <div class="flex-1 min-w-0">
                                <div class="lbl">Phone</div>
                                <div class="text-[13px] text-zinc-700">+1 (555) 234-5678</div>
                            </div>
                            <button class="copy-icon p-1 rounded" onclick="copyText('+1 (555) 234-5678')">
                                <svg width="12" height="12" viewBox="0 0 24 24" fill="none"
                                    class="text-zinc-400">
                                    <rect x="9" y="9" width="13" height="13" rx="2" stroke="currentColor"
                                        stroke-width="2" />
                                    <path d="M5 15H4a2 2 0 01-2-2V4a2 2 0 012-2h9a2 2 0 012 2v1" stroke="currentColor"
                                        stroke-width="2" />
                                </svg>
                            </button>
                        </div>
                        <div class="info-row">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none"
                                class="text-zinc-400 flex-shrink-0 mt-0.5">
                                <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z" stroke="currentColor"
                                    stroke-width="2" />
                                <circle cx="12" cy="10" r="3" stroke="currentColor" stroke-width="2" />
                            </svg>
                            <div class="flex-1 min-w-0">
                                <div class="lbl">Shipping Address</div>
                                <div class="text-[13px] text-zinc-700 leading-relaxed">123 Obsidian Lane, Apt 4B<br>New
                                    York, NY 10001<br>United States 🇺🇸</div>
                            </div>
                        </div>
                    </div>

                    <!-- Stats -->
                    <div class="mt-4 pt-4 grid grid-cols-3 gap-2" style="border-top:1px solid rgba(0,0,0,0.06);">
                        <div class="text-center p-2 rounded-xl" style="background:#FAFAF9;">
                            <div class="text-sm font-bold text-zinc-900">14</div>
                            <div class="text-[10px] text-zinc-400">Orders</div>
                        </div>
                        <div class="text-center p-2 rounded-xl" style="background:#FAFAF9;">
                            <div class="text-sm font-bold text-zinc-900 font-mono">$2.8K</div>
                            <div class="text-[10px] text-zinc-400">Spent</div>
                        </div>
                        <div class="text-center p-2 rounded-xl" style="background:#FAFAF9;">
                            <div class="text-sm font-bold text-zinc-900">4.9★</div>
                            <div class="text-[10px] text-zinc-400">Rating</div>
                        </div>
                    </div>
                </div>

                <!-- ── PAYMENT DETAILS ── -->
                <div class="anim anim-3 card p-5 card-hover">
                    <div class="flex items-center justify-between mb-4">
                        <h2 class="sec-head">Payment Details</h2>
                        <span class="badge badge-paid">Paid</span>
                    </div>

                    <div class="space-y-0">
                        <div class="info-row">
                            <div class="w-4 flex-shrink-0 mt-0.5">
                                <div
                                    style="width:16px;height:16px;border-radius:4px;background:#1A1F71;display:flex;align-items:center;justify-content:center;">
                                    <span
                                        style="color:#F9A825;font-size:6px;font-weight:900;font-family:sans-serif;">V</span>
                                </div>
                            </div>
                            <div class="flex-1">
                                <div class="lbl">Method</div>
                                <div class="text-[13px] text-zinc-700">Visa Credit Card •••• 4242</div>
                            </div>
                        </div>
                        <div class="info-row copy-row">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none"
                                class="text-zinc-400 flex-shrink-0 mt-0.5">
                                <rect x="1" y="4" width="22" height="16" rx="2" stroke="currentColor"
                                    stroke-width="2" />
                                <path d="M1 10h22" stroke="currentColor" stroke-width="2" />
                            </svg>
                            <div class="flex-1 min-w-0">
                                <div class="lbl">Transaction ID</div>
                                <div class="text-[12px] font-mono text-zinc-600 truncate">txn_3Q9VXA2eZvKYlo2C1842</div>
                            </div>
                            <button class="copy-icon p-1 rounded" onclick="copyText('txn_3Q9VXA2eZvKYlo2C1842')">
                                <svg width="12" height="12" viewBox="0 0 24 24" fill="none"
                                    class="text-zinc-400">
                                    <rect x="9" y="9" width="13" height="13" rx="2" stroke="currentColor"
                                        stroke-width="2" />
                                    <path d="M5 15H4a2 2 0 01-2-2V4a2 2 0 012-2h9a2 2 0 012 2v1" stroke="currentColor"
                                        stroke-width="2" />
                                </svg>
                            </button>
                        </div>
                        <div class="info-row">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none"
                                class="text-zinc-400 flex-shrink-0 mt-0.5">
                                <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z" stroke="currentColor"
                                    stroke-width="2" />
                                <circle cx="12" cy="10" r="3" stroke="currentColor" stroke-width="2" />
                            </svg>
                            <div class="flex-1">
                                <div class="lbl">Billing Address</div>
                                <div class="text-[13px] text-zinc-700 leading-relaxed">Same as shipping</div>
                            </div>
                        </div>
                        <div class="info-row">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none"
                                class="text-zinc-400 flex-shrink-0 mt-0.5">
                                <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" />
                            </svg>
                            <div class="flex-1">
                                <div class="lbl">Stripe Status</div>
                                <div class="text-[13px] text-emerald-600 font-semibold">Succeeded · 3D Secured</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ── UPDATE STATUS ── -->
                <div class="anim anim-4 card p-5">
                    <h2 class="sec-head mb-4">Update Status</h2>

                    <div class="mb-3">
                        <label class="lbl">Order Status</label>
                        <select class="sel" id="statusSelect">
                            <option value="pending">Pending</option>
                            <option value="processing">Processing</option>
                            <option selected value="shipped">Shipped</option>
                            <option value="delivered">Delivered</option>
                            <option value="cancelled">Cancelled</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="lbl">Tracking Number</label>
                        <input type="text" class="p-3 rounded w-full font-mono text-sm btn-ghost" placeholder="FX-XXXXXXXXX"
                            value="782493821743">
                    </div>

                    <div class="mb-4">
                        <label class="lbl">Notify Customer</label>
                        <div class="flex gap-2">
                            <button class="flex-1 py-2 text-xs font-semibold rounded-xl transition-all" id="notifyYes"
                                style="background:#18181B;color:#fff;border:1.5px solid #18181B;"
                                onclick="setNotify(true)">Email</button>
                            <button class="flex-1 py-2 text-xs font-semibold rounded-xl transition-all" id="notifySms"
                                style="background:transparent;color:rgba(0,0,0,0.45);border:1.5px solid rgba(0,0,0,0.1);"
                                onclick="setNotify('sms')">SMS</button>
                            <button class="flex-1 py-2 text-xs font-semibold rounded-xl transition-all" id="notifyNo"
                                style="background:transparent;color:rgba(0,0,0,0.45);border:1.5px solid rgba(0,0,0,0.1);"
                                onclick="setNotify(false)">None</button>
                        </div>
                    </div>

                    <button class="btn-dark w-full justify-center" onclick="updateStatus()">
                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none">
                            <path d="M5 13l4 4L19 7" stroke="white" stroke-width="2.5" stroke-linecap="round" />
                        </svg>
                        Save Changes
                    </button>
                </div>

                <!-- ── DANGER ZONE ── -->
                <div class="anim anim-5 card p-5">
                    <h2 class="sec-head mb-1">Actions</h2>
                    <p class="text-xs text-zinc-400 mb-4">These actions are irreversible. Proceed with caution.</p>

                    <div class="space-y-2.5">
                        <button class="btn-outline w-full justify-center text-sm"
                            onclick="showToast('Refund initiated for $360.27','info')">
                            <svg width="13" height="13" viewBox="0 0 24 24" fill="none">
                                <path d="M3 10h18M3 6h18M3 14h11" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" />
                            </svg>
                            Issue Refund
                        </button>
                        <button class="btn-danger w-full justify-center text-sm" onclick="confirmCancel()">
                            <svg width="13" height="13" viewBox="0 0 24 24" fill="none">
                                <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2" />
                                <path d="M15 9l-6 6M9 9l6 6" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" />
                            </svg>
                            Cancel Order
                        </button>
                    </div>
                </div>

            </div><!-- /right col -->
        </div><!-- /main grid -->

    </div><!-- /container -->

    <!-- ── STICKY BOTTOM ACTION BAR (desktop) ── -->
    {{-- <div class="action-bar fixed bottom-0 left-0 right-0 z-50 px-4 sm:px-6 lg:px-8 py-3.5">
        <div class="max-w-[1320px] mx-auto flex items-center gap-4">
            <div class="flex items-center gap-3 mr-auto">
                <div
                    style="width:8px;height:8px;border-radius:50%;background:#3B82F6;box-shadow:0 0 6px rgba(59,130,246,0.7);animation:pulse-dot 1.5s infinite;">
                </div>
                <span class="text-xs font-medium text-zinc-500">Order <span
                        class="font-mono font-semibold text-zinc-700">#ORD-10234</span> · Last saved 2h ago</span>
            </div>
            <div class="flex items-center gap-2.5 flex-shrink-0">
                <button class="btn-outline btn-sm text-xs hidden sm:flex"
                    onclick="showToast('Duplicate order created','info')">
                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none">
                        <rect x="9" y="9" width="13" height="13" rx="2" stroke="currentColor"
                            stroke-width="2" />
                        <path d="M5 15H4a2 2 0 01-2-2V4a2 2 0 012-2h9a2 2 0 012 2v1" stroke="currentColor"
                            stroke-width="2" />
                    </svg>
                    Duplicate
                </button>
                <button class="btn-outline btn-sm text-xs hidden sm:flex" onclick="printInvoice()">
                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none">
                        <polyline points="6 9 6 2 18 2 18 9" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" />
                        <path d="M6 18H4a2 2 0 01-2-2v-5a2 2 0 012-2h16a2 2 0 012 2v5a2 2 0 01-2 2h-2"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                        <rect x="6" y="14" width="12" height="8" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" />
                    </svg>
                    Invoice
                </button>
                <button class="btn-dark btn-sm text-xs" onclick="updateStatus()">
                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none">
                        <path d="M5 13l4 4L19 7" stroke="white" stroke-width="2.5" stroke-linecap="round" />
                    </svg>
                    Save Changes
                </button>
            </div>
        </div>
    </div> --}}

    <!-- ── STATUS MODAL ── -->
    <div id="statusModal" class="fixed inset-0 z-[9998] flex items-center justify-center p-4"
        style="background:rgba(0,0,0,0.4);backdrop-filter:blur(4px);display:none;">
        <div class="card p-6 w-full max-w-sm" style="animation:fadeUp 0.2s ease;">
            <div class="flex items-center justify-between mb-5">
                <h3 style="font-family:'Instrument Serif',serif;font-size:18px;color:#18181B;">Update Order Status</h3>
                <button onclick="closeStatusModal()" class="text-zinc-400 hover:text-zinc-700 transition-colors">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none">
                        <path d="M18 6L6 18M6 6l12 12" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                    </svg>
                </button>
            </div>
            <div class="space-y-3 mb-5">
                <div id="statusOpts"></div>
            </div>
            <button class="btn-dark w-full justify-center" onclick="confirmStatus()">
                Confirm Update
            </button>
        </div>
    </div>

    <!-- ── TOAST ── -->
    <div id="toast">
        <div style="background:#18181B;color:#f9fafb;padding:12px 18px;border-radius:12px;font-size:13px;font-weight:500;font-family:'DM Sans',sans-serif;display:flex;align-items:center;gap:10px;box-shadow:0 8px 30px rgba(0,0,0,0.2);"
            id="toastInner">
            <span id="toastIcon" style="font-size:14px;">✓</span>
            <span id="toastText">Done</span>
        </div>
    </div>

    <script>
        // ── Toast ──
        let toastTimer;

        function showToast(msg, type) {
            const t = document.getElementById('toast');
            const inner = document.getElementById('toastInner');
            document.getElementById('toastText').textContent = msg;
            const icon = type === 'success' ? '✓' : type === 'danger' ? '✕' : 'ℹ';
            document.getElementById('toastIcon').textContent = icon;
            const colors = {
                success: '#065F46',
                danger: '#991B1B',
                info: '#1D4ED8'
            };
            inner.style.borderLeft = `3px solid ${colors[type] || colors.info}`;
            t.classList.add('show');
            clearTimeout(toastTimer);
            toastTimer = setTimeout(() => t.classList.remove('show'), 3500);
        }

        // ── Copy to clipboard ──
        function copyText(text) {
            navigator.clipboard?.writeText(text).catch(() => {});
            showToast('Copied to clipboard', 'success');
        }

        // ── Update status ──
        function updateStatus() {
            const val = document.getElementById('statusSelect').value;
            const labels = {
                pending: 'Pending',
                processing: 'Processing',
                shipped: 'Shipped',
                delivered: 'Delivered',
                cancelled: 'Cancelled'
            };
            const badge = document.getElementById('mainStatusBadge');
            badge.className = `badge badge-${val}`;
            badge.textContent = labels[val];
            showToast(`Order status updated to "${labels[val]}"`, 'success');
        }

        // ── Status modal ──
        const statuses = [{
                val: 'pending',
                label: 'Pending',
                cls: 'badge-pending',
                desc: 'Awaiting action'
            },
            {
                val: 'processing',
                label: 'Processing',
                cls: 'badge-processing',
                desc: 'Being prepared'
            },
            {
                val: 'shipped',
                label: 'Shipped',
                cls: 'badge-shipped',
                desc: 'In transit'
            },
            {
                val: 'delivered',
                label: 'Delivered',
                cls: 'badge-delivered',
                desc: 'Successfully delivered'
            },
            {
                val: 'cancelled',
                label: 'Cancelled',
                cls: 'badge-cancelled',
                desc: 'Order cancelled'
            },
        ];
        let selectedStatus = 'shipped';

        function openStatusModal() {
            const opts = document.getElementById('statusOpts');
            opts.innerHTML = statuses.map(s => `
        <div class="flex items-center gap-3 p-3 rounded-xl cursor-pointer transition-all hover:bg-zinc-50 ${s.val === selectedStatus ? 'bg-zinc-50 border border-zinc-200' : 'border border-transparent'}" onclick="selectModalStatus('${s.val}',this)">
          <span class="badge ${s.cls}">${s.label}</span>
          <span class="text-xs text-zinc-400">${s.desc}</span>
          <div class="ml-auto w-4 h-4 rounded-full border-2 ${s.val === selectedStatus ? 'border-zinc-900 bg-zinc-900' : 'border-zinc-300'}" id="radio-${s.val}"></div>
        </div>
      `).join('');
            document.getElementById('statusModal').style.display = 'flex';
        }

        function selectModalStatus(val, el) {
            selectedStatus = val;
            document.querySelectorAll('#statusOpts > div').forEach(d => {
                d.classList.remove('bg-zinc-50', 'border-zinc-200');
                d.classList.add('border-transparent');
                d.querySelector('[id^="radio-"]').className =
                    'ml-auto w-4 h-4 rounded-full border-2 border-zinc-300';
            });
            el.classList.add('bg-zinc-50', 'border-zinc-200');
            el.classList.remove('border-transparent');
            const radio = el.querySelector('[id^="radio-"]');
            radio.className = 'ml-auto w-4 h-4 rounded-full border-2 border-zinc-900 bg-zinc-900';
        }

        function closeStatusModal() {
            document.getElementById('statusModal').style.display = 'none';
        }
        document.getElementById('statusModal').addEventListener('click', function(e) {
            if (e.target === this) closeStatusModal();
        });

        function confirmStatus() {
            document.getElementById('statusSelect').value = selectedStatus;
            updateStatus();
            closeStatusModal();
        }

        // ── Notify buttons ──
        let notifyMode = 'email';

        function setNotify(mode) {
            notifyMode = mode;
            const active = 'background:#18181B;color:#fff;border:1.5px solid #18181B;';
            const inactive = 'background:transparent;color:rgba(0,0,0,0.45);border:1.5px solid rgba(0,0,0,0.1);';
            document.getElementById('notifyYes').style.cssText = mode === true ? active : inactive;
            document.getElementById('notifySms').style.cssText = mode === 'sms' ? active : inactive;
            document.getElementById('notifyNo').style.cssText = mode === false ? active : inactive;
        }

        // ── Print invoice ──
        function printInvoice() {
            showToast('Opening print preview…', 'info');
            setTimeout(() => window.print(), 600);
        }

        // ── Cancel order ──
        function confirmCancel() {
            if (confirm('Cancel order #ORD-10234? This cannot be undone.')) {
                document.getElementById('mainStatusBadge').className = 'badge badge-cancelled';
                document.getElementById('mainStatusBadge').textContent = 'Cancelled';
                showToast('Order #ORD-10234 cancelled', 'danger');
            }
        }

        // ── Add note ──
        function addNote() {
            const area = document.getElementById('noteArea');
            if (!area.value.trim()) {
                showToast('Note cannot be empty', 'danger');
                return;
            }
            showToast('Note posted successfully', 'success');
            area.value = '';
        }

        // ── Animate spin ──
        const style = document.createElement('style');
        style.textContent =
            `@keyframes spin{from{transform:rotate(0)}to{transform:rotate(360deg)}}.spin{animation:spin 0.7s linear infinite}`;
        document.head.appendChild(style);
    </script>
@endsection
