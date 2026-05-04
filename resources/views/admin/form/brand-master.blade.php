@extends('admin.layouts.app')
@section('content')
    <style>
        /* ── Inputs ── */
        .inp {
            width: 100%;
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 10px;
            color: #e2e8f0;
            font-size: 13px;
            font-family: 'DM Sans', sans-serif;
            padding: 9px 13px;
            transition: all 0.2s;
            outline: none;
        }

        .inp::placeholder {
            color: rgba(255, 255, 255, 0.18);
        }

        .inp:focus {
            background: rgba(139, 92, 246, 0.05);
            border-color: rgba(139, 92, 246, 0.45);
            box-shadow: 0 0 0 3px rgba(139, 92, 246, 0.08);
        }

        .inp-mono {
            font-family: 'DM Mono', monospace;
            font-size: 12px;
            color: rgba(196, 181, 253, 0.8);
        }

        /* ── Select ── */
        .sel {
            width: 100%;
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 10px;
            color: rgba(255, 255, 255, 0.65);
            font-size: 13px;
            font-family: 'DM Sans', sans-serif;
            padding: 9px 13px;
            transition: all 0.2s;
            outline: none;
            appearance: none;
            cursor: pointer;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 24 24' fill='none' stroke='rgba(255,255,255,0.3)' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpolyline points='6 9 12 15 18 9'%3E%3C/polyline%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 13px center;
            padding-right: 34px;
        }

        .sel:focus {
            background-color: rgba(139, 92, 246, 0.05);
            border-color: rgba(139, 92, 246, 0.45);
            box-shadow: 0 0 0 3px rgba(139, 92, 246, 0.08);
        }

        .sel option {
            background: #161B26;
            color: #e2e8f0;
        }

        /* ── Labels ── */
        .lbl {
            display: block;
            font-size: 10.5px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            color: rgba(255, 255, 255, 0.35);
            margin-bottom: 6px;
        }

        /* ── Section heading ── */
        .sec-title {
            font-family: 'Syne', sans-serif;
            font-weight: 700;
            font-size: 15px;
            color: #f1f5f9;
        }

        .sec-sub {
            font-size: 11px;
            color: rgba(255, 255, 255, 0.28);
            margin-top: 2px;
        }

        /* ── Divider ── */
        .dim {
            border-color: rgba(255, 255, 255, 0.05);
        }

        /* ── Inputs ── */
        .inp {
            width: 100%;
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 10px;
            color: #e2e8f0;
            font-size: 13px;
            font-family: 'DM Sans', sans-serif;
            padding: 9px 13px;
            transition: all 0.2s;
            outline: none;
        }

        .inp::placeholder {
            color: rgba(255, 255, 255, 0.18);
        }

        .inp:focus {
            background: rgba(139, 92, 246, 0.05);
            border-color: rgba(139, 92, 246, 0.45);
            box-shadow: 0 0 0 3px rgba(139, 92, 246, 0.08);
        }

        .inp-mono {
            font-family: 'DM Mono', monospace;
            font-size: 12px;
            color: rgba(196, 181, 253, 0.8);
        }

        /* ── Select ── */
        .sel {
            width: 100%;
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 10px;
            color: rgba(255, 255, 255, 0.65);
            font-size: 13px;
            font-family: 'DM Sans', sans-serif;
            padding: 9px 13px;
            transition: all 0.2s;
            outline: none;
            appearance: none;
            cursor: pointer;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 24 24' fill='none' stroke='rgba(255,255,255,0.3)' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpolyline points='6 9 12 15 18 9'%3E%3C/polyline%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 13px center;
            padding-right: 34px;
        }

        .sel:focus {
            background-color: rgba(139, 92, 246, 0.05);
            border-color: rgba(139, 92, 246, 0.45);
            box-shadow: 0 0 0 3px rgba(139, 92, 246, 0.08);
        }

        .sel option {
            background: #161B26;
            color: #e2e8f0;
        }

        /* ── Labels ── */
        .lbl {
            display: block;
            font-size: 10.5px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            color: rgba(255, 255, 255, 0.35);
            margin-bottom: 6px;
        }

        /* ── Section heading ── */
        .sec-title {
            font-family: 'Syne', sans-serif;
            font-weight: 700;
            font-size: 15px;
            color: #f1f5f9;
        }

        .sec-sub {
            font-size: 11px;
            color: rgba(255, 255, 255, 0.28);
            margin-top: 2px;
        }

        /* ── Divider ── */
        .dim {
            border-color: rgba(255, 255, 255, 0.05);
        }

        /* hide checkbox */
        .toggle-input {
            display: none;
        }

        /* wrapper */
        .toggle-wrapper {
            display: flex;
            align-items: center;
            gap: 8px;
            cursor: pointer;
        }

        /* toggle base */
        .tog {
            width: 38px;
            height: 20px;
            background: rgba(255, 255, 255, 0.08);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 99px;
            position: relative;
            transition: all 0.25s;
        }

        /* thumb */
        .tog-thumb {
            width: 14px;
            height: 14px;
            background: rgba(255, 255, 255, 0.5);
            border-radius: 50%;
            position: absolute;
            top: 2px;
            left: 2px;
            transition: all 0.25s cubic-bezier(0.4, 0, 0.2, 1);
        }

        /* ✅ when checked */
        .toggle-input:checked+.tog {
            background: linear-gradient(90deg, #7c3aed, #4f46e5);
            border-color: rgba(139, 92, 246, 0.45);
            box-shadow: 0 0 10px rgba(124, 58, 237, 0.28);
        }

        .toggle-input:checked+.tog .tog-thumb {
            left: calc(100% - 16px);
            background: #fff;
        }

        /* ── Badges ── */
        .badge {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            padding: 2px 9px;
            border-radius: 99px;
            font-size: 10px;
            font-weight: 700;
            letter-spacing: 0.04em;
            white-space: nowrap;
        }

        .badge-on {
            background: rgba(16, 185, 129, 0.12);
            color: #34d399;
            border: 1px solid rgba(16, 185, 129, 0.22);
        }

        .badge-off {
            background: rgba(100, 116, 139, 0.12);
            color: #94a3b8;
            border: 1px solid rgba(100, 116, 139, 0.2);
        }

        .badge-on::before {
            content: '';
            width: 5px;
            height: 5px;
            border-radius: 50%;
            background: #34d399;
            box-shadow: 0 0 5px #34d399;
        }

        .badge-off::before {
            content: '';
            width: 5px;
            height: 5px;
            border-radius: 50%;
            background: #94a3b8;
        }

        /* ── Table ── */
        .tbl {
            width: 100%;
            border-collapse: collapse;
        }

        .tbl thead tr {
            background: rgba(255, 255, 255, 0.025);
        }

        .tbl th {
            text-align: left;
            padding: 10px 14px;
            font-size: 9.5px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.09em;
            color: rgba(255, 255, 255, 0.3);
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
            white-space: nowrap;
        }

        .tbl td {
            padding: 11px 14px;
            font-size: 12.5px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.04);
            vertical-align: middle;
        }

        .tbl tr:last-child td {
            border-bottom: none;
        }

        .tbl tbody tr {
            transition: background 0.15s;
        }

        .tbl tbody tr:hover {
            background: rgba(255, 255, 255, 0.022);
        }

        /* ── Action buttons ── */
        .act-btn {
            width: 28px;
            height: 28px;
            border-radius: 8px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.18s;
            border: 1px solid transparent;
        }

        .act-edit {
            background: rgba(99, 102, 241, 0.1);
            color: #818cf8;
            border-color: rgba(99, 102, 241, 0.18);
        }

        .act-edit:hover {
            background: rgba(99, 102, 241, 0.2);
            box-shadow: 0 0 10px rgba(99, 102, 241, 0.25);
        }

        .act-del {
            background: rgba(239, 68, 68, 0.08);
            color: #f87171;
            border-color: rgba(239, 68, 68, 0.16);
        }

        .act-del:hover {
            background: rgba(239, 68, 68, 0.18);
            box-shadow: 0 0 10px rgba(239, 68, 68, 0.2);
        }

        /* ── Form + table inner container ── */
        .card-form {
            padding: 18px;
            background: rgba(255, 255, 255, 0.02);
            border: 1px solid rgba(255, 255, 255, 0.05);
            border-radius: 14px;
            margin-bottom: 18px;
        }

        .card-table {
            overflow: hidden;
            border: 1px solid rgba(255, 255, 255, 0.05);
            border-radius: 14px;
            overflow-x: auto;
        }

        /* ── Step badge ── */
        .mod-icon {
            width: 34px;
            height: 34px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        /* ── Logo preview ── */
        .logo-preview {
            width: 52px;
            height: 52px;
            border-radius: 10px;
            background: linear-gradient(135deg, rgba(139, 92, 246, 0.1), rgba(6, 182, 212, 0.08));
            border: 1px solid rgba(255, 255, 255, 0.07);
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            flex-shrink: 0;
        }

        /* ── Upload box ── */
        .upload-box {
            border: 1.5px dashed rgba(255, 255, 255, 0.1);
            border-radius: 10px;
            padding: 14px;
            display: flex;
            align-items: center;
            gap: 12px;
            cursor: pointer;
            transition: all 0.2s;
            background: rgba(255, 255, 255, 0.02);
        }

        .upload-box:hover {
            border-color: rgba(139, 92, 246, 0.4);
            background: rgba(139, 92, 246, 0.04);
        }

        /* ── Count badge ── */
        .count-chip {
            font-size: 10px;
            font-weight: 700;
            font-family: 'DM Mono', monospace;
            padding: 2px 8px;
            border-radius: 6px;
            background: rgba(139, 92, 246, 0.15);
            color: #a78bfa;
            border: 1px solid rgba(139, 92, 246, 0.2);
        }

        /* ── Search bar ── */
        .search-inp {
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(255, 255, 255, 0.07);
            border-radius: 9px;
            color: #e2e8f0;
            font-size: 12px;
            font-family: 'DM Sans', sans-serif;
            padding: 7px 12px 7px 32px;
            outline: none;
            transition: all 0.2s;
            width: 160px;
        }

        .search-inp::placeholder {
            color: rgba(255, 255, 255, 0.18);
        }

        .search-inp:focus {
            border-color: rgba(139, 92, 246, 0.4);
            width: 190px;
            background: rgba(139, 92, 246, 0.04);
        }

        /* ── Sortable col indicator ── */
        .sort-th {
            cursor: pointer;
            user-select: none;
        }

        .sort-th:hover {
            color: rgba(255, 255, 255, 0.55);
        }

        /* ── Empty state ── */
        .empty-row td {
            text-align: center;
            padding: 28px 14px;
            color: rgba(255, 255, 255, 0.2);
            font-size: 12px;
        }
    </style>
    <div class="relative z-10 px-4 md:px-6 py-6 max-w-[1400px] pb-16 overflow-y-auto">

        <!-- ── PAGE HEADER ── -->
        <div class="flex flex-col sm:flex-row sm:items-start sm:justify-between gap-4 mb-7">
            <div>
                <!-- Breadcrumb -->
                <div class="flex items-center gap-1.5 mb-2.5">
                    <a href="#" class="text-[11px] text-gray-600 hover:text-gray-400 transition-colors">Dashboard</a>
                    <svg width="9" height="9" viewBox="0 0 24 24" fill="none" class="text-gray-700">
                        <path d="M9 18l6-6-6-6" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                    </svg>
                    <a href="#" class="text-[11px] text-gray-600 hover:text-gray-400 transition-colors">Masters</a>
                    <svg width="9" height="9" viewBox="0 0 24 24" fill="none" class="text-gray-700">
                        <path d="M9 18l6-6-6-6" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                    </svg>
                    <span class="text-[11px] text-violet-400 font-medium">Category & Brands</span>
                </div>
                <h1 class="font-display text-2xl md:text-[28px] font-bold grad-text leading-tight">Category & Brand
                    Management</h1>
                <p class="text-sm text-gray-500 mt-1">Manage all product classification masters in one place.</p>
            </div>
            <!-- Header actions -->
            <div class="flex items-center gap-2.5 flex-shrink-0">
                <button
                    class="btn-ghost text-xs py-2 px-4 sm:flex items-center gap-1.5 px-3 py-2 rounded-xl text-xs font-semibold text-white"
                    onclick="simulateRefresh(this)">
                    <svg width="13" height="13" viewBox="0 0 24 24" fill="none" id="refreshIcon">
                        <path d="M23 4v6h-6M1 20v-6h6" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" />
                        <path d="M3.51 9a9 9 0 0114.85-3.36L23 10M1 14l4.64 4.36A9 9 0 0020.49 15" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    Refresh
                </button>

            </div>
        </div>

        <!-- ── STATS ROW ── -->
        {{-- <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-7">
            <div class="glass p-4 flex items-center gap-3">
                <div class="mod-icon" style="background:rgba(139,92,246,0.14);border:1px solid rgba(139,92,246,0.22);">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" class="text-violet-400">
                        <path d="M4 6h16M4 10h16M4 14h8" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                    </svg>
                </div>
                <div>
                    <div class="text-[10px] text-gray-500 uppercase tracking-widest">Categories</div>
                    <div class="text-xl font-display font-bold text-white">12</div>
                </div>
            </div>
            <div class="glass p-4 flex items-center gap-3">
                <div class="mod-icon" style="background:rgba(6,182,212,0.12);border:1px solid rgba(6,182,212,0.2);">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" class="text-cyan-400">
                        <path d="M4 6h16M4 10h16M4 14h12" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                    </svg>
                </div>
                <div>
                    <div class="text-[10px] text-gray-500 uppercase tracking-widest">Subcategories</div>
                    <div class="text-xl font-display font-bold text-white">34</div>
                </div>
            </div>
            <div class="glass p-4 flex items-center gap-3">
                <div class="mod-icon" style="background:rgba(16,185,129,0.12);border:1px solid rgba(16,185,129,0.2);">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" class="text-emerald-400">
                        <path
                            d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </div>
                <div>
                    <div class="text-[10px] text-gray-500 uppercase tracking-widest">Brands</div>
                    <div class="text-xl font-display font-bold text-white">8</div>
                </div>
            </div>
            <div class="glass p-4 flex items-center gap-3">
                <div class="mod-icon" style="background:rgba(245,158,11,0.12);border:1px solid rgba(245,158,11,0.2);">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" class="text-amber-400">
                        <rect x="2" y="7" width="20" height="14" rx="2" stroke="currentColor"
                            stroke-width="2" />
                        <path d="M16 7V5a2 2 0 00-2-2h-4a2 2 0 00-2 2v2" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" />
                    </svg>
                </div>
                <div>
                    <div class="text-[10px] text-gray-500 uppercase tracking-widest">Product Types</div>
                    <div class="text-xl font-display font-bold text-white">5</div>
                </div>
            </div>
        </div> --}}

        <!-- ── MAIN 2-COL GRID ── -->
        <div class="grid grid-cols-1 lg:grid-cols-1 gap-6">

            <!-- ══════════════════ 3. BRAND MASTER ══════════════════ -->
            <div class="glass p-5 md:p-6 flex flex-col gap-5">

                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <div class="mod-icon"
                            style="background:rgba(16,185,129,0.12);border:1px solid rgba(16,185,129,0.2);">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" class="text-emerald-400">
                                <path
                                    d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </div>
                        <div>
                            <div class="sec-title">Brand Master</div>
                            <div class="sec-sub">Official brand directory</div>
                        </div>
                    </div>
                    <span class="count-chip"
                        style="background:rgba(16,185,129,0.12);color:#34d399;border-color:rgba(16,185,129,0.2);">8
                        total</span>
                </div>
                <form action="{{ route('admin.brand-master.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{ optional($brandId)->id }}">
                    <!-- Form -->
                    <div class="card-form">
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 mb-3">
                            <div>
                                <label class="lbl">Brand Name <span class="text-rose-500">*</span></label>
                                <input type="text" class="inp" name="name" placeholder="e.g. Obsidian Co."
                                    id="brandName" value="{{ old('name', optional($brandId)->name) }}"
                                    oninput="autoSlug(this,'brandSlug')">
                            </div>
                            <div>
                                <label class="lbl">Slug</label>
                                <input type="text" class="inp inp-mono"
                                    value="{{ old('slug', optional($brandId)->slug) }}" placeholder="obsidian-co"
                                    name="slug" id="brandSlug">
                            </div>
                        </div>
                        <!-- Logo upload -->
                        <div class="mb-3">
                            <label class="lbl">Brand Logo</label>
                            <div class="upload-box" onclick="document.getElementById('logoUpload').click()">
                                <div class="logo-preview" id="logoPreview">
                                    @if (isset($brandId) && $brandId->file)
                                        <img src="{{ asset('uploads/brands/' . $brandId->file) }}" width="80">
                                    @else
                                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none"
                                            class="text-gray-600">
                                            <rect x="3" y="3" width="18" height="18" rx="2"
                                                stroke="currentColor" stroke-width="2" />
                                            <circle cx="8.5" cy="8.5" r="1.5" fill="currentColor" />
                                            <path d="M21 15l-5-5L5 21" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" />
                                        </svg>
                                    @endif
                                </div>
                                <div>
                                    <div class="text-xs font-medium text-gray-300">Upload logo</div>
                                    <div class="text-[11px] text-gray-600">PNG, SVG, WEBP · Max 2MB</div>
                                </div>
                                <span class="ml-auto btn-sm btn-sm-ghost pointer-events-none">Browse</span>
                            </div>
                            <input type="file" id="logoUpload" class="hidden" name="file" accept="image/*"
                                onchange="previewLogo(this)">
                        </div>
                        <div class="flex items-center justify-between">
                            <label class="toggle-wrapper">
                                <input type="checkbox" name="status" class="toggle-input" value="1" checked>

                                <div class="tog">
                                    <div class="tog-thumb"></div>
                                </div>

                                <span class="text-xs text-gray-400">Active</span>
                            </label>
                            <button
                                class="btn-sm btn-sm-primary text-xs py-2 px-4 sm:flex items-center gap-1.5 px-3 py-2 rounded-xl text-xs font-semibold text-white"
                                style="background:linear-gradient(135deg,#059669,#047857);border-color:rgba(16,185,129,0.4);">
                                <svg width="11" height="11" viewBox="0 0 24 24" fill="none">
                                    <path d="M12 5v14M5 12h14" stroke="white" stroke-width="2.5"
                                        stroke-linecap="round" />
                                </svg>
                                Add Brand
                            </button>
                        </div>
                    </div>
                </form>

                <!-- Table -->
                <div>
                    <div class="flex items-center justify-between mb-3">
                        <span class="text-[11px] text-gray-500 font-medium">Brand List</span>
                        <div class="relative">
                            <svg width="12" height="12" viewBox="0 0 24 24" fill="none"
                                class="absolute left-2.5 top-1/2 -translate-y-1/2 text-gray-600 pointer-events-none">
                                <circle cx="11" cy="11" r="8" stroke="currentColor" stroke-width="2" />
                                <path d="M21 21l-4.35-4.35" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" />
                            </svg>
                            <input type="text" class="search-inp" placeholder="Search…">
                        </div>
                    </div>
                    <div class="card-table">
                        <table class="tbl">
                            <thead>
                                <tr>
                                    <th>Logo</th>
                                    <th class="sort-th">Brand Name</th>
                                    <th>Slug</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($brands as $brand)
                                    <tr>
                                        <td>
                                            <div
                                                style="width:30px;height:30px;border-radius:8px;background:linear-gradient(135deg,rgba(139,92,246,0.2),rgba(6,182,212,0.1));border:1px solid rgba(255,255,255,0.07);display:flex;align-items:center;justify-content:center;">
                                                <span
                                                    style="font-size:11px;font-weight:800;color:#a78bfa;font-family:'Syne',sans-serif;">
                                                    @if ($brand->file)
                                                        <img src="{{ asset('uploads/brands/' . $brand->file . '') }}"
                                                            alt="images">
                                                    @else
                                                        NA
                                                    @endif
                                                </span>
                                            </div>
                                        </td>
                                        <td class="font-semibold text-gray-200">{{ $brand->name }}</td>
                                        <td class="font-mono text-[11px] text-violet-400/70">{{ $brand->slug }}</td>
                                        <td><span
                                                class="badge {{ $brand->status == 1 ? 'badge-on' : 'badge-off' }} ">{{ $brand->status == 1 ? 'Active' : 'Inactive' }}</span>
                                        </td>
                                        <td>
                                            <div class="flex gap-1.5">
                                                <a href="{{ route('admin.brand-master.edit', $brand->id) }}"
                                                    class="act-btn act-edit" title="Edit">
                                                    <svg width="12" height="12" viewBox="0 0 24 24"
                                                        fill="none">
                                                        <path d="M11 4H4a2 2 0 00-2 2v14a2 2 0 002 2h14a2 2 0 002-2v-7"
                                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                        <path d="M18.5 2.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 9.5-9.5z"
                                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                    </svg>
                                                </a>
                                                <button class="act-btn act-del" title="Delete"><svg width="12"
                                                        height="12" viewBox="0 0 24 24" fill="none">
                                                        <path
                                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"
                                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                    </svg></button>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach

                                {{-- <tr>
                                    <td>
                                        <div
                                            style="width:30px;height:30px;border-radius:8px;background:linear-gradient(135deg,rgba(6,182,212,0.2),rgba(16,185,129,0.1));border:1px solid rgba(255,255,255,0.07);display:flex;align-items:center;justify-content:center;">
                                            <span
                                                style="font-size:11px;font-weight:800;color:#22d3ee;font-family:'Syne',sans-serif;">P</span>
                                        </div>
                                    </td>
                                    <td class="font-semibold text-gray-200">Phantom Label</td>
                                    <td class="font-mono text-[11px] text-violet-400/70">phantom-label</td>
                                    <td><span class="badge badge-on">Active</span></td>
                                    <td>
                                        <div class="flex gap-1.5"><button class="act-btn act-edit" title="Edit"><svg
                                                    width="12" height="12" viewBox="0 0 24 24" fill="none">
                                                    <path d="M11 4H4a2 2 0 00-2 2v14a2 2 0 002 2h14a2 2 0 002-2v-7"
                                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                    <path d="M18.5 2.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 9.5-9.5z"
                                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </svg></button><button class="act-btn act-del" title="Delete"><svg
                                                    width="12" height="12" viewBox="0 0 24 24" fill="none">
                                                    <path
                                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"
                                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </svg></button></div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div
                                            style="width:30px;height:30px;border-radius:8px;background:linear-gradient(135deg,rgba(245,158,11,0.18),rgba(239,68,68,0.1));border:1px solid rgba(255,255,255,0.07);display:flex;align-items:center;justify-content:center;">
                                            <span
                                                style="font-size:11px;font-weight:800;color:#fbbf24;font-family:'Syne',sans-serif;">E</span>
                                        </div>
                                    </td>
                                    <td class="font-semibold text-gray-200">Eclipse Studio</td>
                                    <td class="font-mono text-[11px] text-violet-400/70">eclipse-studio</td>
                                    <td><span class="badge badge-on">Active</span></td>
                                    <td>
                                        <div class="flex gap-1.5"><button class="act-btn act-edit" title="Edit"><svg
                                                    width="12" height="12" viewBox="0 0 24 24" fill="none">
                                                    <path d="M11 4H4a2 2 0 00-2 2v14a2 2 0 002 2h14a2 2 0 002-2v-7"
                                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                    <path d="M18.5 2.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 9.5-9.5z"
                                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </svg></button><button class="act-btn act-del" title="Delete"><svg
                                                    width="12" height="12" viewBox="0 0 24 24" fill="none">
                                                    <path
                                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"
                                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </svg></button></div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div
                                            style="width:30px;height:30px;border-radius:8px;background:linear-gradient(135deg,rgba(100,116,139,0.18),rgba(71,85,105,0.1));border:1px solid rgba(255,255,255,0.07);display:flex;align-items:center;justify-content:center;">
                                            <span
                                                style="font-size:11px;font-weight:800;color:#94a3b8;font-family:'Syne',sans-serif;">V</span>
                                        </div>
                                    </td>
                                    <td class="font-semibold text-gray-400">Void Apparel</td>
                                    <td class="font-mono text-[11px] text-gray-600">void-apparel</td>
                                    <td><span class="badge badge-off">Inactive</span></td>
                                    <td>
                                        <div class="flex gap-1.5"><button class="act-btn act-edit" title="Edit"><svg
                                                    width="12" height="12" viewBox="0 0 24 24" fill="none">
                                                    <path d="M11 4H4a2 2 0 00-2 2v14a2 2 0 002 2h14a2 2 0 002-2v-7"
                                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                    <path d="M18.5 2.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 9.5-9.5z"
                                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </svg></button><button class="act-btn act-del" title="Delete"><svg
                                                    width="12" height="12" viewBox="0 0 24 24" fill="none">
                                                    <path
                                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"
                                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </svg></button></div>
                                    </td>
                                </tr> --}}
                            </tbody>
                        </table>
                    </div>
                    <div class="flex items-center justify-between mt-3 px-1">
                        <span class="text-[11px] text-gray-600">Showing 4 of 8</span>
                        <div class="flex gap-1">
                            <button class="btn-sm btn-sm-ghost px-2.5">‹</button>
                            <button class="btn-sm btn-sm-ghost px-2.5"
                                style="background:rgba(16,185,129,0.12);border-color:rgba(16,185,129,0.25);color:#34d399;">1</button>
                            <button class="btn-sm btn-sm-ghost px-2.5">2</button>
                            <button class="btn-sm btn-sm-ghost px-2.5">›</button>
                        </div>
                    </div>
                </div>
            </div>


        </div><!-- /grid -->


    </div>
    <script>
        function previewLogo(input) {
            let file = input.files[0];

            if (file) {
                let reader = new FileReader();

                reader.onload = function(e) {
                    let logoPreview = document.getElementById('logoPreview');

                    logoPreview.innerHTML = `<img src="${e.target.result}" alt="image" width="100">`;
                };

                reader.readAsDataURL(file);
            }
        }


        function autoSlug(input, targetId) {
            const slug = input.value
                .toLowerCase()
                .trim()
                .replace(/[^a-z0-9\s-]/g, '')
                .replace(/\s+/g, '-')
                .replace(/-+/g, '-');
            const target = document.getElementById(targetId);
            if (target) target.value = slug;
        }
    </script>
@endsection
