@extends('admin.layouts.app')



@section('content')

    <!-- ════════════════════════════ SCROLLABLE MAIN ════════════════════════════ -->
    <main class="flex-1 overflow-y-auto pb-20 lg:pb-6">
        <div class="px-4 md:px-6 py-5 max-w-[1400px] mx-auto space-y-5">

            <!-- ── KPI CARDS ── -->
            <section>
                <div class="grid grid-cols-2 lg:grid-cols-4 gap-3 md:gap-4">

                    <!-- Revenue -->
                    <div class="glass kpi-glow kpi-violet overflow-hidden relative p-4 md:p-5 col-span-1">
                        <div class="flex items-start justify-between mb-3">
                            <div class="text-[10px] font-semibold text-gray-500 uppercase tracking-widest">
                                Revenue</div>
                            <div class="w-8 h-8 rounded-xl flex items-center justify-center flex-shrink-0"
                                style="background:rgba(139,92,246,0.15);border:1px solid rgba(139,92,246,0.2);">
                                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" class="text-violet-400">
                                    <path d="M12 1v22M17 5H9.5a3.5 3.5 0 100 7h5a3.5 3.5 0 110 7H6" stroke="currentColor"
                                        stroke-width="2" stroke-linecap="round" />
                                </svg>
                            </div>
                        </div>
                        <div class="text-2xl md:text-3xl font-display font-bold text-white leading-none mb-2">
                            $284.6K</div>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-1 text-emerald-400 text-xs font-semibold">
                                <svg width="10" height="10" viewBox="0 0 24 24" fill="none">
                                    <path d="M18 15l-6-6-6 6" stroke="currentColor" stroke-width="2.5"
                                        stroke-linecap="round" />
                                </svg>
                                +18.4%
                            </div>
                            <div class="spark">
                                <span style="height:35%;background:#7c3aed"></span>
                                <span style="height:55%;background:#7c3aed"></span>
                                <span style="height:40%;background:#7c3aed"></span>
                                <span style="height:70%;background:#8b5cf6"></span>
                                <span style="height:60%;background:#8b5cf6"></span>
                                <span style="height:85%;background:#8b5cf6"></span>
                                <span style="height:100%;background:#a78bfa"></span>
                            </div>
                        </div>
                    </div>

                    <!-- Orders -->
                    <div class="glass kpi-glow kpi-cyan overflow-hidden relative p-4 md:p-5 col-span-1">
                        <div class="flex items-start justify-between mb-3">
                            <div class="text-[10px] font-semibold text-gray-500 uppercase tracking-widest">
                                Orders</div>
                            <div class="w-8 h-8 rounded-xl flex items-center justify-center flex-shrink-0"
                                style="background:rgba(6,182,212,0.12);border:1px solid rgba(6,182,212,0.2);">
                                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" class="text-cyan-400">
                                    <path d="M6 2L3 6v14a2 2 0 002 2h14a2 2 0 002-2V6l-3-4zM3 6h18M16 10a4 4 0 01-8 0"
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                                </svg>
                            </div>
                        </div>
                        <div class="text-2xl md:text-3xl font-display font-bold text-white leading-none mb-2">
                            12,847</div>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-1 text-emerald-400 text-xs font-semibold">
                                <svg width="10" height="10" viewBox="0 0 24 24" fill="none">
                                    <path d="M18 15l-6-6-6 6" stroke="currentColor" stroke-width="2.5"
                                        stroke-linecap="round" />
                                </svg>
                                +6.2%
                            </div>
                            <div class="spark">
                                <span style="height:50%;background:#0891b2"></span>
                                <span style="height:40%;background:#0891b2"></span>
                                <span style="height:65%;background:#06b6d4"></span>
                                <span style="height:55%;background:#06b6d4"></span>
                                <span style="height:75%;background:#06b6d4"></span>
                                <span style="height:90%;background:#22d3ee"></span>
                                <span style="height:80%;background:#22d3ee"></span>
                            </div>
                        </div>
                    </div>

                    <!-- Customers -->
                    <div class="glass kpi-glow kpi-emerald overflow-hidden relative p-4 md:p-5 col-span-1">
                        <div class="flex items-start justify-between mb-3">
                            <div class="text-[10px] font-semibold text-gray-500 uppercase tracking-widest">
                                Customers</div>
                            <div class="w-8 h-8 rounded-xl flex items-center justify-center flex-shrink-0"
                                style="background:rgba(16,185,129,0.12);border:1px solid rgba(16,185,129,0.2);">
                                <svg width="13" height="13" viewBox="0 0 24 24" fill="none"
                                    class="text-emerald-400">
                                    <path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2M9 11a4 4 0 100-8 4 4 0 000 8z"
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                                </svg>
                            </div>
                        </div>
                        <div class="text-2xl md:text-3xl font-display font-bold text-white leading-none mb-2">
                            48,291</div>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-1 text-emerald-400 text-xs font-semibold">
                                <svg width="10" height="10" viewBox="0 0 24 24" fill="none">
                                    <path d="M18 15l-6-6-6 6" stroke="currentColor" stroke-width="2.5"
                                        stroke-linecap="round" />
                                </svg>
                                +11.7%
                            </div>
                            <div class="spark">
                                <span style="height:45%;background:#059669"></span>
                                <span style="height:60%;background:#10b981"></span>
                                <span style="height:50%;background:#10b981"></span>
                                <span style="height:75%;background:#10b981"></span>
                                <span style="height:65%;background:#34d399"></span>
                                <span style="height:80%;background:#34d399"></span>
                                <span style="height:100%;background:#6ee7b7"></span>
                            </div>
                        </div>
                    </div>

                    <!-- Conversion -->
                    <div class="glass kpi-glow kpi-amber overflow-hidden relative p-4 md:p-5 col-span-1">
                        <div class="flex items-start justify-between mb-3">
                            <div class="text-[10px] font-semibold text-gray-500 uppercase tracking-widest">
                                Conversion</div>
                            <div class="w-8 h-8 rounded-xl flex items-center justify-center flex-shrink-0"
                                style="background:rgba(245,158,11,0.12);border:1px solid rgba(245,158,11,0.2);">
                                <svg width="13" height="13" viewBox="0 0 24 24" fill="none"
                                    class="text-amber-400">
                                    <polyline points="22 12 18 12 15 21 9 3 6 12 2 12" stroke="currentColor"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </div>
                        </div>
                        <div class="text-2xl md:text-3xl font-display font-bold text-white leading-none mb-2">
                            4.73%</div>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-1 text-rose-400 text-xs font-semibold">
                                <svg width="10" height="10" viewBox="0 0 24 24" fill="none">
                                    <path d="M6 9l6 6 6-6" stroke="currentColor" stroke-width="2.5"
                                        stroke-linecap="round" />
                                </svg>
                                -0.8%
                            </div>
                            <div class="spark">
                                <span style="height:70%;background:#d97706"></span>
                                <span style="height:80%;background:#f59e0b"></span>
                                <span style="height:65%;background:#f59e0b"></span>
                                <span style="height:90%;background:#fbbf24"></span>
                                <span style="height:75%;background:#fbbf24"></span>
                                <span style="height:60%;background:#fcd34d"></span>
                                <span style="height:65%;background:#fcd34d"></span>
                            </div>
                        </div>
                    </div>

                </div>
            </section>

            <!-- ── ANALYTICS + AI (stacked mobile, side-by-side desktop) ── -->
            <section class="grid grid-cols-1 lg:grid-cols-12 gap-4 md:gap-5">

                <!-- Analytics Panel -->
                <div class="glass p-4 md:p-6 lg:col-span-8 rounded-2xl">
                    <div class="flex flex-wrap items-start gap-3 justify-between mb-5">
                        <div>
                            <h2 class="sec-head text-sm md:text-base">Revenue Analytics</h2>
                            <p class="text-[10px] text-gray-500 mt-0.5">Daily revenue breakdown</p>
                        </div>
                        <div class="flex items-center gap-1">
                            <button class="seg">Today</button>
                            <button class="seg active">Week</button>
                            <button class="seg">Month</button>
                            <button class="seg hidden sm:block">Year</button>
                        </div>
                    </div>

                    <!-- Stats row -->
                    <div class="flex flex-wrap gap-4 mb-5">
                        <div>
                            <div class="text-[10px] text-gray-500 uppercase tracking-wider mb-0.5">This Week
                            </div>
                            <div class="text-lg md:text-xl font-bold text-white font-display">$68,241</div>
                        </div>
                        <div class="hidden sm:block w-px bg-white/5"></div>
                        <div class="hidden sm:block">
                            <div class="text-[10px] text-gray-500 uppercase tracking-wider mb-0.5">Avg / Day
                            </div>
                            <div class="text-lg md:text-xl font-bold text-white font-display">$9,749</div>
                        </div>
                        <div class="hidden sm:block w-px bg-white/5"></div>
                        <div class="hidden sm:block">
                            <div class="text-[10px] text-gray-500 uppercase tracking-wider mb-0.5">Peak Day
                            </div>
                            <div class="text-lg md:text-xl font-bold grad-text font-display">Thursday</div>
                        </div>
                    </div>

                    <!-- Chart -->
                    <div class="flex items-end gap-1.5 md:gap-2" style="height:120px;">
                        <div class="chartbar flex-1 h-full">
                            <div class="chartbar-tip">Mon · $7,840</div>
                            <div class="chartbar-fill" style="height:52%"></div>
                            <span class="text-[9px] text-gray-600">M</span>
                        </div>
                        <div class="chartbar flex-1 h-full">
                            <div class="chartbar-tip">Tue · $8,210</div>
                            <div class="chartbar-fill" style="height:61%"></div>
                            <span class="text-[9px] text-gray-600">T</span>
                        </div>
                        <div class="chartbar flex-1 h-full">
                            <div class="chartbar-tip">Wed · $9,120</div>
                            <div class="chartbar-fill" style="height:72%"></div>
                            <span class="text-[9px] text-gray-600">W</span>
                        </div>
                        <div class="chartbar flex-1 h-full">
                            <div class="chartbar-tip" style="color:#a78bfa;">Thu · $14,390 ↑ Peak</div>
                            <div class="chartbar-fill"
                                style="height:100%;background:linear-gradient(180deg,rgba(167,139,250,1),rgba(109,40,217,0.6));filter:drop-shadow(0 0 10px rgba(139,92,246,0.6));">
                            </div>
                            <span class="text-[9px] text-violet-400">T</span>
                        </div>
                        <div class="chartbar flex-1 h-full">
                            <div class="chartbar-tip">Fri · $11,640</div>
                            <div class="chartbar-fill" style="height:79%"></div>
                            <span class="text-[9px] text-gray-600">F</span>
                        </div>
                        <div class="chartbar flex-1 h-full">
                            <div class="chartbar-tip">Sat · $9,860</div>
                            <div class="chartbar-fill" style="height:65%"></div>
                            <span class="text-[9px] text-gray-600">S</span>
                        </div>
                        <div class="chartbar flex-1 h-full">
                            <div class="chartbar-tip">Sun · $7,181</div>
                            <div class="chartbar-fill"
                                style="height:43%;background:linear-gradient(180deg,rgba(99,102,241,0.6),rgba(79,70,229,0.3));">
                            </div>
                            <span class="text-[9px] text-gray-500">S</span>
                        </div>
                    </div>
                    <hr class="dim mt-1 mb-3">
                    <div class="flex items-center gap-4">
                        <div class="flex items-center gap-1.5">
                            <div class="w-2 h-2 rounded-full bg-violet-500"></div><span
                                class="text-[10px] text-gray-500">Revenue</span>
                        </div>
                        <div class="flex items-center gap-1.5">
                            <div class="w-2 h-2 rounded-full bg-cyan-500"></div><span
                                class="text-[10px] text-gray-500">Prev Period</span>
                        </div>
                    </div>
                </div>

                <!-- AI Insights Panel -->
                <div class="ai-panel rounded-2xl p-4 md:p-5 lg:col-span-4 flex flex-col">
                    <div class="flex items-center gap-2 mb-4">
                        <div class="flex gap-1">
                            <div class="ai-dot"></div>
                            <div class="ai-dot"></div>
                            <div class="ai-dot"></div>
                        </div>
                        <span class="text-xs font-semibold text-violet-300 tracking-wide">AI
                            Intelligence</span>
                        <span
                            class="ml-auto text-[9px] font-mono bg-violet-500/20 text-violet-300 px-2 py-0.5 rounded-full border border-violet-500/20">LIVE</span>
                    </div>

                    <!-- Mobile: 2-col grid; Desktop: stack -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-1 gap-2.5 flex-1">

                        <div class="p-3 rounded-xl"
                            style="background:rgba(16,185,129,0.07);border:1px solid rgba(16,185,129,0.12);">
                            <div class="flex items-start gap-2">
                                <span class="text-base leading-none mt-0.5">📈</span>
                                <div>
                                    <div class="text-xs font-semibold text-emerald-300 mb-0.5">Revenue Spike
                                    </div>
                                    <div class="text-[11px] text-gray-400 leading-relaxed">Sales up 18% today
                                        vs 7-day avg.</div>
                                </div>
                            </div>
                        </div>

                        <div class="p-3 rounded-xl"
                            style="background:rgba(245,158,11,0.07);border:1px solid rgba(245,158,11,0.12);">
                            <div class="flex items-start gap-2">
                                <span class="text-base leading-none mt-0.5">🔥</span>
                                <div>
                                    <div class="text-xs font-semibold text-amber-300 mb-0.5">Trending Product
                                    </div>
                                    <div class="text-[11px] text-gray-400 leading-relaxed">Obsidian Hoodie
                                        +340% add-to-cart.</div>
                                </div>
                            </div>
                        </div>

                        <div class="p-3 rounded-xl"
                            style="background:rgba(99,102,241,0.07);border:1px solid rgba(99,102,241,0.12);">
                            <div class="flex items-start gap-2">
                                <span class="text-base leading-none mt-0.5">🎯</span>
                                <div>
                                    <div class="text-xs font-semibold text-indigo-300 mb-0.5">Churn Risk</div>
                                    <div class="text-[11px] text-gray-400 leading-relaxed">147 high-value
                                        customers inactive 30+ days.</div>
                                </div>
                            </div>
                        </div>

                        <div class="p-3 rounded-xl"
                            style="background:rgba(239,68,68,0.07);border:1px solid rgba(239,68,68,0.12);">
                            <div class="flex items-start gap-2">
                                <span class="text-base leading-none mt-0.5">⚡</span>
                                <div>
                                    <div class="text-xs font-semibold text-rose-300 mb-0.5">Cart Abandonment
                                    </div>
                                    <div class="text-[11px] text-gray-400 leading-relaxed">68% abandon rate,
                                        avg $124 cart value.</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <button
                        class="mt-4 w-full py-2.5 rounded-xl text-xs font-semibold text-violet-300 hover:bg-violet-500/10 transition-colors"
                        style="border:1px solid rgba(139,92,246,0.2);">
                        View All Insights →
                    </button>
                </div>
            </section>

            <!-- ── ORDERS TABLE + TOP PRODUCTS ── -->
            <section class="grid grid-cols-1 lg:grid-cols-12 gap-4 md:gap-5">

                <!-- Recent Orders Table -->
                <div class="glass rounded-2xl overflow-hidden lg:col-span-8">
                    <div class="flex items-center justify-between px-4 md:px-6 py-4 border-b"
                        style="border-color:rgba(255,255,255,0.04);">
                        <div>
                            <h2 class="sec-head text-sm">Recent Orders</h2>
                            <p class="text-[10px] text-gray-500 mt-0.5">Latest transactions</p>
                        </div>
                        <button
                            class="text-[11px] text-violet-400 hover:text-violet-300 font-medium transition-colors">View
                            all →</button>
                    </div>

                    <!-- Scrollable table wrapper -->
                    <div class="overflow-x-auto">
                        <table class="w-full" style="min-width:480px;">
                            <thead>
                                <tr style="background:rgba(255,255,255,0.02);">
                                    <th
                                        class="text-left px-4 md:px-6 py-3 text-[9px] font-semibold text-gray-600 uppercase tracking-widest">
                                        Customer</th>
                                    <th
                                        class="text-left px-3 py-3 text-[9px] font-semibold text-gray-600 uppercase tracking-widest hide-xs">
                                        Order</th>
                                    <th
                                        class="text-left px-3 py-3 text-[9px] font-semibold text-gray-600 uppercase tracking-widest">
                                        Status</th>
                                    <th
                                        class="text-left px-3 py-3 text-[9px] font-semibold text-gray-600 uppercase tracking-widest hide-sm">
                                        Items</th>
                                    <th
                                        class="text-right px-4 md:px-6 py-3 text-[9px] font-semibold text-gray-600 uppercase tracking-widest">
                                        Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Row 1 -->
                                <tr class="trow" style="border-top:1px solid rgba(255,255,255,0.04);">
                                    <td class="px-4 md:px-6 py-3.5">
                                        <div class="flex items-center gap-2.5">
                                            <div class="w-7 h-7 rounded-lg flex items-center justify-center text-[10px] font-bold text-white flex-shrink-0"
                                                style="background:linear-gradient(135deg,#7c3aed,#4f46e5);">JL
                                            </div>
                                            <div>
                                                <div class="text-xs font-medium text-gray-200">Jamie Lin</div>
                                                <div class="text-[10px] text-gray-600 hide-xs">jamie@mail.com
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-3 py-3.5 hide-xs"><span
                                            class="font-mono text-[11px] text-gray-500">#NX-00841</span></td>
                                    <td class="px-3 py-3.5"><span class="badge badge-ok">Completed</span></td>
                                    <td class="px-3 py-3.5 hide-sm"><span class="text-[11px] text-gray-500">3
                                            items</span></td>
                                    <td class="px-4 md:px-6 py-3.5 text-right"><span
                                            class="text-sm font-semibold text-white font-mono">$324</span></td>
                                </tr>
                                <!-- Row 2 -->
                                <tr class="trow" style="border-top:1px solid rgba(255,255,255,0.04);">
                                    <td class="px-4 md:px-6 py-3.5">
                                        <div class="flex items-center gap-2.5">
                                            <div class="w-7 h-7 rounded-lg flex items-center justify-center text-[10px] font-bold text-white flex-shrink-0"
                                                style="background:linear-gradient(135deg,#0891b2,#0e7490);">MR
                                            </div>
                                            <div>
                                                <div class="text-xs font-medium text-gray-200">Maya Roberts
                                                </div>
                                                <div class="text-[10px] text-gray-600 hide-xs">maya@hello.co
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-3 py-3.5 hide-xs"><span
                                            class="font-mono text-[11px] text-gray-500">#NX-00840</span></td>
                                    <td class="px-3 py-3.5"><span class="badge badge-warn">Pending</span></td>
                                    <td class="px-3 py-3.5 hide-sm"><span class="text-[11px] text-gray-500">1
                                            item</span></td>
                                    <td class="px-4 md:px-6 py-3.5 text-right"><span
                                            class="text-sm font-semibold text-white font-mono">$89</span></td>
                                </tr>
                                <!-- Row 3 -->
                                <tr class="trow" style="border-top:1px solid rgba(255,255,255,0.04);">
                                    <td class="px-4 md:px-6 py-3.5">
                                        <div class="flex items-center gap-2.5">
                                            <div class="w-7 h-7 rounded-lg flex items-center justify-center text-[10px] font-bold text-white flex-shrink-0"
                                                style="background:linear-gradient(135deg,#059669,#047857);">DK
                                            </div>
                                            <div>
                                                <div class="text-xs font-medium text-gray-200">Dev Kumar</div>
                                                <div class="text-[10px] text-gray-600 hide-xs">devk@inbox.io
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-3 py-3.5 hide-xs"><span
                                            class="font-mono text-[11px] text-gray-500">#NX-00839</span></td>
                                    <td class="px-3 py-3.5"><span class="badge badge-ok">Completed</span></td>
                                    <td class="px-3 py-3.5 hide-sm"><span class="text-[11px] text-gray-500">5
                                            items</span></td>
                                    <td class="px-4 md:px-6 py-3.5 text-right"><span
                                            class="text-sm font-semibold text-white font-mono">$712</span></td>
                                </tr>
                                <!-- Row 4 -->
                                <tr class="trow" style="border-top:1px solid rgba(255,255,255,0.04);">
                                    <td class="px-4 md:px-6 py-3.5">
                                        <div class="flex items-center gap-2.5">
                                            <div class="w-7 h-7 rounded-lg flex items-center justify-center text-[10px] font-bold text-white flex-shrink-0"
                                                style="background:linear-gradient(135deg,#dc2626,#b91c1c);">SP
                                            </div>
                                            <div>
                                                <div class="text-xs font-medium text-gray-200">Sara Park</div>
                                                <div class="text-[10px] text-gray-600 hide-xs">sparky@net.com
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-3 py-3.5 hide-xs"><span
                                            class="font-mono text-[11px] text-gray-500">#NX-00838</span></td>
                                    <td class="px-3 py-3.5"><span class="badge badge-err">Cancelled</span>
                                    </td>
                                    <td class="px-3 py-3.5 hide-sm"><span class="text-[11px] text-gray-500">2
                                            items</span></td>
                                    <td class="px-4 md:px-6 py-3.5 text-right"><span
                                            class="text-sm font-semibold text-gray-600 font-mono line-through">$198</span>
                                    </td>
                                </tr>
                                <!-- Row 5 -->
                                <tr class="trow" style="border-top:1px solid rgba(255,255,255,0.04);">
                                    <td class="px-4 md:px-6 py-3.5">
                                        <div class="flex items-center gap-2.5">
                                            <div class="w-7 h-7 rounded-lg flex items-center justify-center text-[10px] font-bold text-white flex-shrink-0"
                                                style="background:linear-gradient(135deg,#d97706,#b45309);">TN
                                            </div>
                                            <div>
                                                <div class="text-xs font-medium text-gray-200">Tom Nash</div>
                                                <div class="text-[10px] text-gray-600 hide-xs">tom@work.dev
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-3 py-3.5 hide-xs"><span
                                            class="font-mono text-[11px] text-gray-500">#NX-00837</span></td>
                                    <td class="px-3 py-3.5"><span class="badge badge-inf">Processing</span>
                                    </td>
                                    <td class="px-3 py-3.5 hide-sm"><span class="text-[11px] text-gray-500">4
                                            items</span></td>
                                    <td class="px-4 md:px-6 py-3.5 text-right"><span
                                            class="text-sm font-semibold text-white font-mono">$546</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Top Products -->
                <div class="glass rounded-2xl p-4 md:p-5 lg:col-span-4">
                    <div class="flex items-center justify-between mb-4">
                        <div>
                            <h2 class="sec-head text-sm">Top Products</h2>
                            <p class="text-[10px] text-gray-500 mt-0.5">By sales volume</p>
                        </div>
                        <button class="text-[11px] text-violet-400 hover:text-violet-300 font-medium">All
                            →</button>
                    </div>

                    <!-- Mobile: 2-col grid of product cards; Desktop: stack -->
                    <div class="space-y-4">

                        <div class="flex items-center gap-3 group cursor-pointer">
                            <div
                                class="prod-img w-9 h-9 flex items-center justify-center text-base transition-transform group-hover:scale-105">
                                🧥</div>
                            <div class="flex-1 min-w-0">
                                <div class="flex justify-between items-center mb-1">
                                    <span class="text-xs font-medium text-gray-200 truncate pr-1">Obsidian
                                        Hoodie</span>
                                    <span class="text-xs font-semibold text-white font-mono flex-shrink-0">2,841</span>
                                </div>
                                <div class="prog-track h-1.5">
                                    <div class="prog-fill" style="width:94%"></div>
                                </div>
                            </div>
                        </div>

                        <div class="flex items-center gap-3 group cursor-pointer">
                            <div
                                class="prod-img w-9 h-9 flex items-center justify-center text-base transition-transform group-hover:scale-105">
                                👟</div>
                            <div class="flex-1 min-w-0">
                                <div class="flex justify-between items-center mb-1">
                                    <span class="text-xs font-medium text-gray-200 truncate pr-1">Phantom
                                        Runners</span>
                                    <span class="text-xs font-semibold text-white font-mono flex-shrink-0">2,107</span>
                                </div>
                                <div class="prog-track h-1.5">
                                    <div class="prog-fill" style="width:74%"></div>
                                </div>
                            </div>
                        </div>

                        <div class="flex items-center gap-3 group cursor-pointer">
                            <div
                                class="prod-img w-9 h-9 flex items-center justify-center text-base transition-transform group-hover:scale-105">
                                🎒</div>
                            <div class="flex-1 min-w-0">
                                <div class="flex justify-between items-center mb-1">
                                    <span class="text-xs font-medium text-gray-200 truncate pr-1">Void
                                        Backpack</span>
                                    <span class="text-xs font-semibold text-white font-mono flex-shrink-0">1,654</span>
                                </div>
                                <div class="prog-track h-1.5">
                                    <div class="prog-fill" style="width:58%"></div>
                                </div>
                            </div>
                        </div>

                        <div class="flex items-center gap-3 group cursor-pointer">
                            <div
                                class="prod-img w-9 h-9 flex items-center justify-center text-base transition-transform group-hover:scale-105">
                                🕶️</div>
                            <div class="flex-1 min-w-0">
                                <div class="flex justify-between items-center mb-1">
                                    <span class="text-xs font-medium text-gray-200 truncate pr-1">Eclipse
                                        Shades</span>
                                    <span class="text-xs font-semibold text-white font-mono flex-shrink-0">1,290</span>
                                </div>
                                <div class="prog-track h-1.5">
                                    <div class="prog-fill" style="width:44%"></div>
                                </div>
                            </div>
                        </div>

                        <div class="flex items-center gap-3 group cursor-pointer">
                            <div
                                class="prod-img w-9 h-9 flex items-center justify-center text-base transition-transform group-hover:scale-105">
                                ⌚</div>
                            <div class="flex-1 min-w-0">
                                <div class="flex justify-between items-center mb-1">
                                    <span class="text-xs font-medium text-gray-200 truncate pr-1">Stealth
                                        Watch</span>
                                    <span class="text-xs font-semibold text-white font-mono flex-shrink-0">987</span>
                                </div>
                                <div class="prog-track h-1.5">
                                    <div class="prog-fill" style="width:35%"></div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </section>

            <!-- ── BOTTOM ROW: Inventory + Customer Insights + Stats ── -->
            <section class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 md:gap-5">

                <!-- Inventory Alerts -->
                <div class="glass rounded-2xl p-4 md:p-5">
                    <div class="flex items-center justify-between mb-4">
                        <div>
                            <h2 class="sec-head text-sm">Inventory Alerts</h2>
                            <p class="text-[10px] text-gray-500 mt-0.5">Critical stock levels</p>
                        </div>
                        <span class="text-[10px] font-semibold px-2 py-0.5 rounded-full"
                            style="background:rgba(239,68,68,0.15);color:#f87171;border:1px solid rgba(239,68,68,0.2);">6
                            urgent</span>
                    </div>

                    <div class="space-y-2.5">
                        <div class="inv-crit px-4 py-3">
                            <div class="flex items-center justify-between mb-1.5">
                                <div class="flex items-center gap-2">
                                    <div class="w-1.5 h-1.5 rounded-full bg-rose-400 flex-shrink-0"
                                        style="box-shadow:0 0 6px rgba(248,113,113,0.8)"></div>
                                    <span class="text-xs font-medium text-gray-300">Obsidian Hoodie XL</span>
                                </div>
                                <span class="font-mono text-[11px] text-rose-400 font-semibold">3 left</span>
                            </div>
                            <div class="prog-track h-1">
                                <div class="h-full rounded-full" style="width:8%;background:#f87171"></div>
                            </div>
                        </div>

                        <div class="inv-crit px-4 py-3">
                            <div class="flex items-center justify-between mb-1.5">
                                <div class="flex items-center gap-2">
                                    <div class="w-1.5 h-1.5 rounded-full bg-rose-400 flex-shrink-0"
                                        style="box-shadow:0 0 6px rgba(248,113,113,0.8)"></div>
                                    <span class="text-xs font-medium text-gray-300">Eclipse Shades —
                                        Black</span>
                                </div>
                                <span class="font-mono text-[11px] text-rose-400 font-semibold">7 left</span>
                            </div>
                            <div class="prog-track h-1">
                                <div class="h-full rounded-full" style="width:14%;background:#f87171"></div>
                            </div>
                        </div>

                        <div class="inv-warn px-4 py-3">
                            <div class="flex items-center justify-between mb-1.5">
                                <div class="flex items-center gap-2">
                                    <div class="w-1.5 h-1.5 rounded-full bg-amber-400 flex-shrink-0"></div>
                                    <span class="text-xs font-medium text-gray-300">Void Backpack — Navy</span>
                                </div>
                                <span class="font-mono text-[11px] text-amber-400 font-semibold">18 left</span>
                            </div>
                            <div class="prog-track h-1">
                                <div class="h-full rounded-full" style="width:28%;background:#fbbf24"></div>
                            </div>
                        </div>

                        <div class="inv-warn px-4 py-3">
                            <div class="flex items-center justify-between mb-1.5">
                                <div class="flex items-center gap-2">
                                    <div class="w-1.5 h-1.5 rounded-full bg-amber-400 flex-shrink-0"></div>
                                    <span class="text-xs font-medium text-gray-300">Runners — Size 9</span>
                                </div>
                                <span class="font-mono text-[11px] text-amber-400 font-semibold">22 left</span>
                            </div>
                            <div class="prog-track h-1">
                                <div class="h-full rounded-full" style="width:32%;background:#fbbf24"></div>
                            </div>
                        </div>

                        <button
                            class="mt-1 w-full py-2.5 rounded-xl text-xs font-semibold text-rose-400 hover:bg-rose-500/5 transition-colors"
                            style="border:1px solid rgba(239,68,68,0.15);">
                            Restock Critical Items →
                        </button>
                    </div>
                </div>

                <!-- Customer Insights -->
                <div class="glass rounded-2xl p-4 md:p-5">
                    <div class="mb-5">
                        <h2 class="sec-head text-sm">Customer Insights</h2>
                        <p class="text-[10px] text-gray-500 mt-0.5">Behaviour & acquisition</p>
                    </div>

                    <!-- New vs Returning -->
                    <div class="mb-5">
                        <div class="flex justify-between mb-2">
                            <span class="text-[10px] text-gray-500">New vs Returning</span>
                            <span class="text-[10px] font-semibold text-white">62% / 38%</span>
                        </div>
                        <div class="flex h-2 rounded-full overflow-hidden gap-0.5">
                            <div
                                style="width:62%;background:linear-gradient(90deg,#7c3aed,#8b5cf6);border-radius:99px 0 0 99px;">
                            </div>
                            <div
                                style="width:38%;background:linear-gradient(90deg,#0891b2,#06b6d4);border-radius:0 99px 99px 0;">
                            </div>
                        </div>
                        <div class="flex justify-between mt-1.5">
                            <div class="flex items-center gap-1">
                                <div class="w-1.5 h-1.5 rounded-full bg-violet-500"></div><span
                                    class="text-[10px] text-gray-600">New: 29,940</span>
                            </div>
                            <div class="flex items-center gap-1">
                                <div class="w-1.5 h-1.5 rounded-full bg-cyan-500"></div><span
                                    class="text-[10px] text-gray-600">Return: 18,351</span>
                            </div>
                        </div>
                    </div>

                    <!-- Traffic Sources -->
                    <div class="space-y-3">
                        <div class="text-[9px] font-semibold text-gray-600 uppercase tracking-widest">Traffic
                            Sources</div>

                        <div>
                            <div class="flex justify-between mb-1"><span class="text-xs text-gray-400">Organic
                                    Search</span><span class="text-xs font-semibold text-white font-mono">41%</span></div>
                            <div class="prog-track h-1.5">
                                <div class="prog-fill" style="width:41%"></div>
                            </div>
                        </div>
                        <div>
                            <div class="flex justify-between mb-1"><span class="text-xs text-gray-400">Social
                                    Media</span><span class="text-xs font-semibold text-white font-mono">28%</span>
                            </div>
                            <div class="prog-track h-1.5">
                                <div class="prog-fill"
                                    style="width:28%;background:linear-gradient(90deg,#0891b2,#06b6d4)"></div>
                            </div>
                        </div>
                        <div>
                            <div class="flex justify-between mb-1"><span class="text-xs text-gray-400">Paid
                                    Ads</span><span class="text-xs font-semibold text-white font-mono">19%</span>
                            </div>
                            <div class="prog-track h-1.5">
                                <div class="prog-fill"
                                    style="width:19%;background:linear-gradient(90deg,#059669,#10b981)"></div>
                            </div>
                        </div>
                        <div>
                            <div class="flex justify-between mb-1"><span class="text-xs text-gray-400">Direct
                                    / Referral</span><span class="text-xs font-semibold text-white font-mono">12%</span>
                            </div>
                            <div class="prog-track h-1.5">
                                <div class="prog-fill"
                                    style="width:12%;background:linear-gradient(90deg,#d97706,#f59e0b)"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Avg Order Value + Geo -->
                <div class="flex flex-col gap-4 md:col-span-2 lg:col-span-1">

                    <!-- AOV -->
                    <div class="glass rounded-2xl p-4 md:p-5 flex-1">
                        <div class="text-[10px] font-semibold text-gray-500 uppercase tracking-widest mb-1">Avg
                            Order Value</div>
                        <div class="text-3xl font-display font-bold grad-text mb-1">$124.80</div>
                        <div class="flex items-center gap-1.5 mb-4">
                            <div class="flex items-center gap-0.5 text-emerald-400 text-xs font-semibold">
                                <svg width="10" height="10" viewBox="0 0 24 24" fill="none">
                                    <path d="M18 15l-6-6-6 6" stroke="currentColor" stroke-width="2.5"
                                        stroke-linecap="round" />
                                </svg>
                                +$8.40
                            </div>
                            <span class="text-[10px] text-gray-600">vs last 30 days</span>
                        </div>
                        <div class="grid grid-cols-2 gap-3">
                            <div class="rounded-xl p-3 text-center"
                                style="background:rgba(255,255,255,0.03);border:1px solid rgba(255,255,255,0.05);">
                                <div class="text-lg font-bold text-white font-display">2.4×</div>
                                <div class="text-[9px] text-gray-600">Repeat Purchase</div>
                            </div>
                            <div class="rounded-xl p-3 text-center"
                                style="background:rgba(255,255,255,0.03);border:1px solid rgba(255,255,255,0.05);">
                                <div class="text-lg font-bold text-white font-display">$380</div>
                                <div class="text-[9px] text-gray-600">Avg LTV</div>
                            </div>
                        </div>
                    </div>

                    <!-- Geo -->
                    <div class="glass rounded-2xl p-4 md:p-5">
                        <div class="text-[9px] font-semibold text-gray-500 uppercase tracking-widest mb-3">Top
                            Markets</div>
                        <div class="space-y-2.5">
                            <div class="flex items-center gap-2">
                                <span class="text-sm flex-shrink-0">🇺🇸</span>
                                <div class="flex-1">
                                    <div class="prog-track h-1">
                                        <div class="prog-fill" style="width:68%"></div>
                                    </div>
                                </div>
                                <span class="text-[11px] font-mono text-gray-400 w-7 text-right flex-shrink-0">68%</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <span class="text-sm flex-shrink-0">🇬🇧</span>
                                <div class="flex-1">
                                    <div class="prog-track h-1">
                                        <div class="prog-fill"
                                            style="width:14%;background:linear-gradient(90deg,#0891b2,#06b6d4)">
                                        </div>
                                    </div>
                                </div>
                                <span class="text-[11px] font-mono text-gray-400 w-7 text-right flex-shrink-0">14%</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <span class="text-sm flex-shrink-0">🇩🇪</span>
                                <div class="flex-1">
                                    <div class="prog-track h-1">
                                        <div class="prog-fill"
                                            style="width:9%;background:linear-gradient(90deg,#059669,#10b981)">
                                        </div>
                                    </div>
                                </div>
                                <span class="text-[11px] font-mono text-gray-400 w-7 text-right flex-shrink-0">9%</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <span class="text-sm flex-shrink-0">🇯🇵</span>
                                <div class="flex-1">
                                    <div class="prog-track h-1">
                                        <div class="prog-fill"
                                            style="width:6%;background:linear-gradient(90deg,#d97706,#f59e0b)">
                                        </div>
                                    </div>
                                </div>
                                <span class="text-[11px] font-mono text-gray-400 w-7 text-right flex-shrink-0">6%</span>
                            </div>
                        </div>
                    </div>

                </div>
            </section>

            <div class="h-2"></div>
        </div>
    </main>

    <!-- ════════════════════════════ BOTTOM NAV (mobile only) ════════════════════════════ -->
@endsection
