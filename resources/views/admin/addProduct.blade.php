@extends('admin.layouts.app')
@section('content')
    <style>
        /* Ambient glows */
        .glow-orb {
            position: fixed;
            border-radius: 50%;
            filter: blur(110px);
            pointer-events: none;
            z-index: 0;
        }

        .glow-1 {
            width: 500px;
            height: 500px;
            background: radial-gradient(circle, rgba(109, 40, 217, 0.08) 0%, transparent 70%);
            top: -150px;
            left: -50px;
        }

        .glow-2 {
            width: 400px;
            height: 400px;
            background: radial-gradient(circle, rgba(6, 182, 212, 0.05) 0%, transparent 70%);
            bottom: -100px;
            right: 0;
        }


        /* Glass card */
        .glass {
            background: linear-gradient(135deg, rgba(22, 27, 38, 0.82) 0%, rgba(18, 24, 33, 0.88) 100%);
            border: 1px solid rgba(255, 255, 255, 0.06);
            border-radius: 16px;
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }

        .glass:hover {
            border-color: rgba(139, 92, 246, 0.18);
            box-shadow: 0 0 0 1px rgba(139, 92, 246, 0.05), 0 20px 50px -15px rgba(0, 0, 0, 0.45);
        }

        /* Gradient text */
        .grad-text {
            background: linear-gradient(135deg, #c4b5fd, #38bdf8);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }


        .btn-ghost {
            background: rgba(255, 255, 255, 0.04);
            border: 1px solid rgba(255, 255, 255, 0.08);
            color: rgba(255, 255, 255, 0.65);
            font-weight: 500;
            font-size: 13px;
            padding: 9px 18px;
            border-radius: 10px;
            cursor: pointer;
            transition: all 0.2s;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .btn-ghost:hover {
            background: rgba(255, 255, 255, 0.07);
            border-color: rgba(255, 255, 255, 0.13);
            color: white;
        }

        .btn-danger-ghost {
            background: rgba(239, 68, 68, 0.06);
            border: 1px solid rgba(239, 68, 68, 0.18);
            color: #f87171;
            font-weight: 500;
            font-size: 13px;
            padding: 9px 18px;
            border-radius: 10px;
            cursor: pointer;
            transition: all 0.2s;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .btn-danger-ghost:hover {
            background: rgba(239, 68, 68, 0.1);
        }

        /* Inputs */
        .inp {
            width: 100%;
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 10px;
            color: #e2e8f0;
            font-size: 13px;
            font-family: 'DM Sans', sans-serif;
            padding: 10px 14px;
            transition: all 0.2s;
            outline: none;
        }

        .inp::placeholder {
            color: rgba(255, 255, 255, 0.2);
        }

        .inp:focus {
            background: rgba(139, 92, 246, 0.05);
            border-color: rgba(139, 92, 246, 0.45);
            box-shadow: 0 0 0 3px rgba(139, 92, 246, 0.08);
        }

        /* Select */
        .sel {
            width: 100%;
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 10px;
            color: rgba(255, 255, 255, 0.7);
            font-size: 13px;
            font-family: 'DM Sans', sans-serif;
            padding: 10px 14px;
            transition: all 0.2s;
            outline: none;
            appearance: none;
            cursor: pointer;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 24 24' fill='none' stroke='rgba(255,255,255,0.3)' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpolyline points='6 9 12 15 18 9'%3E%3C/polyline%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 14px center;
            padding-right: 36px;
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

        /* Labels */
        .lbl {
            display: block;
            font-size: 11px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            color: rgba(255, 255, 255, 0.38);
            margin-bottom: 7px;
        }

        /* Card headings */
        .card-head {
            font-family: 'Syne', sans-serif;
            font-weight: 700;
            font-size: 14px;
            color: white;
        }

        .card-subhead {
            font-size: 11px;
            color: rgba(255, 255, 255, 0.28);
            margin-top: 1px;
        }

        /* Divider */
        .dim {
            border-color: rgba(255, 255, 255, 0.05);
        }

        /* Toggle */
        .toggle-track {
            width: 40px;
            height: 22px;
            background: rgba(255, 255, 255, 0.08);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 99px;
            position: relative;
            transition: all 0.25s;
            cursor: pointer;
            flex-shrink: 0;
        }

        .toggle-track.on {
            background: linear-gradient(90deg, #7c3aed, #4f46e5);
            border-color: rgba(139, 92, 246, 0.5);
            box-shadow: 0 0 12px rgba(124, 58, 237, 0.3);
        }

        .toggle-thumb {
            width: 16px;
            height: 16px;
            background: rgba(255, 255, 255, 0.5);
            border-radius: 50%;
            position: absolute;
            top: 2px;
            left: 2px;
            transition: all 0.25s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .toggle-track.on .toggle-thumb {
            left: calc(100% - 18px);
            background: white;
        }

        /* Size pills */
        .size-pill {
            padding: 5px 12px;
            border-radius: 8px;
            font-size: 12px;
            font-weight: 600;
            font-family: 'DM Mono', monospace;
            border: 1px solid rgba(255, 255, 255, 0.08);
            background: rgba(255, 255, 255, 0.04);
            color: rgba(255, 255, 255, 0.4);
            cursor: pointer;
            transition: all 0.2s;
            user-select: none;
        }

        .size-pill:hover {
            border-color: rgba(139, 92, 246, 0.3);
            color: rgba(255, 255, 255, 0.7);
        }

        .size-pill.selected {
            background: rgba(139, 92, 246, 0.15);
            border-color: rgba(139, 92, 246, 0.4);
            color: #c4b5fd;
        }

        /* Color swatch */
        .color-swatch {
            width: 28px;
            height: 28px;
            border-radius: 8px;
            border: 2px solid transparent;
            cursor: pointer;
            transition: all 0.2s;
            position: relative;
        }

        .color-swatch:hover {
            transform: scale(1.12);
        }

        .color-swatch.selected {
            border-color: white;
            box-shadow: 0 0 0 2px rgba(255, 255, 255, 0.2);
        }

        .color-swatch.selected::after {
            content: '✓';
            position: absolute;
            inset: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 11px;
            font-weight: 700;
            color: white;
            text-shadow: 0 1px 3px rgba(0, 0, 0, 0.6);
        }

        /* Drop zone */
        .dropzone {
            border: 2px dashed rgba(255, 255, 255, 0.1);
            border-radius: 14px;
            background: rgba(255, 255, 255, 0.02);
            transition: all 0.25s;
            cursor: pointer;
        }

        .dropzone:hover,
        .dropzone.drag {
            border-color: rgba(139, 92, 246, 0.45);
            background: rgba(139, 92, 246, 0.04);
            box-shadow: inset 0 0 30px rgba(139, 92, 246, 0.04);
        }

        /* Thumbnails */
        .thumb {
            border-radius: 10px;
            background: linear-gradient(135deg, rgba(139, 92, 246, 0.12), rgba(6, 182, 212, 0.08));
            border: 1px solid rgba(255, 255, 255, 0.07);
            aspect-ratio: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
            transition: all 0.2s;
        }

        .thumb:hover .thumb-overlay {
            opacity: 1;
        }

        .thumb-overlay {
            position: absolute;
            inset: 0;
            background: rgba(0, 0, 0, 0.6);
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: opacity 0.2s;
            gap: 6px;
        }

        .thumb.primary-badge::before {
            content: 'Main';
            position: absolute;
            top: 6px;
            left: 6px;
            background: rgba(139, 92, 246, 0.85);
            color: white;
            font-size: 9px;
            font-weight: 700;
            padding: 2px 7px;
            border-radius: 5px;
            letter-spacing: 0.05em;
            z-index: 2;
        }

        /* Field icon prefix */
        .inp-icon-wrap {
            position: relative;
        }

        .inp-icon-wrap .inp {
            padding-left: 38px;
        }

        .inp-prefix {
            position: absolute;
            left: 12px;
            top: 50%;
            transform: translateY(-50%);
            color: rgba(255, 255, 255, 0.25);
            pointer-events: none;
        }

        /* Progress */
        .prog-fill {
            height: 100%;
            border-radius: 99px;
            background: linear-gradient(90deg, #7c3aed, #06b6d4);
            position: relative;
            overflow: hidden;
        }

        .prog-fill::after {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.15), transparent);
            background-size: 200% 100%;
            animation: shimmer 2.5s linear infinite;
        }

        @keyframes shimmer {
            0% {
                background-position: -200% 0;
            }

            100% {
                background-position: 200% 0;
            }
        }

        /* Tag chip */
        .tag-chip {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            background: rgba(139, 92, 246, 0.12);
            border: 1px solid rgba(139, 92, 246, 0.25);
            border-radius: 7px;
            padding: 3px 10px;
            font-size: 12px;
            color: #c4b5fd;
        }

        .tag-chip button {
            color: rgba(196, 181, 253, 0.5);
            font-size: 14px;
            line-height: 1;
            background: none;
            border: none;
            cursor: pointer;
            transition: color 0.15s;
            padding: 0;
        }

        .tag-chip button:hover {
            color: #f87171;
        }

        /* Mini stat */
        .mini-stat {
            background: rgba(255, 255, 255, 0.025);
            border: 1px solid rgba(255, 255, 255, 0.05);
            border-radius: 12px;
            padding: 12px 14px;
        }

        /* Step badge */
        .step-num {
            width: 22px;
            height: 22px;
            border-radius: 7px;
            background: linear-gradient(135deg, rgba(139, 92, 246, 0.25), rgba(79, 70, 229, 0.2));
            border: 1px solid rgba(139, 92, 246, 0.3);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 10px;
            font-weight: 700;
            color: #a78bfa;
            flex-shrink: 0;
        }

        /* SEO box */
        .seo-box {
            background: rgba(255, 255, 255, 0.02);
            border: 1px solid rgba(255, 255, 255, 0.06);
            border-radius: 12px;
            padding: 14px 16px;
        }

        /* Status dot */
        .status-dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
        }

        @keyframes pulse {

            0%,
            100% {
                opacity: 1;
            }

            50% {
                opacity: 0.4;
            }
        }
    </style>

    <form action="{{ route('admin.addproduct') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="relative z-10 px-4 md:px-6 py-6 max-w-[1380px] mx-auto space-y-6 pb-24 overflow-y-auto h-screen">

            <!-- ═══════════════════════ PAGE HEADER ═══════════════════════ -->
            <div class="flex flex-col sm:flex-row sm:items-start sm:justify-between gap-4">
                <div>
                    <!-- Breadcrumb -->
                    <div class="flex items-center gap-1.5 mb-2.5">
                        <a href="#"
                            class="text-[11px] text-gray-600 hover:text-gray-400 transition-colors">Dashboard</a>
                        <svg width="9" height="9" viewBox="0 0 24 24" fill="none" class="text-gray-700">
                            <path d="M9 18l6-6-6-6" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                        </svg>
                        <a href="#"
                            class="text-[11px] text-gray-600 hover:text-gray-400 transition-colors">Products</a>
                        <svg width="9" height="9" viewBox="0 0 24 24" fill="none" class="text-gray-700">
                            <path d="M9 18l6-6-6-6" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                        </svg>
                        <span class="text-[11px] text-violet-400 font-medium">Add New</span>
                    </div>
                    <h1 class="font-display text-2xl md:text-[28px] font-bold grad-text leading-tight">Add New Product</h1>
                    <p class="text-sm text-gray-500 mt-1">Manage product details, pricing, and inventory settings.</p>
                </div>

            </div>

            <!-- ═══════════════════════ MAIN GRID ═══════════════════════ -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

                <!-- ─────────────────── LEFT / MAIN COLUMN ─────────────────── -->
                <div class="lg:col-span-2 space-y-6 mb-12">

                    <!-- 1. BASIC INFORMATION -->
                    <div class="glass p-5 md:p-6">
                        <div class="flex items-start gap-3 mb-4">
                            <div class="step-num">1</div>
                            <div class="flex-1 min-w-0">
                                <div class="card-head">Basic Information</div>
                                <div class="card-subhead">Name, slug, and product descriptions</div>
                            </div>
                            <div class="flex items-center gap-1.5 flex-shrink-0">
                                <div class="status-dot bg-emerald-400" style="box-shadow:0 0 8px #34d399;"></div>
                                <span class="text-[10px] text-emerald-400 font-semibold">Filling</span>
                            </div>
                        </div>
                        <hr class="dim mb-5">

                        <div class="space-y-4">
                            <!-- Product Name -->
                            <div>
                                <label class="lbl">Product Name <span class="text-rose-500">*</span></label>
                                <div class="inp-icon-wrap">
                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none"
                                        class="inp-prefix">
                                        <path d="M20 7H4a2 2 0 00-2 2v10a2 2 0 002 2h16a2 2 0 002-2V9a2 2 0 00-2-2z"
                                            stroke="currentColor" stroke-width="2" />
                                        <path d="M16 3H8l-2 4h12l-2-4z" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" />
                                    </svg>
                                    <input type="text" class="inp" name="product_name"
                                        placeholder="e.g. Obsidian Oversized Hoodie">
                                </div>
                            </div>
                            <!-- Slug -->
                            <div>
                                <label class="lbl">URL Slug</label>
                                <div class="inp-icon-wrap">
                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none"
                                        class="inp-prefix">
                                        <path d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.1-1.1"
                                            stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                                        <path d="M10.172 13.828a4 4 0 015.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"
                                            stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                                    </svg>
                                    <input type="text" class="inp" name="slug"
                                        placeholder="obsidian-oversized-hoodie"
                                        style="font-family:'DM Mono',monospace;font-size:12px;letter-spacing:0.02em;">
                                </div>
                                <p class="text-[11px] text-gray-600 mt-1.5">nexus.store/products/<span
                                        class="text-violet-400/70 font-mono text-[11px]">obsidian-oversized-hoodie</span>
                                </p>
                            </div>
                            <!-- Short Description -->
                            <div>
                                <label class="lbl">Short Description</label>
                                <textarea class="inp resize-none" rows="2" name="short_description"
                                    placeholder="Brief product summary shown in category listings…"></textarea>
                            </div>
                            <!-- Full Description with toolbar -->
                            <div>
                                <label class="lbl">Full Description</label>
                                <div style="border:1px solid rgba(255,255,255,0.08);border-radius:10px;overflow:hidden;">
                                    <div
                                        style="background:rgba(255,255,255,0.03);border-bottom:1px solid rgba(255,255,255,0.06);padding:8px 12px;display:flex;gap:2px;align-items:center;flex-wrap:wrap;">
                                        <button
                                            class="px-2 py-1.5 rounded-md hover:bg-white/10 transition-colors text-gray-400 hover:text-white text-xs font-bold">B</button>
                                        <button
                                            class="px-2 py-1.5 rounded-md hover:bg-white/10 transition-colors text-gray-400 hover:text-white text-xs italic">I</button>
                                        <button
                                            class="px-2 py-1.5 rounded-md hover:bg-white/10 transition-colors text-gray-400 hover:text-white text-xs underline">U</button>
                                        <div style="width:1px;height:14px;background:rgba(255,255,255,0.08);margin:0 4px;">
                                        </div>
                                        <button
                                            class="p-1.5 rounded-md hover:bg-white/10 transition-colors text-gray-400 hover:text-white">
                                            <svg width="12" height="12" viewBox="0 0 24 24" fill="none">
                                                <path d="M8 6h13M8 12h13M8 18h13M3 6h.01M3 12h.01M3 18h.01"
                                                    stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                                            </svg>
                                        </button>
                                        <button
                                            class="p-1.5 rounded-md hover:bg-white/10 transition-colors text-gray-400 hover:text-white">
                                            <svg width="12" height="12" viewBox="0 0 24 24" fill="none">
                                                <path d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.1-1.1"
                                                    stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                                            </svg>
                                        </button>
                                        <button
                                            class="p-1.5 rounded-md hover:bg-white/10 transition-colors text-gray-400 hover:text-white">
                                            <svg width="12" height="12" viewBox="0 0 24 24" fill="none">
                                                <rect x="3" y="3" width="18" height="18" rx="2"
                                                    stroke="currentColor" stroke-width="2" />
                                                <circle cx="8.5" cy="8.5" r="1.5" fill="currentColor" />
                                                <path d="M21 15l-5-5L5 21" stroke="currentColor" stroke-width="2"
                                                    stroke-linecap="round" />
                                            </svg>
                                        </button>
                                        <div style="width:1px;height:14px;background:rgba(255,255,255,0.08);margin:0 4px;">
                                        </div>
                                        <button
                                            class="px-1.5 py-1 rounded-md hover:bg-white/10 transition-colors text-gray-400 hover:text-white text-[11px] font-mono">H1</button>
                                        <button
                                            class="px-1.5 py-1 rounded-md hover:bg-white/10 transition-colors text-gray-400 hover:text-white text-[11px] font-mono">H2</button>
                                        <button
                                            class="px-1.5 py-1 rounded-md hover:bg-white/10 transition-colors text-gray-400 hover:text-white text-[11px] font-mono">H3</button>
                                    </div>
                                    <textarea class="inp resize-none" rows="5" name="full_description"
                                        placeholder="Write a detailed product description with rich formatting…"
                                        style="border:none;border-radius:0;background:rgba(255,255,255,0.02);"></textarea>
                                </div>
                            </div>
                            <!-- Tags -->
                            <div>
                                <label class="lbl">Product Tags</label>
                                <div style="background:rgba(255,255,255,0.03);border:1px solid rgba(255,255,255,0.08);border-radius:10px;padding:8px 10px;display:flex;flex-wrap:wrap;gap:6px;align-items:center;min-height:44px;transition:all 0.2s;"
                                    onfocus="this.style.borderColor='rgba(139,92,246,0.45)'"
                                    onblur="this.style.borderColor='rgba(255,255,255,0.08)'">
                                    <div class="tag-chip">premium <span style="cursor: pointer">×</span></div>
                                    <div class="tag-chip">streetwear <span style="cursor: pointer">×</span></div>
                                    <div class="tag-chip">oversized <span style="cursor: pointer">×</span></div>
                                    <input type="text" name="product_tag" placeholder="Add tag & press Enter…"
                                        style="background:none;border:none;outline:none;color:#e2e8f0;font-size:12px;flex:1;min-width:80px;font-family:'DM Sans',sans-serif;"
                                        class="placeholder-gray-700">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- 2. PRODUCT IMAGES -->
                    <div class="glass p-5 md:p-6">
                        <div class="flex items-start gap-3 mb-4">
                            <div class="step-num">2</div>
                            <div>
                                <div class="card-head">Product Images</div>
                                <div class="card-subhead">High-quality images increase conversion by 40%</div>
                            </div>
                        </div>
                        <hr class="dim mb-5">

                        <!-- Drop zone -->
                        <div class="dropzone p-8 text-center mb-4"
                            ondragover="event.preventDefault();this.classList.add('drag')"
                            ondragleave="this.classList.remove('drag')"
                            ondrop="event.preventDefault();this.classList.remove('drag')">
                            <div class="flex flex-col items-center gap-3">
                                <div class="w-12 h-12 rounded-xl flex items-center justify-center"
                                    style="background:rgba(139,92,246,0.1);border:1px solid rgba(139,92,246,0.2);">
                                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none"
                                        class="text-violet-400">
                                        <path
                                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"
                                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-300 font-medium">Drag & drop images here</p>
                                    <p class="text-xs text-gray-600 mt-0.5">or <span
                                            class="text-violet-400 cursor-pointer hover:text-violet-300 transition-colors">browse
                                            from device</span></p>
                                </div>
                                <div class="flex items-center gap-2 text-[11px] text-gray-600 flex-wrap justify-center">
                                    <span>PNG, JPG, WEBP</span><span>·</span><span>Max 8MB each</span><span>·</span><span>Up
                                        to 12 images</span>
                                </div>
                            </div>
                        </div>

                        <!-- Preview grid -->
                        <div class="grid grid-cols-4 sm:grid-cols-6 gap-3">
                            <div class="thumb primary-badge sm:col-span-2 sm:row-span-2" style="min-height:100px;">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    class="text-violet-400/30">
                                    <path
                                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"
                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                                <div class="thumb-overlay rounded-xl">
                                    <button class="text-white hover:text-violet-300 transition-colors p-1">
                                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none">
                                            <path
                                                d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"
                                                stroke="currentColor" stroke-width="2" />
                                        </svg>
                                    </button>
                                    <button class="text-white hover:text-rose-400 transition-colors p-1">
                                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none">
                                            <path
                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"
                                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                            <div class="thumb"><svg width="14" height="14" viewBox="0 0 24 24" fill="none"
                                    class="text-gray-700">
                                    <path
                                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"
                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                                <div class="thumb-overlay rounded-xl"><button
                                        class="text-white hover:text-rose-400 transition-colors p-1"><svg width="13"
                                            height="13" viewBox="0 0 24 24" fill="none">
                                            <path
                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"
                                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </svg></button></div>
                            </div>
                            <div class="thumb"><svg width="14" height="14" viewBox="0 0 24 24" fill="none"
                                    class="text-gray-700">
                                    <path
                                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"
                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                                <div class="thumb-overlay rounded-xl"><button
                                        class="text-white hover:text-rose-400 transition-colors p-1"><svg width="13"
                                            height="13" viewBox="0 0 24 24" fill="none">
                                            <path
                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"
                                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </svg></button></div>
                            </div>
                            <div class="thumb"><svg width="14" height="14" viewBox="0 0 24 24" fill="none"
                                    class="text-gray-700">
                                    <path
                                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"
                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                                <div class="thumb-overlay rounded-xl"><button
                                        class="text-white hover:text-rose-400 transition-colors p-1"><svg width="13"
                                            height="13" viewBox="0 0 24 24" fill="none">
                                            <path
                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"
                                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </svg></button></div>
                            </div>
                            <div class="thumb"><svg width="14" height="14" viewBox="0 0 24 24" fill="none"
                                    class="text-gray-700">
                                    <path
                                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"
                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                                <div class="thumb-overlay rounded-xl"><button
                                        class="text-white hover:text-rose-400 transition-colors p-1"><svg width="13"
                                            height="13" viewBox="0 0 24 24" fill="none">
                                            <path
                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"
                                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </svg></button></div>
                            </div>
                            <!-- Add more -->
                            <div class="thumb cursor-pointer" style="border:1px dashed rgba(255,255,255,0.1);"
                                onclick="">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none"
                                    class="text-gray-600">
                                    <path d="M12 5v14M5 12h14" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" />
                                </svg>
                            </div>
                        </div>
                        <p class="text-[11px] text-gray-600 mt-3">Drag to reorder · Click ★ to set as main · First image
                            shown in listings</p>
                    </div>

                    <!-- 3. PRICING -->
                    <div class="glass p-5 md:p-6">
                        <div class="flex items-start gap-3 mb-4">
                            <div class="step-num">3</div>
                            <div>
                                <div class="card-head">Pricing</div>
                                <div class="card-subhead">Set regular, sale, and cost prices with tax</div>
                            </div>
                        </div>
                        <hr class="dim mb-5">

                        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-5">
                            <div>
                                <label class="lbl">Regular Price <span class="text-rose-500">*</span></label>
                                <div class="inp-icon-wrap">
                                    <span class="inp-prefix font-mono text-xs">$</span>
                                    <input type="number" name="regular_price" class="inp" placeholder="0.00"
                                        min="0" step="0.01">
                                </div>
                            </div>
                            <div>
                                <label class="lbl">Sale Price</label>
                                <div class="inp-icon-wrap">
                                    <span class="inp-prefix font-mono text-xs">$</span>
                                    <input type="number" name="sale_price" class="inp" placeholder="0.00"
                                        min="0" step="0.01"
                                        style="border-color:rgba(245,158,11,0.25);background:rgba(245,158,11,0.03);">
                                </div>
                            </div>
                            <div>
                                <label class="lbl">Cost Price</label>
                                <div class="inp-icon-wrap">
                                    <span class="inp-prefix font-mono text-xs">$</span>
                                    <input type="number" name="cost_price" class="inp" placeholder="0.00"
                                        min="0" step="0.01">
                                </div>
                            </div>
                            <div>
                                <label class="lbl">Tax Rate</label>
                                <div style="position:relative;">
                                    <input type="number" name="tax_rate" class="inp" placeholder="18"
                                        min="0" max="100" style="padding-right:32px;">
                                    <span
                                        style="position:absolute;right:12px;top:50%;transform:translateY(-50%);color:rgba(255,255,255,0.2);font-size:11px;font-family:'DM Mono',monospace;pointer-events:none;">%</span>
                                </div>
                            </div>
                        </div>

                        <!-- Profit calculators -->
                        <div class="grid grid-cols-3 gap-3">
                            <div class="mini-stat">
                                <div class="text-[10px] text-gray-600 uppercase tracking-widest mb-1.5">Profit Margin</div>
                                <div class="text-xl font-display font-bold text-emerald-400">—</div>
                            </div>
                            <div class="mini-stat">
                                <div class="text-[10px] text-gray-600 uppercase tracking-widest mb-1.5">Profit / Unit</div>
                                <div class="text-xl font-display font-bold text-white">—</div>
                            </div>
                            <div class="mini-stat">
                                <div class="text-[10px] text-gray-600 uppercase tracking-widest mb-1.5">Tax Amount</div>
                                <div class="text-xl font-display font-bold text-amber-400">—</div>
                            </div>
                        </div>
                    </div>

                    <!-- 4. ATTRIBUTES -->
                    <div class="glass p-5 md:p-6">
                        <div class="flex items-start gap-3 mb-4">
                            <div class="step-num">4</div>
                            <div>
                                <div class="card-head">Product Attributes</div>
                                <div class="card-subhead">Sizes, colors, weight, and dimensions</div>
                            </div>
                        </div>
                        <hr class="dim mb-5">

                        <!-- Sizes -->
                        <div class="mb-5">
                            <label class="lbl">Available Sizes</label>
                            <div class="flex flex-wrap gap-2">
                                <label class="size-pill">
                                    <input type="checkbox" name="sizes[]" value="M" hidden>
                                    M
                                </label>

                                <div class="size-pill" onclick="togglePill(this)">XS</div>
                                <div class="size-pill selected" onclick="togglePill(this)">S</div>
                                <div class="size-pill selected" onclick="togglePill(this)">M</div>
                                <div class="size-pill selected" onclick="togglePill(this)">L</div>
                                <div class="size-pill" onclick="togglePill(this)">XL</div>
                                <div class="size-pill" onclick="togglePill(this)">XXL</div>
                                <div class="size-pill" onclick="togglePill(this)">3XL</div>
                                {{-- <button class="size-pill" style="border-style:dashed;opacity:0.45;">+ Custom</button> --}}
                            </div>
                        </div>

                        <!-- Colors -->
                        <div class="mb-5">
                            <label class="lbl">Available Colors</label>
                            <div class="flex items-center gap-2.5 flex-wrap">
                                <div class="color-swatch selected" style="background:#111827;" title="Void Black"></div>
                                <div class="color-swatch" style="background:#2d1b69;" title="Deep Violet"></div>
                                <div class="color-swatch" style="background:#0c4a6e;" title="Midnight Blue"></div>
                                <div class="color-swatch" style="background:#14532d;" title="Forest Green"></div>
                                <div class="color-swatch" style="background:#78350f;" title="Amber Brown"></div>
                                <div class="color-swatch" style="background:#7f1d1d;" title="Crimson"></div>
                                <div class="color-swatch"
                                    style="background:#e2e8f0;border:1px solid rgba(255,255,255,0.15);"
                                    title="Ghost White"></div>
                                {{-- <button
                                    class="w-7 h-7 rounded-lg flex items-center justify-center transition-all hover:scale-110 flex-shrink-0"
                                    style="border:1px dashed rgba(255,255,255,0.15);background:rgba(255,255,255,0.03);">
                                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none"
                                        class="text-gray-600">
                                        <path d="M12 5v14M5 12h14" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" />
                                    </svg>
                                </button> --}}
                            </div>
                        </div>

                        <!-- Physical dimensions -->
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                            <div>
                                <label class="lbl">Weight</label>
                                <div style="position:relative;">
                                    <input type="number" name="weight" class="inp" placeholder="0.0"
                                        step="0.1" style="padding-right:36px;">
                                    <span
                                        style="position:absolute;right:12px;top:50%;transform:translateY(-50%);color:rgba(255,255,255,0.2);font-size:11px;font-family:'DM Mono',monospace;pointer-events:none;">kg</span>
                                </div>
                            </div>
                            <div>
                                <label class="lbl">Length (L)</label>
                                <div style="position:relative;">
                                    <input type="number" name="length" class="inp" placeholder="0"
                                        style="padding-right:36px;">
                                    <span
                                        style="position:absolute;right:12px;top:50%;transform:translateY(-50%);color:rgba(255,255,255,0.2);font-size:11px;font-family:'DM Mono',monospace;pointer-events:none;">cm</span>
                                </div>
                            </div>
                            <div>
                                <label class="lbl">Width (W)</label>
                                <div style="position:relative;">
                                    <input type="number" name="width" class="inp" placeholder="0"
                                        style="padding-right:36px;">
                                    <span
                                        style="position:absolute;right:12px;top:50%;transform:translateY(-50%);color:rgba(255,255,255,0.2);font-size:11px;font-family:'DM Mono',monospace;pointer-events:none;">cm</span>
                                </div>
                            </div>
                            <div>
                                <label class="lbl">Height (H)</label>
                                <div style="position:relative;">
                                    <input type="number" class="inp" name="height" placeholder="0"
                                        style="padding-right:36px;">
                                    <span
                                        style="position:absolute;right:12px;top:50%;transform:translateY(-50%);color:rgba(255,255,255,0.2);font-size:11px;font-family:'DM Mono',monospace;pointer-events:none;">cm</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- 5. SEO -->
                    <div class="glass  p-5 md:p-6">
                        <div class="flex items-start gap-3 mb-4">
                            <div class="step-num">5</div>
                            <div class="flex-1 min-w-0">
                                <div class="card-head">SEO & Meta</div>
                                <div class="card-subhead">Optimise for search engine visibility</div>
                            </div>
                            <span class="flex-shrink-0 text-[10px] px-2 py-0.5 rounded-full font-semibold"
                                style="background:rgba(245,158,11,0.12);color:#fbbf24;border:1px solid rgba(245,158,11,0.2);">Optional</span>
                        </div>
                        <hr class="dim mb-5">
                        <div class="space-y-4">
                            <div>
                                <label class="lbl">Meta Title</label>
                                <input type="text" class="inp" name="meta_title"
                                    placeholder="SEO friendly page title…">
                                <p class="text-[11px] text-gray-600 mt-1">0 / 60 characters</p>
                            </div>
                            <div>
                                <label class="lbl">Meta Description</label>
                                <textarea class="inp resize-none" name="meta_description" rows="2"
                                    placeholder="Brief description shown in search results…"></textarea>
                                <p class="text-[11px] text-gray-600 mt-1">0 / 160 characters</p>
                            </div>
                            {{-- <div>
                                <label class="lbl">Search Result Preview</label>
                                <div class="seo-box">
                                    <div class="text-[11px] text-green-500 font-mono mb-0.5">nexus.store › products ›
                                        obsidian-oversized-hoodie</div>
                                    <div class="text-sm text-blue-400 font-medium mb-1 hover:underline cursor-pointer">
                                        Obsidian Oversized Hoodie — NEXUS Store</div>
                                    <div class="text-xs text-gray-500 leading-relaxed">Your meta description will appear
                                        here. Keep it under 160 characters for best display results in search engines like
                                        Google.</div>
                                </div>
                            </div> --}}
                        </div>
                    </div>

                </div><!-- /left col -->

                <!-- ─────────────────── RIGHT SIDEBAR COLUMN ─────────────────── -->
                <div class="space-y-6">

                    <!-- PUBLISH -->
                    <div class="glass p-5">
                        <div class="card-head mb-0.5">Publish Settings</div>
                        <div class="card-subhead mb-4">Visibility and listing control</div>
                        <hr class="dim mb-4">

                        <div class="space-y-4 mb-4">
                            <div class="flex items-center justify-between">
                                <div>
                                    <div class="text-sm font-medium text-gray-300">Active Status</div>
                                    <div class="text-[11px] text-gray-600">Visible in storefront</div>
                                </div>
                                <div class="toggle-track on" onclick="toggleSwitch(this)">
                                    <div class="toggle-thumb"></div>
                                </div>
                            </div>
                            <div class="flex items-center justify-between">
                                <div>
                                    <div class="text-sm font-medium text-gray-300">Featured Product</div>
                                    <div class="text-[11px] text-gray-600">Show on homepage hero</div>
                                </div>
                                <div class="toggle-track" onclick="toggleSwitch(this)">
                                    <div class="toggle-thumb"></div>
                                </div>
                            </div>
                            <div class="flex items-center justify-between">
                                <div>
                                    <div class="text-sm font-medium text-gray-300">New Arrival Badge</div>
                                    <div class="text-[11px] text-gray-600">Display "New" label</div>
                                </div>
                                <div class="toggle-track" onclick="toggleSwitch(this)">
                                    <div class="toggle-thumb"></div>
                                </div>
                            </div>
                        </div>
                        <hr class="dim mb-4">
                        <div class="space-y-3 mb-5">
                            <div>
                                <label class="lbl">Publish Date</label>
                                <input type="datetime-local" name="publish_date" class="inp"
                                    style="color-scheme:dark;">
                            </div>
                            <div>
                                <label class="lbl">Visibility</label>
                                <select class="sel" name="visibility">
                                    <option>Public — Everyone</option>
                                    <option>Private — Hidden</option>
                                    <option>Password Protected</option>
                                </select>
                            </div>
                        </div>

                    </div>

                    <!-- CATEGORY & BRAND -->
                    <div class="glass p-5">
                        <div class="card-head mb-0.5">Category & Brand</div>
                        <div class="card-subhead mb-4">Organise product hierarchy</div>
                        <hr class="dim mb-4">
                        <div class="space-y-3">
                            <div>
                                <label class="lbl">Category <span class="text-rose-500">*</span></label>
                                <select class="sel" name="category">
                                    <option disabled selected>Select category</option>
                                    @foreach ($categogys as $categogy)
                                        <option value="{{ $categogy->id }}">{{ $categogy->name }}</option>
                                    @endforeach

                                </select>
                            </div>
                            <div>
                                <label class="lbl">Subcategory</label>
                                <select class="sel" name="subcategory">
                                    <option disabled selected>Select subcategory</option>

                                    <option> dd</option>

                                </select>
                            </div>
                            <div>
                                <label class="lbl">Brand</label>
                                <select class="sel" name="brand">
                                    <option disabled selected>Select brand</option>
                                    @foreach ($brands as $brand)
                                        <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                    @endforeach

                                </select>
                            </div>
                            <div>
                                <label class="lbl">Product Type</label>
                                <select class="sel" name="product_type">
                                    @foreach ($products as $product)
                                        <option value="{{ $product->id }}">{{ $product->type }}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- INVENTORY -->
                    <div class="glass p-5">
                        <div class="card-head mb-0.5">Inventory</div>
                        <div class="card-subhead mb-4">Stock and availability management</div>
                        <hr class="dim mb-4">
                        <div class="space-y-3 mb-4">
                            <div>
                                <label class="lbl">SKU <span class="text-rose-500">*</span></label>
                                <input type="text" name="sku" class="inp" placeholder="OBH-M-BLK-001"
                                    style="font-family:'DM Mono',monospace;font-size:12px;letter-spacing:0.04em;">
                            </div>
                            <div>
                                <label class="lbl">Barcode / UPC</label>
                                <input type="text" name="barcode" class="inp" placeholder="012345678901"
                                    style="font-family:'DM Mono',monospace;font-size:12px;">
                            </div>
                            <div class="grid grid-cols-2 gap-3">
                                <div>
                                    <label class="lbl">Qty In Stock</label>
                                    <input type="number" class="inp" name="qty_stock" placeholder="0"
                                        min="0">
                                </div>
                                <div>
                                    <label class="lbl">Low Stock Alert</label>
                                    <input type="number" class="inp" name="low_stock_alert" placeholder="10"
                                        min="0">
                                </div>
                            </div>
                            <!-- Stock status tabs -->
                            <div>
                                <label class="lbl">Stock Status</label>
                                <div id="stockStatus" class="flex rounded-xl overflow-hidden">

                                    <label class="flex-1 text-center py-2 cursor-pointer">
                                        <input type="radio" name="stock_status" value="in" hidden
                                            onchange="setStockUI(this)">
                                        <span class="stock-btn">In Stock</span>
                                    </label>

                                    <label class="flex-1 text-center py-2 cursor-pointer">
                                        <input type="radio" name="stock_status" value="low" hidden
                                            onchange="setStockUI(this)">
                                        <span class="stock-btn">Low Stock</span>
                                    </label>

                                    <label class="flex-1 text-center py-2 cursor-pointer">
                                        <input type="radio" name="stock_status" value="out" hidden
                                            onchange="setStockUI(this)">
                                        <span class="stock-btn">Out of Stock</span>
                                    </label>

                                </div>
                            </div>
                        </div>
                        <!-- Toggles -->
                        <div class="space-y-3 mb-4">
                            <div class="flex items-center justify-between">
                                <div>
                                    <div class="text-sm font-medium text-gray-300">Track Inventory</div>
                                    <div class="text-[11px] text-gray-600">Auto-reduce on orders</div>
                                </div>
                                <div class="toggle-track on" onclick="toggleSwitch(this)">
                                    <div class="toggle-thumb"></div>
                                </div>
                            </div>
                            <div class="flex items-center justify-between">
                                <div>
                                    <div class="text-sm font-medium text-gray-300">Allow Backorders</div>
                                    <div class="text-[11px] text-gray-600">Sell when out of stock</div>
                                </div>
                                <div class="toggle-track" onclick="toggleSwitch(this)">
                                    <div class="toggle-thumb"></div>
                                </div>
                            </div>
                        </div>
                        <!-- Level bar -->
                        <div class="mini-stat">
                            <div class="flex justify-between mb-2">
                                <span class="text-[10px] text-gray-600">Stock Level</span>
                                <span class="text-[10px] text-emerald-400 font-semibold font-mono">100%</span>
                            </div>
                            <div style="background:rgba(255,255,255,0.06);border-radius:99px;height:5px;overflow:hidden;">
                                <div class="prog-fill" style="width:100%;height:100%;"></div>
                            </div>
                        </div>
                    </div>

                    <!-- SHIPPING -->
                    <div class="glass p-5">
                        <div class="card-head mb-0.5">Shipping</div>
                        <div class="card-subhead mb-4">Delivery configuration</div>
                        <hr class="dim mb-4">
                        <div class="space-y-3">
                            <div>
                                <label class="lbl">Shipping Class</label>
                                <select class="sel" name="shipping_class">
                                    <option>Standard Shipping</option>
                                    <option>Express Shipping</option>
                                    <option>Free Shipping</option>
                                    <option>Heavy / Oversized</option>
                                </select>
                            </div>
                            <div>
                                <label class="lbl">Country of Origin</label>
                                <select class="sel" class="country_origin">
                                    <option>United States</option>
                                    <option>United Kingdom</option>
                                    <option>Germany</option>
                                    <option>China</option>
                                    <option>Japan</option>
                                    <option>India</option>
                                </select>
                            </div>
                            <div class="flex items-center justify-between">
                                <div>
                                    <div class="text-sm font-medium text-gray-300">Free Shipping</div>
                                    <div class="text-[11px] text-gray-600">Override cost to $0</div>
                                </div>
                                <div class="toggle-track" onclick="toggleSwitch(this)">
                                    <div class="toggle-thumb"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- LISTING SCORE -->
                    <div class="glass p-5"
                        style="background:linear-gradient(135deg,rgba(109,40,217,0.1),rgba(6,182,212,0.05));border-color:rgba(139,92,246,0.2);">
                        <div class="flex items-center justify-between mb-3">
                            <div class="card-head text-sm">Listing Score</div>
                            <span class="text-xl font-display font-bold grad-text" id="scoreVal">62%</span>
                        </div>
                        <div style="background:rgba(255,255,255,0.06);border-radius:99px;height:6px;overflow:hidden;"
                            class="mb-4">
                            <div class="prog-fill" style="width:62%;height:100%;"></div>
                        </div>
                        <div class="space-y-2">
                            <div class="flex items-center gap-2 text-[11px]">
                                <svg width="12" height="12" viewBox="0 0 24 24" fill="none"
                                    class="text-emerald-400 flex-shrink-0">
                                    <path d="M5 13l4 4L19 7" stroke="currentColor" stroke-width="2.5"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <span class="text-gray-400">Product name provided</span>
                            </div>
                            <div class="flex items-center gap-2 text-[11px]">
                                <svg width="12" height="12" viewBox="0 0 24 24" fill="none"
                                    class="text-emerald-400 flex-shrink-0">
                                    <path d="M5 13l4 4L19 7" stroke="currentColor" stroke-width="2.5"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <span class="text-gray-400">Category selected</span>
                            </div>
                            <div class="flex items-center gap-2 text-[11px]">
                                <svg width="12" height="12" viewBox="0 0 24 24" fill="none"
                                    class="text-emerald-400 flex-shrink-0">
                                    <path d="M5 13l4 4L19 7" stroke="currentColor" stroke-width="2.5"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <span class="text-gray-400">Attributes configured</span>
                            </div>
                            <div class="flex items-center gap-2 text-[11px]">
                                <svg width="12" height="12" viewBox="0 0 24 24" fill="none"
                                    class="text-amber-400 flex-shrink-0">
                                    <circle cx="12" cy="12" r="10" stroke="currentColor"
                                        stroke-width="2" />
                                    <path d="M12 8v4M12 16h.01" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" />
                                </svg>
                                <span class="text-gray-500">Add at least 3 images</span>
                            </div>
                            <div class="flex items-center gap-2 text-[11px]">
                                <svg width="12" height="12" viewBox="0 0 24 24" fill="none"
                                    class="text-amber-400 flex-shrink-0">
                                    <circle cx="12" cy="12" r="10" stroke="currentColor"
                                        stroke-width="2" />
                                    <path d="M12 8v4M12 16h.01" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" />
                                </svg>
                                <span class="text-gray-500">Set pricing details</span>
                            </div>
                            <div class="flex items-center gap-2 text-[11px]">
                                <svg width="12" height="12" viewBox="0 0 24 24" fill="none"
                                    class="text-gray-700 flex-shrink-0">
                                    <circle cx="12" cy="12" r="10" stroke="currentColor"
                                        stroke-width="2" />
                                </svg>
                                <span class="text-gray-600">Add SEO metadata</span>
                            </div>
                        </div>
                    </div>

                </div><!-- /right col -->
            </div><!-- /main grid -->
        </div>

        <!-- ══ STICKY BOTTOM BAR ══ -->
        <div class="fixed bottom-0 left-0 right-0 z-50"
            style="background:rgba(8,12,18,0.94);backdrop-filter:blur(20px);-webkit-backdrop-filter:blur(20px);border-top:1px solid rgba(255,255,255,0.04);">
            <div class="max-w-[1380px] mx-auto flex items-center gap-3 px-4 md:px-6 py-3">
                <div class="flex items-center gap-2 mr-auto">
                    <div class="status-dot bg-violet-500 flex-shrink-0"
                        style="box-shadow:0 0 8px rgba(139,92,246,0.8);animation:pulse 2s ease-in-out infinite;"></div>
                    <span class="text-xs text-gray-500">Unsaved changes</span>
                </div>
                <button class="btn-danger-ghost text-xs py-2 px-3 hidden sm:flex">Discard</button>
                <button class="btn-ghost text-xs py-2 px-4">Save Draft</button>
                <button
                    class="btn-primary hidden sm:flex items-center gap-1.5 px-3 py-2 rounded-xl text-xs font-semibold text-white">
                    <svg width="13" height="13" viewBox="0 0 24 24" fill="none">
                        <path d="M5 13l4 4L19 7" stroke="white" stroke-width="2.5" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>
                    Publish Product
                </button>
            </div>
        </div>
    </form>

    <script>
        function setStockUI(input) {
            const labels = document.querySelectorAll('#stockStatus label span');

            labels.forEach(el => {
                el.style.background = '';
                el.style.color = 'rgba(255,255,255,0.25)';
            });

            const styles = {
                in: ['rgba(16,185,129,0.15)', '#34d399'],
                low: ['rgba(245,158,11,0.15)', '#fbbf24'],
                out: ['rgba(239,68,68,0.15)', '#f87171']
            };

            const span = input.nextElementSibling;
            span.style.background = styles[input.value][0];
            span.style.color = styles[input.value][1];
        }

        function toggleSwitch(el) {
            el.classList.toggle('on');
        }

        function togglePill(el) {
            el.classList.toggle('selected');
        }

        function setStock(btn, state) {
            const btns = document.getElementById('stockStatus').querySelectorAll('button');
            btns.forEach(b => {
                b.style.background = '';
                b.style.color = 'rgba(255,255,255,0.25)';
            });
            const styles = {
                in: ['rgba(16,185,129,0.15)', '#34d399'],
                low: ['rgba(245,158,11,0.15)', '#fbbf24'],
                out: ['rgba(239,68,68,0.15)', '#f87171']
            };
            btn.style.background = styles[state][0];
            btn.style.color = styles[state][1];
        }

        // Color swatch toggle
        document.querySelectorAll('.color-swatch').forEach(sw => {
            sw.addEventListener('click', function() {
                this.classList.toggle('selected');
            });
        });

        // Drag-over drop zone
        const dz = document.querySelector('.dropzone');
        if (dz) {
            ['dragenter', 'dragover'].forEach(e => dz.addEventListener(e, ev => {
                ev.preventDefault();
                dz.classList.add('drag');
            }));
            ['dragleave', 'drop'].forEach(e => dz.addEventListener(e, ev => {
                ev.preventDefault();
                dz.classList.remove('drag');
            }));
        }
    </script>
@endsection
