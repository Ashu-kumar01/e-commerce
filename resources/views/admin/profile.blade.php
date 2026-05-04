@extends('admin.layouts.app')
@section('content')
    <style>
        .toggle-input {
            display: none;
        }

        .toggle-input:checked+.tog .tog-thumb {
            left: calc(100% - 16px);
            background: #fff;
        }

        .toggle-input:checked+.tog {
            background: linear-gradient(90deg, #7c3aed, #4f46e5);
            border-color: rgba(139, 92, 246, 0.45);
            box-shadow: 0 0 10px rgba(124, 58, 237, 0.28);
        }

        :root {
            --ink: #7c3aed;
            --ink-2: #3F3F46;
            --ink-3: #71717A;
            --surface: #F7F6F2;
            --card: #FFFFFF;
            --border: rgba(0, 0, 0, 0.07);
            --accent: #18181B;
        }

        /* Cards */
        .card {
            background: var(--card);
            border: 1px solid var(--border);
            border-radius: 20px;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.04), 0 4px 16px rgba(0, 0, 0, 0.03);
            transition: box-shadow 0.25s ease;
        }

        .card:hover {
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.06), 0 8px 28px rgba(0, 0, 0, 0.05);
        }

        /* Section heading */
        .sec-head {

            font-size: 17px;
            font-weight: 400;
            color: var(--ink);
            letter-spacing: -0.02em;
        }

        /* Labels */
        .lbl {
            display: block;
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.07em;
            color: var(--ink-3);
            margin-bottom: 6px;
        }

        /* Inputs */
        .field {
            width: 100%;
            background: #FAFAF9;
            border: 1.5px solid rgba(0, 0, 0, 0.09);
            border-radius: 12px;
            color: #000;
            font-size: 13.5px;
            font-family: 'DM Sans', sans-serif;
            padding: 11px 14px;
            outline: none;
            transition: all 0.2s;
            -webkit-appearance: none;
        }

        .field::placeholder {
            color: rgba(0, 0, 0, 0.22);
        }

        .field:focus {
            background: #fff;
            border-color: var(--ink);
            box-shadow: 0 0 0 3px rgba(24, 24, 27, 0.07);
        }

        .field:hover:not(:focus) {
            border-color: rgba(0, 0, 0, 0.18);
        }

        /* Select */
        .sel {
            width: 100%;
            background: #FAFAF9;
            border: 1.5px solid rgba(0, 0, 0, 0.09);
            border-radius: 12px;
            color: var(--ink);
            font-size: 13.5px;
            font-family: 'DM Sans', sans-serif;
            padding: 11px 36px 11px 14px;
            outline: none;
            appearance: none;
            cursor: pointer;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 24 24' fill='none' stroke='rgba(0,0,0,0.3)' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpolyline points='6 9 12 15 18 9'%3E%3C/polyline%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 14px center;
            transition: all 0.2s;
        }

        .sel:focus {
            background-color: #fff;
            border-color: var(--ink);
            box-shadow: 0 0 0 3px rgba(24, 24, 27, 0.07);
        }

        .sel option {
            background: #fff;
            color: var(--ink);
        }

        /* Textarea */
        textarea.field {
            resize: none;
            line-height: 1.6;
        }

        /* Prefix icon wrapper */
        .field-wrap {
            position: relative;
        }

        .field-wrap .field {
            padding-left: 40px;
        }

        .field-icon {
            position: absolute;
            left: 13px;
            top: 50%;
            transform: translateY(-50%);
            color: rgba(0, 0, 0, 0.28);
            pointer-events: none;
        }


        .btn-outline {
            background: transparent;
            color: var(--ink-2);
            border: 1.5px solid rgba(0, 0, 0, 0.11);
            border-radius: 12px;
            padding: 11px 22px;
            font-size: 13.5px;
            font-weight: 500;
            font-family: 'DM Sans', sans-serif;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 7px;
            transition: all 0.2s;
        }

        .btn-outline:hover {
            border-color: rgba(0, 0, 0, 0.22);
            color: var(--ink);
        }

        .btn-danger {
            background: #FEF2F2;
            color: #DC2626;
            border: 1.5px solid #FECACA;
            border-radius: 12px;
            padding: 11px 22px;
            font-size: 13.5px;
            font-weight: 600;
            font-family: 'DM Sans', sans-serif;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 7px;
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

        /* Avatar upload */
        .avatar-wrap {
            position: relative;
            display: inline-block;
        }

        .avatar-overlay {
            position: absolute;
            inset: 0;
            border-radius: 50%;
            background: rgba(0, 0, 0, 0.55);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: opacity 0.22s;
            cursor: pointer;
            gap: 4px;
        }

        .avatar-wrap:hover .avatar-overlay {
            opacity: 1;
        }

        /* Toggle */
        .tog {
            width: 42px;
            height: 24px;
            border-radius: 99px;
            background: rgba(0, 0, 0, 0.1);
            border: 1.5px solid rgba(0, 0, 0, 0.1);
            position: relative;
            cursor: pointer;
            transition: all 0.25s;
            flex-shrink: 0;
        }

        .tog.on {
            background: var(--ink);
            border-color: var(--ink);
        }

        .tog-thumb {
            width: 16px;
            height: 16px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.6);
            position: absolute;
            top: 2px;
            left: 2px;
            transition: all 0.25s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .tog.on .tog-thumb {
            left: calc(100% - 18px);
            background: #fff;
        }

        /* Divider */
        .dim {
            border: none;
            border-top: 1px solid rgba(0, 0, 0, 0.06);
        }

        /* Password strength */
        .strength-bar {
            height: 3px;
            border-radius: 99px;
            flex: 1;
            background: rgba(0, 0, 0, 0.08);
            transition: background 0.3s;
        }

        /* Badge */
        .role-badge {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            padding: 4px 11px;
            border-radius: 99px;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 0.04em;
        }

        /* Tab nav */
        .tab-btn {
            padding: 8px 14px;
            border-radius: 10px;
            font-size: 13px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.18s;
            color: rgba(255, 255, 255, 0.929);
            background: transparent;
            border: none;
            white-space: nowrap;
        }

        .tab-btn.active {
            background: var(--ink);
            color: #fff;
            font-weight: 600;
        }

        .tab-btn:not(.active):hover {
            background: rgba(0, 0, 0, 0.05);
            color: var(--ink);
        }

        /* Tab panel */
        .tab-panel {
            display: none;
        }

        .tab-panel.active {
            display: block;
        }

        /* Stat pill */
        .stat-pill {
            background: #FAFAF9;
            border: 1px solid rgba(0, 0, 0, 0.07);
            border-radius: 12px;
            padding: 12px 16px;
            text-align: center;
        }

        /* Info row */
        .info-row {
            display: flex;
            align-items: center;
            gap: 10px;
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

        .a1 {
            animation-delay: 0.04s;
        }

        .a2 {
            animation-delay: 0.09s;
        }

        .a3 {
            animation-delay: 0.14s;
        }

        .a4 {
            animation-delay: 0.18s;
        }

        .a5 {
            animation-delay: 0.22s;
        }

        .a6 {
            animation-delay: 0.26s;
        }

        /* Toast */
        #toast {
            position: fixed;
            bottom: 24px;
            left: 50%;
            transform: translateX(-50%) translateY(16px);
            opacity: 0;
            pointer-events: none;
            transition: all 0.28s cubic-bezier(0.4, 0, 0.2, 1);
            z-index: 9999;
        }

        #toast.show {
            opacity: 1;
            transform: translateX(-50%) translateY(0);
        }

        /* Completion ring */
        .ring-wrap {
            position: relative;
            width: 56px;
            height: 56px;
            flex-shrink: 0;
        }

        .ring-svg {
            transform: rotate(-90deg);
        }

        /* Focus ring visible */
        :focus-visible {
            outline: 2px solid rgba(24, 24, 27, 0.4);
            outline-offset: 2px;
        }
    </style>
    <!-- ══════════ MAIN CONTENT ══════════ -->
    <div class="relative z-10 px-4 sm:px-6 lg:px-8 py-7 pb-12 overflow-y-auto">

        <!-- ── PAGE HEADER ── -->
        <div class="anim a1 flex flex-col sm:flex-row sm:items-start sm:justify-between gap-4 mb-7">
            <div>
                <div class="flex items-center gap-1.5 mb-2 text-[11px]">
                    <a href="#" class="text-zinc-400 hover:text-zinc-600 transition-colors">Dashboard</a>
                    <svg width="9" height="9" viewBox="0 0 24 24" fill="none" class="text-zinc-300">
                        <path d="M9 18l6-6-6-6" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                    </svg>
                    <span class="text-zinc-600 font-medium">Profile Settings</span>
                </div>
                <h1 style="font-size:clamp(22px,3.5vw,30px);font-weight:400;letter-spacing:-0.03em;line-height:1.1;">
                    Profile Settings</h1>
                <p class="text-sm text-zinc-400 mt-1">Manage your personal information, security, and preferences.</p>
            </div>

        </div>

        <!-- ── TAB NAV ── -->
        <div class="anim a2 flex gap-1 overflow-x-auto pb-1 mb-6 no-scrollbar"
            style="-ms-overflow-style:none;scrollbar-width:none;">
            <button class="tab-btn active" onclick="switchTab(this,'profile')">
                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" class="inline mr-1.5 -mt-0.5">
                    <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2M12 11a4 4 0 100-8 4 4 0 000 8z" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" />
                </svg>
                Profile
            </button>
            <button class="tab-btn" onclick="switchTab(this,'security')">
                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" class="inline mr-1.5 -mt-0.5">
                    <rect x="3" y="11" width="18" height="11" rx="2" stroke="currentColor"
                        stroke-width="2" />
                    <path d="M7 11V7a5 5 0 0110 0v4" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                </svg>
                Security
            </button>
            <button class="tab-btn" onclick="switchTab(this,'notifications')">
                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" class="inline mr-1.5 -mt-0.5">
                    <path d="M18 8A6 6 0 006 8c0 7-3 9-3 9h18s-3-2-3-9M13.73 21a2 2 0 01-3.46 0" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" />
                </svg>
                Notifications
            </button>
            <button class="tab-btn" onclick="switchTab(this,'billing')">
                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" class="inline mr-1.5 -mt-0.5">
                    <rect x="1" y="4" width="22" height="16" rx="2" stroke="currentColor" stroke-width="2" />
                    <path d="M1 10h22" stroke="currentColor" stroke-width="2" />
                </svg>
                Billing
            </button>
        </div>
        <form action="{{ route('admin.profile.update') }}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="user_id" value="{{ $admin->id }}">
            <!-- ═══════ TAB: PROFILE ═══════ -->
            <div id="tab-profile" class="tab-panel active space-y-5">

                <!-- Profile overview + basic info split -->
                <div class="grid grid-cols-1 lg:grid-cols-[300px_1fr] gap-5">

                    <!-- ── PROFILE OVERVIEW CARD ── -->
                    <div class="anim a2 card p-6 flex flex-col items-center text-center h-fit">

                        <!-- Avatar -->
                        <div class="avatar-wrap mb-4" onclick="document.getElementById('avatarUpload').click()">
                            <div
                                style="width:96px;height:96px;border-radius:50%;background:linear-gradient(135deg,#7c3aed,#4f46e5);display:flex;align-items:center;justify-content:center;border:3px solid #fff;box-shadow:0 0 0 3px rgba(0,0,0,0.08);">
                                @if (optional($profile_details)->avatar)
                                    <img id="avatarImg" src="{{ asset('uploads/profile/' . $profile_details->avatar) }}"
                                        alt=""
                                        style="@if ($profile_details->avatar) display:block; @else display:none; @endif width:100%;height:100%;object-fit:cover;border-radius:50%;">
                                @else
                                    <span style="font-size:36px;font-weight:400;color:#fff;line-height:1;"
                                        id="avatarInitials">AR</span>
                                @endif


                            </div>
                            <div class="avatar-overlay">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" class="text-white">
                                    <path d="M23 19a2 2 0 01-2 2H3a2 2 0 01-2-2V8a2 2 0 012-2h4l2-3h6l2 3h4a2 2 0 012 2z"
                                        stroke="white" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <circle cx="12" cy="13" r="4" stroke="white" stroke-width="2" />
                                </svg>
                                <span style="font-size:10px;color:#fff;font-weight:600;">Change</span>
                            </div>
                        </div>
                        <input type="file" id="avatarUpload" class="hidden" name="image" accept="image/*"
                            onchange="previewAvatar(this)">

                        <div class="mb-1 flex items-center gap-2 justify-center flex-wrap">
                            <span style="font-size:18px;letter-spacing:-0.02em;color:#18181B;"
                                id="displayName">{{ Auth::user()->name }}</span>
                            <span class="role-badge"
                                style="background:#EDE9FE;color:#5B21B6;border:1px solid #DDD6FE;">Admin</span>
                        </div>
                        <p class="text-xs text-zinc-400 mb-1">@alex.rivera</p>
                        <p class="text-xs text-zinc-500 mb-5 leading-relaxed">Building great products at NEXUS Commerce</p>

                        <!-- Profile completion -->
                        <div class="w-full p-4 rounded-2xl mb-4"
                            style="background:#FAFAF9;border:1px solid rgba(0,0,0,0.06);">
                            <div class="flex items-center gap-3 mb-2">
                                <div class="ring-wrap">
                                    <svg class="ring-svg" width="56" height="56" viewBox="0 0 56 56">
                                        <circle cx="28" cy="28" r="22" fill="none"
                                            stroke="rgba(0,0,0,0.07)" stroke-width="5" />
                                        <circle cx="28" cy="28" r="22" fill="none" stroke="#18181B"
                                            stroke-width="5" stroke-dasharray="138.2" stroke-dashoffset="34.5"
                                            stroke-linecap="round" id="progressCircle" />
                                    </svg>
                                    <div
                                        style="position:absolute;inset:0;display:flex;align-items:center;justify-content:center;">
                                        <span style="font-size:11px;font-weight:700;color:#18181B;">75%</span>
                                    </div>
                                </div>
                                <div class="text-left">
                                    <div class="text-sm font-semibold text-zinc-800">Profile 75%</div>
                                    <div class="text-xs text-zinc-400">Add bio & location</div>
                                </div>
                            </div>
                            <div class="space-y-1.5 text-left">
                                <div class="flex items-center gap-2 text-xs">
                                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none"
                                        class="text-emerald-500">
                                        <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" />
                                    </svg>
                                    <span class="text-zinc-500">Name & email verified</span>
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none"
                                        class="text-emerald-500">
                                        <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" />
                                    </svg>
                                    <span class="text-zinc-500">Phone number added</span>
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none"
                                        class="text-amber-400">
                                        <circle cx="12" cy="12" r="10" stroke="currentColor"
                                            stroke-width="2" />
                                        <path d="M12 8v4M12 16h.01" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" />
                                    </svg>
                                    <span class="text-zinc-400">Add location info</span>
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none"
                                        class="text-zinc-300">
                                        <circle cx="12" cy="12" r="10" stroke="currentColor"
                                            stroke-width="2" />
                                    </svg>
                                    <span class="text-zinc-400">Enable 2-factor auth</span>
                                </div>
                            </div>
                        </div>

                        <!-- Stats -->
                        <div class="grid grid-cols-3 gap-2 w-full">
                            <div class="stat-pill">
                                <div class="text-sm font-bold text-zinc-900">14</div>
                                <div class="text-[10px] text-zinc-400">Orders</div>
                            </div>
                            <div class="stat-pill">
                                <div class="text-sm font-bold text-zinc-900">$2.8K</div>
                                <div class="text-[10px] text-zinc-400">Spent</div>
                            </div>
                            <div class="stat-pill">
                                <div class="text-sm font-bold text-zinc-900">4.9★</div>
                                <div class="text-[10px] text-zinc-400">Rating</div>
                            </div>
                        </div>

                        <hr class="dim w-full my-4">

                        <button class="btn-danger btn-sm w-full justify-center text-xs" onclick="confirmDelete()">
                            <svg width="12" height="12" viewBox="0 0 24 24" fill="none">
                                <path
                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                            Delete Account
                        </button>
                    </div>

                    <!-- ── BASIC INFORMATION ── -->
                    <div class="anim a3 card p-6">
                        <div class="flex items-center justify-between mb-5">
                            <div>
                                <h2 class="sec-head">Basic Information</h2>
                                <p class="text-xs text-zinc-400 mt-0.5">Your personal details visible to the team</p>
                            </div>
                        </div>
                        <hr class="dim mb-5">

                        <div class="space-y-4">
                            <!-- Name row -->
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <div>
                                    <label class="lbl">First Name</label>
                                    <div class="field-wrap">
                                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none"
                                            class="field-icon">
                                            <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2M12 11a4 4 0 100-8 4 4 0 000 8z"
                                                stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                                        </svg>
                                        <input type="text" name="first_name" class="field" placeholder="Alex"
                                            value="{{ old('first_name', optional($profile_details)->first_name) }}"
                                            @readonly(optional($profile_details)->first_name)>
                                    </div>
                                </div>
                                <div>
                                    <label class="lbl">Last Name</label>
                                    <input type="text" name="last_name" class="field" placeholder="Rivera"
                                        value="{{ old('last_name', optional($profile_details)->last_name) }}"
                                        @readonly(optional($profile_details)->last_name)>
                                </div>
                            </div>

                            <!-- Username -->
                            <div>
                                <label class="lbl">Username</label>
                                <div class="relative">
                                    <span
                                        style="position:absolute;left:14px;top:50%;transform:translateY(-50%);color:rgba(0,0,0,0.3);font-size:13px;font-family:'DM Mono',monospace;pointer-events:none;">@</span>
                                    <input type="text" class="field" name="username"
                                        style="padding-left:28px;font-size:13px;" placeholder="alex.rivera"
                                        value="{{ Auth::user()->name }}" @readonly(optional($profile_details)->username)>
                                </div>
                            </div>

                            <!-- Email & Phone -->
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <div>
                                    <label class="lbl">Email Address</label>
                                    <div class="field-wrap">
                                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none"
                                            class="field-icon">
                                            <path
                                                d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"
                                                stroke="currentColor" stroke-width="2" />
                                            <polyline points="22,6 12,13 2,6" stroke="currentColor" stroke-width="2" />
                                        </svg>
                                        <input type="email" name="email" class="field"
                                            placeholder="alex@example.com" value="{{ Auth::user()->email }}"
                                            @readonly(optional($profile_details)->email) />
                                    </div>
                                    <div class="flex items-center gap-1.5 mt-1.5">
                                        <svg width="10" height="10" viewBox="0 0 24 24" fill="none"
                                            class="text-emerald-500">
                                            <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" />
                                        </svg>
                                        <span class="text-[10.5px] text-emerald-600 font-medium">Verified</span>
                                    </div>
                                </div>
                                <div>
                                    <label class="lbl">Phone Number</label>
                                    <div class="field-wrap">
                                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none"
                                            class="field-icon">
                                            <path
                                                d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07A19.5 19.5 0 013.86 9.9 19.79 19.79 0 01.77 1.27 2 2 0 012.76 0h3a2 2 0 012 1.72 12.84 12.84 0 00.7 2.81 2 2 0 01-.45 2.11L6.91 7.91a16 16 0 006.09 6.09l1.27-1.27a2 2 0 012.11-.45 12.84 12.84 0 002.81.7A2 2 0 0122 14.92z"
                                                stroke="currentColor" stroke-width="2" />
                                        </svg>
                                        <input type="tel" name="phone" class="field"
                                            placeholder="+91 90000 00000"
                                            value="{{ old('phone', optional($profile_details)->phone) }}" />
                                    </div>
                                </div>
                            </div>

                            <!-- Date of Birth & Website -->
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <div>
                                    <label class="lbl">Date of Birth</label>
                                    <div class="field-wrap">
                                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none"
                                            class="field-icon">
                                            <rect x="3" y="4" width="18" height="18" rx="2"
                                                stroke="currentColor" stroke-width="2" />
                                            <path d="M16 2v4M8 2v4M3 10h18" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" />
                                        </svg>
                                        <input type="date" name="dob" class="field"
                                            value="{{ old('dob', optional($profile_details)->dob) }}"
                                            style="color-scheme:light;">
                                    </div>
                                </div>
                                <div>
                                    <label class="lbl">Website</label>
                                    <div class="field-wrap">
                                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none"
                                            class="field-icon">
                                            <circle cx="12" cy="12" r="10" stroke="currentColor"
                                                stroke-width="2" />
                                            <path
                                                d="M2 12h20M12 2a15.3 15.3 0 014 10 15.3 15.3 0 01-4 10 15.3 15.3 0 01-4-10 15.3 15.3 0 014-10z"
                                                stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                                        </svg>
                                        <input type="url" class="field" name="website"
                                            value="{{ old('website', optional($profile_details)->website) }}"
                                            placeholder="https://yoursite.com">
                                    </div>
                                </div>
                            </div>

                            <!-- Bio -->
                            <div>
                                <label class="lbl">Bio / Tagline</label>
                                <textarea class="field" rows="3" placeholder="Tell your team a little about yourself…" name="bio">{{ old('bio', optional($profile_details)->bio) }}</textarea>
                                <p class="text-[11px] text-zinc-400 mt-1.5 text-right"><span id="word">0</span> / 160
                                    characters</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ── ADDRESS INFORMATION ── -->
                <div class="anim a4 card p-6">
                    <div class="flex items-center justify-between mb-5">
                        <div>
                            <h2 class="sec-head">Address Information</h2>
                            <p class="text-xs text-zinc-400 mt-0.5">Used for shipping and billing purposes</p>
                        </div>
                        <button class="btn-outline btn-sm text-xs hidden sm:flex"
                            onclick="showToast('Location auto-filled','success')">
                            <svg width="12" height="12" viewBox="0 0 24 24" fill="none">
                                <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z" stroke="currentColor"
                                    stroke-width="2" />
                                <circle cx="12" cy="10" r="3" stroke="currentColor" stroke-width="2" />
                            </svg>
                            Auto-detect
                        </button>
                    </div>
                    <hr class="dim mb-5">

                    <div class="space-y-4">
                        <div>
                            <label class="lbl">Address Line</label>
                            <input type="text" class="field" name="address" placeholder="123 Obsidian Lane, Apt 4B"
                                value="{{ old('address', optional($profile_details)->address) }}">
                        </div>
                        <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">
                            <div class="sm:col-span-1 col-span-2">
                                <label class="lbl">City</label>
                                <input type="text" class="field" name="city" placeholder="New York"
                                    value="{{ old('city', optional($profile_details)->city) }}">
                            </div>
                            <div>
                                <label class="lbl">State</label>
                                <input type="text" class="field" name="state" placeholder="NY"
                                    value="{{ old('state', optional($profile_details)->state) }}">
                            </div>
                            <div>
                                <label class="lbl">ZIP Code</label>
                                <input type="text" class="field" name="zip" placeholder="10001"
                                    value="{{ old('zip', optional($profile_details)->zip) }}">
                            </div>
                            <div class="col-span-2 sm:col-span-1">
                                <label class="lbl">Country</label>
                                <select class="sel" name="country">
                                    <option value="United States"
                                        {{ optional($profile_details)->country == 'United States' ? 'selected' : '' }}>
                                        United States</option>
                                    <option value="United Kingdom"
                                        {{ optional($profile_details)->country == 'United Kingdom' ? 'selected' : '' }}>
                                        United Kingdom</option>
                                    <option value="Canada"
                                        {{ optional($profile_details)->country == 'Canada' ? 'selected' : '' }}>Canada
                                    </option>
                                    <option value="Germany"
                                        {{ optional($profile_details)->country == 'Germany' ? 'selected' : '' }}> Germany
                                    </option>
                                    <option value="France"
                                        {{ optional($profile_details)->country == 'France' ? 'selected' : '' }}>France
                                    </option>
                                    <option value="japan"
                                        {{ optional($profile_details)->country == 'japan' ? 'selected' : '' }}>japan
                                    </option>
                                    <option value="Australia"
                                        {{ optional($profile_details)->country == 'Australia' ? 'selected' : '' }}>
                                        Australia</option>
                                    <option value="India"
                                        {{ optional($profile_details)->country == 'India' ? 'selected' : '' }}>India
                                    </option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ── SOCIAL LINKS ── -->
                <div class="anim a5 card p-6">
                    <h2 class="sec-head mb-1">Social & Links</h2>
                    <p class="text-xs text-zinc-400 mb-5">Connect your social profiles for better discovery</p>
                    <hr class="dim mb-5">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="lbl">Twitter / X</label>
                            <div class="relative">
                                <span
                                    style="position:absolute;left:14px;top:50%;transform:translateY(-50%);color:rgba(0,0,0,0.3);font-size:12px;font-weight:600;pointer-events:none;">𝕏</span>
                                <input type="text" class="field" name="twitter" style="padding-left:32px;"
                                    placeholder="@handle">
                            </div>
                        </div>
                        <div>
                            <label class="lbl">LinkedIn</label>
                            <div class="field-wrap">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none"
                                    class="field-icon">
                                    <path
                                        d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6zM2 9h4v12H2z"
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <circle cx="4" cy="4" r="2" stroke="currentColor"
                                        stroke-width="2" />
                                </svg>
                                <input type="url" class="field" name="linkedin" placeholder="linkedin.com/in/alex">
                            </div>
                        </div>
                        <div>
                            <label class="lbl">GitHub</label>
                            <div class="field-wrap">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none"
                                    class="field-icon">
                                    <path
                                        d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 00-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0020 4.77 5.07 5.07 0 0019.91 1S18.73.65 16 2.48a13.38 13.38 0 00-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 005 4.77a5.44 5.44 0 00-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 009 18.13V22"
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                                <input type="text" class="field" name="github" placeholder="github.com/alex">
                            </div>
                        </div>
                        <div>
                            <label class="lbl">Instagram</label>
                            <div class="relative">
                                <span
                                    style="position:absolute;left:13px;top:50%;transform:translateY(-50%);pointer-events:none;">
                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none"
                                        style="color:rgba(0,0,0,0.28)">
                                        <rect x="2" y="2" width="20" height="20" rx="5"
                                            stroke="currentColor" stroke-width="2" />
                                        <path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37zM17.5 6.5h.01"
                                            stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                                    </svg>
                                </span>
                                <input type="text" class="field" name="instagram" style="padding-left:40px;"
                                    placeholder="@yourhandle">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Action buttons -->
                <div class="anim a6 flex items-center gap-3 flex-wrap justify-end">
                    <button class="btn-outline" onclick="cancelChanges()">Cancel</button>
                    <button type="submit"
                        class="btn-primary hidden sm:flex items-center gap-1.5 px-3 py-2 rounded-xl text-xs font-semibold text-white"
                        onclick="saveChanges()">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none">
                            <path d="M5 13l4 4L19 7" stroke="white" stroke-width="2.5" stroke-linecap="round" />
                        </svg>
                        Save Changes
                    </button>
                </div>
            </div>
        </form>

        <form action="{{ route('admin.change.password') }}" method="post">
            @csrf

            <!-- ═══════ TAB: SECURITY ═══════ -->
            <div id="tab-security" class="tab-panel space-y-5">

                <!-- Change Password -->
                <div class="card p-6">
                    <h2 class="sec-head mb-1">Change Password</h2>
                    <p class="text-xs text-zinc-400 mb-5">Use a strong, unique password. Min. 12 characters recommended.
                    </p>
                    <hr class="dim mb-5">

                    <div class="max-w-lg space-y-4">
                        <div>
                            <label class="lbl">Current Password</label>
                            <div class="relative">
                                <input type="password" class="field" name="current_password"
                                    placeholder="Enter current password" id="curPwd" style="padding-right:44px;">
                                <button onclick="togglePwd('curPwd','eyeCur')"
                                    class="absolute right-3 top-1/2 -translate-y-1/2 text-zinc-400 hover:text-zinc-700 transition-colors p-1">
                                    <svg id="eyeCur" width="15" height="15" viewBox="0 0 24 24"
                                        fill="none">
                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z" stroke="currentColor"
                                            stroke-width="2" />
                                        <circle cx="12" cy="12" r="3" stroke="currentColor"
                                            stroke-width="2" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <div>
                            <label class="lbl">New Password</label>
                            <div class="relative">
                                <input type="password" name="new_password" class="field"
                                    placeholder="Create new password" id="newPwd" style="padding-right:44px;"
                                    oninput="checkStrength(this)">
                                <button onclick="togglePwd('newPwd','eyeNew')"
                                    class="absolute right-3 top-1/2 -translate-y-1/2 text-zinc-400 hover:text-zinc-700 transition-colors p-1">
                                    <svg id="eyeNew" width="15" height="15" viewBox="0 0 24 24"
                                        fill="none">
                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z" stroke="currentColor"
                                            stroke-width="2" />
                                        <circle cx="12" cy="12" r="3" stroke="currentColor"
                                            stroke-width="2" />
                                    </svg>
                                </button>
                            </div>
                            <!-- Strength meter -->
                            <div class="flex gap-1.5 mt-2" id="strengthBars">
                                <div class="strength-bar" id="s1"></div>
                                <div class="strength-bar" id="s2"></div>
                                <div class="strength-bar" id="s3"></div>
                                <div class="strength-bar" id="s4"></div>
                            </div>
                            <p class="text-[11px] mt-1.5" id="strengthLabel" style="color:rgba(0,0,0,0.35);">Enter
                                password
                                to see strength</p>
                        </div>
                        <div>
                            <label class="lbl">Confirm Password</label>
                            <div class="relative">
                                <input type="password" name="new_password_confirmation" class="field"
                                    placeholder="Confirm new password" id="confPwd" style="padding-right:44px;">
                                <button onclick="togglePwd('confPwd','eyeConf')"
                                    class="absolute right-3 top-1/2 -translate-y-1/2 text-zinc-400 hover:text-zinc-700 transition-colors p-1">
                                    <svg id="eyeConf" width="15" height="15" viewBox="0 0 24 24"
                                        fill="none">
                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z" stroke="currentColor"
                                            stroke-width="2" />
                                        <circle cx="12" cy="12" r="3" stroke="currentColor"
                                            stroke-width="2" />
                                    </svg>
                                </button>
                            </div>
                        </div>

                        <!-- Password rules -->
                        <div class="p-4 rounded-xl space-y-2"
                            style="background:#FAFAF9;border:1px solid rgba(0,0,0,0.06);">
                            <p class="text-[11px] font-semibold text-zinc-600 uppercase tracking-wider mb-2">Requirements
                            </p>
                            <div class="flex items-center gap-2 text-xs text-zinc-500" id="rule1">
                                <svg width="12" height="12" viewBox="0 0 24 24" fill="none"
                                    class="text-zinc-300">
                                    <circle cx="12" cy="12" r="10" stroke="currentColor"
                                        stroke-width="2" />
                                </svg>
                                At least 8 characters
                            </div>
                            <div class="flex items-center gap-2 text-xs text-zinc-500" id="rule2">
                                <svg width="12" height="12" viewBox="0 0 24 24" fill="none"
                                    class="text-zinc-300">
                                    <circle cx="12" cy="12" r="10" stroke="currentColor"
                                        stroke-width="2" />
                                </svg>
                                One uppercase letter
                            </div>
                            <div class="flex items-center gap-2 text-xs text-zinc-500" id="rule3">
                                <svg width="12" height="12" viewBox="0 0 24 24" fill="none"
                                    class="text-zinc-300">
                                    <circle cx="12" cy="12" r="10" stroke="currentColor"
                                        stroke-width="2" />
                                </svg>
                                One number or symbol
                            </div>
                        </div>

                        <button
                            class="btn-primary hidden sm:flex items-center gap-1.5 px-3 py-2 rounded-xl text-xs font-semibold text-white">
                            <svg width="13" height="13" viewBox="0 0 24 24" fill="none">
                                <rect x="3" y="11" width="18" height="11" rx="2" stroke="white"
                                    stroke-width="2" />
                                <path d="M7 11V7a5 5 0 0110 0v4" stroke="white" stroke-width="2"
                                    stroke-linecap="round" />
                            </svg>
                            Update Password
                        </button>
                    </div>
                </div>

                <!-- Two Factor Auth -->
                <div class="card p-6">
                    <div class="flex items-start justify-between mb-5 flex-wrap gap-3">
                        <div>
                            <h2 class="sec-head">Two-Factor Authentication</h2>
                            <p class="text-xs text-zinc-400 mt-0.5">Add an extra layer of security to your account</p>
                        </div>
                        <div class="flex items-center gap-2.5">
                            <span class="text-[11px] font-semibold text-zinc-400" id="tfa-status">Disabled</span>
                            <div class="tog" id="tfaTog" onclick="toggle2FA(this)">
                                <div class="tog-thumb"></div>
                            </div>
                        </div>
                    </div>
                    <hr class="dim mb-5">

                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                        <div class="p-4 rounded-2xl cursor-pointer border-2 border-zinc-900" style="background:#FAFAF9;"
                            onclick="select2FAMethod(this,'app')">
                            <div
                                style="width:36px;height:36px;border-radius:10px;background:#18181B;display:flex;align-items:center;justify-content:center;margin-bottom:12px;">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none"
                                    class="text-white">
                                    <rect x="5" y="2" width="14" height="20" rx="2" stroke="white"
                                        stroke-width="2" />
                                    <path d="M12 18h.01" stroke="white" stroke-width="2" stroke-linecap="round" />
                                </svg>
                            </div>
                            <div class="text-sm font-semibold text-zinc-800">Authenticator App</div>
                            <div class="text-[11px] text-zinc-400 mt-1">Google Auth, Authy</div>
                        </div>
                        <div class="p-4 rounded-2xl cursor-pointer border-2 border-transparent hover:border-zinc-200 transition-colors"
                            style="background:#FAFAF9;" onclick="select2FAMethod(this,'sms')">
                            <div
                                style="width:36px;height:36px;border-radius:10px;background:rgba(0,0,0,0.06);display:flex;align-items:center;justify-content:center;margin-bottom:12px;">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none"
                                    class="text-zinc-500">
                                    <path d="M21 15a2 2 0 01-2 2H7l-4 4V5a2 2 0 012-2h14a2 2 0 012 2z"
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                            </div>
                            <div class="text-sm font-semibold text-zinc-800">SMS / Text</div>
                            <div class="text-[11px] text-zinc-400 mt-1">Get codes via SMS</div>
                        </div>
                        <div class="p-4 rounded-2xl cursor-pointer border-2 border-transparent hover:border-zinc-200 transition-colors"
                            style="background:#FAFAF9;" onclick="select2FAMethod(this,'email')">
                            <div
                                style="width:36px;height:36px;border-radius:10px;background:rgba(0,0,0,0.06);display:flex;align-items:center;justify-content:center;margin-bottom:12px;">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none"
                                    class="text-zinc-500">
                                    <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"
                                        stroke="currentColor" stroke-width="2" />
                                    <polyline points="22,6 12,13 2,6" stroke="currentColor" stroke-width="2" />
                                </svg>
                            </div>
                            <div class="text-sm font-semibold text-zinc-800">Email OTP</div>
                            <div class="text-[11px] text-zinc-400 mt-1">Codes to your email</div>
                        </div>
                    </div>
                </div>

                <!-- Active Sessions -->
                <div class="card p-6">
                    <div class="flex items-center justify-between mb-5">
                        <div>
                            <h2 class="sec-head">Active Sessions</h2>
                            <p class="text-xs text-zinc-400 mt-0.5">Devices currently logged into your account</p>
                        </div>
                        <button class="btn-danger btn-sm text-xs"
                            onclick="showToast('All other sessions terminated','danger')">
                            Logout All Others
                        </button>
                    </div>
                    <hr class="dim mb-4">

                    <div class="space-y-3">
                        <!-- Session 1 (current) -->
                        <div class="flex items-center gap-3 p-4 rounded-2xl"
                            style="background:#FAFAF9;border:1px solid rgba(0,0,0,0.06);">
                            <div
                                style="width:38px;height:38px;border-radius:10px;background:#18181B;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none"
                                    class="text-white">
                                    <rect x="2" y="3" width="20" height="14" rx="2" stroke="white"
                                        stroke-width="2" />
                                    <path d="M8 21h8M12 17v4" stroke="white" stroke-width="2" stroke-linecap="round" />
                                </svg>
                            </div>
                            <div class="flex-1 min-w-0">
                                <div class="flex items-center gap-2">
                                    <span class="text-sm font-semibold text-zinc-800">MacBook Pro — Chrome</span>
                                    <span
                                        style="font-size:9px;font-weight:700;background:#ECFDF5;color:#065F46;padding:2px 7px;border-radius:5px;border:1px solid #A7F3D0;">CURRENT</span>
                                </div>
                                <div class="text-xs text-zinc-400 mt-0.5">New York, NY · 192.168.1.44 · Active now</div>
                            </div>
                        </div>

                        <!-- Session 2 -->
                        <div class="flex items-center gap-3 p-4 rounded-2xl"
                            style="background:#FAFAF9;border:1px solid rgba(0,0,0,0.06);">
                            <div
                                style="width:38px;height:38px;border-radius:10px;background:rgba(0,0,0,0.07);display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none"
                                    class="text-zinc-500">
                                    <rect x="5" y="2" width="14" height="20" rx="2" stroke="currentColor"
                                        stroke-width="2" />
                                    <path d="M12 18h.01" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                                </svg>
                            </div>
                            <div class="flex-1 min-w-0">
                                <div class="text-sm font-semibold text-zinc-800">iPhone 15 — Safari</div>
                                <div class="text-xs text-zinc-400 mt-0.5">Brooklyn, NY · 2 hours ago</div>
                            </div>
                            <button class="btn-outline btn-sm text-xs"
                                onclick="showToast('Session terminated','danger')">End</button>
                        </div>

                        <!-- Session 3 -->
                        <div class="flex items-center gap-3 p-4 rounded-2xl"
                            style="background:#FAFAF9;border:1px solid rgba(0,0,0,0.06);">
                            <div
                                style="width:38px;height:38px;border-radius:10px;background:rgba(0,0,0,0.07);display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none"
                                    class="text-zinc-500">
                                    <rect x="2" y="3" width="20" height="14" rx="2" stroke="currentColor"
                                        stroke-width="2" />
                                    <path d="M8 21h8M12 17v4" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" />
                                </svg>
                            </div>
                            <div class="flex-1 min-w-0">
                                <div class="text-sm font-semibold text-zinc-800">Windows PC — Firefox</div>
                                <div class="text-xs text-zinc-400 mt-0.5">Hoboken, NJ · 3 days ago</div>
                            </div>
                            <button class="btn-outline btn-sm text-xs"
                                onclick="showToast('Session terminated','danger')">End</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <form action="{{ route('admin.notification') }}" method="post">
            @csrf
            <!-- ═══════ TAB: NOTIFICATIONS ═══════ -->
            <div id="tab-notifications" class="tab-panel space-y-5">

                <div class="card p-6">
                    <h2 class="sec-head mb-1">Notification Preferences</h2>
                    <p class="text-xs text-zinc-400 mb-5">Choose how and when you'd like to be notified</p>
                    <hr class="dim mb-5">

                    <!-- Channel toggles -->
                    <div class="mb-6">
                        <p class="text-[11px] font-bold text-zinc-400 uppercase tracking-wider mb-3">Channels</p>
                        <div class="space-y-0">
                            <div class="info-row">
                                <div
                                    style="width:36px;height:36px;border-radius:10px;background:rgba(0,0,0,0.05);display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none"
                                        class="text-zinc-500">
                                        <path
                                            d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"
                                            stroke="currentColor" stroke-width="2" />
                                        <polyline points="22,6 12,13 2,6" stroke="currentColor" stroke-width="2" />
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <div class="text-sm font-semibold text-zinc-800">Email Notifications</div>
                                    <div class="text-xs text-zinc-400">Receive updates via email</div>
                                </div>
                                <label class="toggle-wrapper">
                                    <input type="checkbox" name="email_notification" class="toggle-input" value="1"
                                        @if ($notification->email_notification == 1) checked @endif>

                                    <div class="tog">
                                        <div class="tog-thumb"></div>
                                    </div>


                                </label>
                            </div>
                            <div class="info-row">
                                <div
                                    style="width:36px;height:36px;border-radius:10px;background:rgba(0,0,0,0.05);display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none"
                                        class="text-zinc-500">
                                        <path d="M21 15a2 2 0 01-2 2H7l-4 4V5a2 2 0 012-2h14a2 2 0 012 2z"
                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <div class="text-sm font-semibold text-zinc-800">SMS Alerts</div>
                                    <div class="text-xs text-zinc-400">Critical alerts via text message</div>
                                </div>
                                <label class="toggle-wrapper">
                                    <input type="checkbox" name="sms_alert" class="toggle-input" value="1"
                                        @if ($notification->sms_alert == 1) checked @endif>

                                    <div class="tog">
                                        <div class="tog-thumb"></div>
                                    </div>


                                </label>
                            </div>
                            <div class="info-row">
                                <div
                                    style="width:36px;height:36px;border-radius:10px;background:rgba(0,0,0,0.05);display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none"
                                        class="text-zinc-500">
                                        <path d="M18 8A6 6 0 006 8c0 7-3 9-3 9h18s-3-2-3-9M13.73 21a2 2 0 01-3.46 0"
                                            stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                                    </svg>
                                </div>
                                <div class="flex-1">
                                    <div class="text-sm font-semibold text-zinc-800">Push Notifications</div>
                                    <div class="text-xs text-zinc-400">Browser & app push alerts</div>
                                </div>
                                <label class="toggle-wrapper">
                                    <input type="checkbox" name="push_alerts" class="toggle-input" value="1"
                                        @if ($notification->push_alerts == 1) checked @endif>

                                    <div class="tog">
                                        <div class="tog-thumb"></div>
                                    </div>


                                </label>
                            </div>
                        </div>
                    </div>

                    <!-- Event toggles -->
                    <p class="text-[11px] font-bold text-zinc-400 uppercase tracking-wider mb-3">Events</p>
                    <div class="space-y-0">
                        <div class="info-row">
                            <div class="flex-1">
                                <div class="text-sm font-semibold text-zinc-800">New Order Placed</div>
                                <div class="text-xs text-zinc-400">When a customer places an order</div>
                            </div>
                            <label class="toggle-wrapper">
                                <input type="checkbox" name="new_order" class="toggle-input" value="1"
                                    @if ($notification->new_order == 1) checked @endif>

                                <div class="tog">
                                    <div class="tog-thumb"></div>
                                </div>


                            </label>
                        </div>
                        <div class="info-row">
                            <div class="flex-1">
                                <div class="text-sm font-semibold text-zinc-800">Order Status Updates</div>
                                <div class="text-xs text-zinc-400">Shipping, delivery confirmations</div>
                            </div>
                            <label class="toggle-wrapper">
                                <input type="checkbox" name="order_status" class="toggle-input" value="1"
                                    @if ($notification->order_status == 1) checked @endif>

                                <div class="tog">
                                    <div class="tog-thumb"></div>
                                </div>


                            </label>
                        </div>
                        <div class="info-row">
                            <div class="flex-1">
                                <div class="text-sm font-semibold text-zinc-800">Low Stock Alerts</div>
                                <div class="text-xs text-zinc-400">When inventory falls below threshold</div>
                            </div>
                            <label class="toggle-wrapper">
                                <input type="checkbox" name="low_stock" class="toggle-input" value="1"
                                    @if ($notification->low_stock == 1) checked @endif>

                                <div class="tog">
                                    <div class="tog-thumb"></div>
                                </div>


                            </label>
                        </div>
                        <div class="info-row">
                            <div class="flex-1">
                                <div class="text-sm font-semibold text-zinc-800">Customer Reviews</div>
                                <div class="text-xs text-zinc-400">New product reviews & feedback</div>
                            </div>
                            <label class="toggle-wrapper">
                                <input type="checkbox" name="customer_reviews" class="toggle-input" value="1"
                                    @if ($notification->customer_reviews == 1) checked @endif>

                                <div class="tog">
                                    <div class="tog-thumb"></div>
                                </div>


                            </label>
                        </div>
                        <div class="info-row">
                            <div class="flex-1">
                                <div class="text-sm font-semibold text-zinc-800">Weekly Analytics Report</div>
                                <div class="text-xs text-zinc-400">Summary digest every Monday</div>
                            </div>
                            <label class="toggle-wrapper">
                                <input type="checkbox" name="weekly_analytics" class="toggle-input" value="1"
                                    @if ($notification->weekly_analytics == 1) checked @endif>

                                <div class="tog">
                                    <div class="tog-thumb"></div>
                                </div>


                            </label>
                        </div>
                        <div class="info-row">
                            <div class="flex-1">
                                <div class="text-sm font-semibold text-zinc-800">Marketing & Promotions</div>
                                <div class="text-xs text-zinc-400">NEXUS news and feature updates</div>
                            </div>
                            <label class="toggle-wrapper">
                                <input type="checkbox" name="marketing_promotion" class="toggle-input" value="1"
                                    @if ($notification->marketing_promotion == 1) checked @endif>

                                <div class="tog">
                                    <div class="tog-thumb"></div>
                                </div>
                            </label>
                        </div>
                    </div>

                    <div class="mt-5 flex gap-3">
                        <button
                            class="btn-primary hidden sm:flex items-center gap-1.5 px-3 py-2 rounded-xl text-xs font-semibold text-white"
                            onclick="showToast('Notification preferences saved','success')">
                            <svg width="12" height="12" viewBox="0 0 24 24" fill="none">
                                <path d="M5 13l4 4L19 7" stroke="white" stroke-width="2.5" stroke-linecap="round" />
                            </svg>
                            Save Preferences
                        </button>
                    </div>
                </div>
            </div>
        </form>

        <!-- ═══════ TAB: BILLING ═══════ -->
        <div id="tab-billing" class="tab-panel space-y-5">

            <div class="card p-6">
                <div class="flex items-center justify-between mb-5 flex-wrap gap-3">
                    <div>
                        <h2 class="sec-head">Current Plan</h2>
                        <p class="text-xs text-zinc-400 mt-0.5">You are on the Pro plan</p>
                    </div>
                    <span
                        style="font-size:11px;font-weight:700;background:#EDE9FE;color:#5B21B6;padding:4px 12px;border-radius:99px;border:1px solid #DDD6FE;">PRO
                        PLAN</span>
                </div>
                <hr class="dim mb-5">

                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-5">
                    <div class="stat-pill">
                        <div class="text-base font-bold text-zinc-900">$49</div>
                        <div class="text-[11px] text-zinc-400">/ month</div>
                    </div>
                    <div class="stat-pill">
                        <div class="text-base font-bold text-zinc-900">Unlimited</div>
                        <div class="text-[11px] text-zinc-400">Products</div>
                    </div>
                    <div class="stat-pill">
                        <div class="text-base font-bold text-zinc-900">Apr 29</div>
                        <div class="text-[11px] text-zinc-400">Next billing</div>
                    </div>
                </div>

                <div class="flex gap-3 flex-wrap">
                    <button class="btn-dark btn-sm" onclick="showToast('Upgrade options loaded','info')">Upgrade
                        Plan</button>
                    <button class="btn-outline btn-sm"
                        onclick="showToast('Plan cancelled — effective Apr 29','danger')">Cancel Plan</button>
                </div>
            </div>

            <div class="card p-6">
                <div class="flex items-center justify-between mb-5">
                    <h2 class="sec-head">Payment Methods</h2>
                    <button class="btn-outline btn-sm text-xs" onclick="showToast('Card form opened','info')">+ Add
                        Card</button>
                </div>
                <hr class="dim mb-4">

                <div class="space-y-3">
                    <div class="flex items-center gap-3 p-4 rounded-2xl"
                        style="background:#FAFAF9;border:2px solid #18181B;">
                        <div
                            style="width:38px;height:24px;background:#1A1F71;border-radius:5px;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                            <span
                                style="color:#F9A825;font-size:8px;font-weight:900;font-family:sans-serif;letter-spacing:-0.5px;">VISA</span>
                        </div>
                        <div class="flex-1">
                            <div class="text-sm font-semibold text-zinc-800">Visa ending in 4242</div>
                            <div class="text-xs text-zinc-400">Expires 08/27 · <span
                                    style="color:#065F46;font-weight:600;">Default</span></div>
                        </div>
                        <button class="btn-outline btn-sm text-xs"
                            onclick="showToast('Card removed','danger')">Remove</button>
                    </div>
                </div>
            </div>

            <div class="card p-6">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="sec-head">Billing History</h2>
                    <button class="btn-outline btn-sm text-xs"
                        onclick="showToast('All invoices downloaded','info')">Download All</button>
                </div>
                <hr class="dim mb-3">

                <div class="overflow-x-auto">
                    <table style="width:100%;border-collapse:collapse;min-width:420px;">
                        <thead>
                            <tr style="background:rgba(0,0,0,0.02);">
                                <th class="lbl text-left px-4 py-3">Date</th>
                                <th class="lbl text-left px-4 py-3">Description</th>
                                <th class="lbl text-left px-4 py-3">Amount</th>
                                <th class="lbl text-left px-4 py-3">Status</th>
                                <th class="lbl px-4 py-3"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr style="border-top:1px solid rgba(0,0,0,0.05);">
                                <td class="px-4 py-3 text-sm text-zinc-600 font-mono">Mar 29, 2026</td>
                                <td class="px-4 py-3 text-sm text-zinc-700">Pro Plan · Monthly</td>
                                <td class="px-4 py-3 text-sm font-semibold text-zinc-900 font-mono">$49.00</td>
                                <td class="px-4 py-3"><span class="badge"
                                        style="background:#ECFDF5;color:#065F46;border:1px solid #A7F3D0;font-size:10px;padding:2px 9px;border-radius:99px;font-weight:700;">Paid</span>
                                </td>
                                <td class="px-4 py-3 text-right"><button
                                        class="text-xs text-blue-600 hover:text-blue-700 font-medium"
                                        onclick="showToast('Invoice downloaded','info')">Invoice ↓</button></td>
                            </tr>
                            <tr style="border-top:1px solid rgba(0,0,0,0.05);">
                                <td class="px-4 py-3 text-sm text-zinc-600 font-mono">Feb 29, 2026</td>
                                <td class="px-4 py-3 text-sm text-zinc-700">Pro Plan · Monthly</td>
                                <td class="px-4 py-3 text-sm font-semibold text-zinc-900 font-mono">$49.00</td>
                                <td class="px-4 py-3"><span class="badge"
                                        style="background:#ECFDF5;color:#065F46;border:1px solid #A7F3D0;font-size:10px;padding:2px 9px;border-radius:99px;font-weight:700;">Paid</span>
                                </td>
                                <td class="px-4 py-3 text-right"><button
                                        class="text-xs text-blue-600 hover:text-blue-700 font-medium"
                                        onclick="showToast('Invoice downloaded','info')">Invoice ↓</button></td>
                            </tr>
                            <tr style="border-top:1px solid rgba(0,0,0,0.05);">
                                <td class="px-4 py-3 text-sm text-zinc-600 font-mono">Jan 29, 2026</td>
                                <td class="px-4 py-3 text-sm text-zinc-700">Pro Plan · Monthly</td>
                                <td class="px-4 py-3 text-sm font-semibold text-zinc-900 font-mono">$49.00</td>
                                <td class="px-4 py-3"><span class="badge"
                                        style="background:#ECFDF5;color:#065F46;border:1px solid #A7F3D0;font-size:10px;padding:2px 9px;border-radius:99px;font-weight:700;">Paid</span>
                                </td>
                                <td class="px-4 py-3 text-right"><button
                                        class="text-xs text-blue-600 hover:text-blue-700 font-medium"
                                        onclick="showToast('Invoice downloaded','info')">Invoice ↓</button></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

    <!-- ── TOAST ── -->
    <div id="toast">
        <div style="background:#18181B;color:#f9fafb;padding:12px 18px;border-radius:12px;font-size:13px;font-weight:500;font-family:'DM Sans',sans-serif;display:flex;align-items:center;gap:10px;box-shadow:0 8px 30px rgba(0,0,0,0.2);"
            id="toastInner">
            <span id="toastIcon">✓</span><span id="toastMsg">Done</span>
        </div>
    </div>

    <script>
        // ── Tab switching ──
        function switchTab(btn, tabId) {
            document.querySelectorAll('.tab-btn').forEach(b => b.classList.remove('active'));
            document.querySelectorAll('.tab-panel').forEach(p => p.classList.remove('active'));
            btn.classList.add('active');
            document.getElementById('tab-' + tabId).classList.add('active');
        }

        // ── Toggle switch ──
        function toggleSwitch(el) {
            el.classList.toggle('on');
        }

        // ── Avatar preview ──
        function previewAvatar(input) {
            const file = input.files[0];
            if (!file) return;
            const r = new FileReader();
            r.onload = e => {
                const img = document.getElementById('avatarImg');
                const initials = document.getElementById('avatarInitials');
                img.src = e.target.result;
                img.style.display = 'block';
                initials.style.display = 'none';
            };
            r.readAsDataURL(file);
            showToast('Profile photo updated', 'success');
        }

        // ── Update display name ──
        function updateDisplay() {
            const inputs = document.querySelectorAll('input[type="text"]');
            // rough approximation
        }

        // ── Password strength ──
        function checkStrength(input) {
            const v = input.value;
            const bars = [s1, s2, s3, s4];
            const label = document.getElementById('strengthLabel');
            let score = 0;
            const r1 = v.length >= 8;
            const r2 = /[A-Z]/.test(v);
            const r3 = /[\d\W]/.test(v);
            if (r1) score++;
            if (r2) score++;
            if (r3) score++;
            if (v.length >= 12) score++;

            // Update rule indicators
            updateRule('rule1', r1);
            updateRule('rule2', r2);
            updateRule('rule3', r3);

            const colors = ['#EF4444', '#F97316', '#EAB308', '#22C55E'];
            const labels = ['Weak', 'Fair', 'Good', 'Strong'];
            bars.forEach((b, i) => {
                b.style.background = i < score ? colors[Math.min(score - 1, 3)] : 'rgba(0,0,0,0.08)';
            });
            label.textContent = v ? labels[Math.min(score - 1, 3)] || 'Weak' : 'Enter password to see strength';
            label.style.color = v ? colors[Math.min(score - 1, 3)] : 'rgba(0,0,0,0.35)';
        }

        function updateRule(id, pass) {
            const el = document.getElementById(id);
            const svg = el.querySelector('svg');
            if (pass) {
                el.style.color = '#16a34a';
                svg.outerHTML =
                    `<svg width="12" height="12" viewBox="0 0 24 24" fill="none" class="text-emerald-500"><path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" stroke="#16a34a" stroke-width="2" stroke-linecap="round"/></svg>`;
            }
        }

        // ── Toggle password visibility ──
        function togglePwd(inputId, eyeId) {
            const f = document.getElementById(inputId);
            f.type = f.type === 'password' ? 'text' : 'password';
        }

        // ── Change password ──
        function changePassword() {
            const n = document.getElementById('newPwd').value;
            const c = document.getElementById('confPwd').value;
            if (!n) {
                showToast('Enter new password', 'danger');
                return;
            }
            if (n !== c) {
                showToast('Passwords do not match', 'danger');
                return;
            }
            showToast('Password updated successfully', 'success');
            ['curPwd', 'newPwd', 'confPwd'].forEach(id => document.getElementById(id).value = '');
            ['s1', 's2', 's3', 's4'].forEach(id => document.getElementById(id).style.background = 'rgba(0,0,0,0.08)');
        }

        // ── 2FA method select ──
        function select2FAMethod(el, method) {
            document.querySelectorAll('[onclick^="select2FAMethod"]').forEach(c => {
                c.classList.remove('border-zinc-900');
                c.classList.add('border-transparent');
            });
            el.classList.add('border-zinc-900');
            el.classList.remove('border-transparent');
        }

        // ── Toggle 2FA ──
        function toggle2FA(el) {
            el.classList.toggle('on');
            document.getElementById('tfa-status').textContent = el.classList.contains('on') ? 'Enabled' : 'Disabled';
            document.getElementById('tfa-status').style.color = el.classList.contains('on') ? '#16a34a' : '';
            showToast('2FA ' + (el.classList.contains('on') ? 'enabled' : 'disabled'), el.classList.contains('on') ?
                'success' : 'info');
        }

        // ── Save/Cancel ──
        function saveChanges() {
            showToast('Profile saved successfully', 'success');
        }

        function cancelChanges() {
            showToast('Changes discarded', 'info');
        }

        // ── Delete account ──
        function confirmDelete() {
            if (confirm('Permanently delete your account? This cannot be undone.')) {
                showToast('Account deletion requested', 'danger');
            }
        }

        // ── Toast ──
        let toastTimer;

        function showToast(msg, type) {
            const t = document.getElementById('toast');
            const inner = document.getElementById('toastInner');
            document.getElementById('toastMsg').textContent = msg;
            const icon = type === 'success' ? '✓' : type === 'danger' ? '⚠' : 'ℹ';
            document.getElementById('toastIcon').textContent = icon;
            const borders = {
                success: '#22c55e',
                danger: '#ef4444',
                info: '#3b82f6'
            };
            inner.style.borderLeft = `3px solid ${borders[type] || borders.info}`;
            t.classList.add('show');
            clearTimeout(toastTimer);
            toastTimer = setTimeout(() => t.classList.remove('show'), 3200);
        }
    </script>
@endsection
