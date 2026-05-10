<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>NEXUS — Commerce Intelligence</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link
        href="https://fonts.googleapis.com/css2?family=DM+Sans:opsz,wght@9..40,300;9..40,400;9..40,500;9..40,600;9..40,700&family=DM+Mono:wght@400;500&family=Syne:wght@700;800&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['DM Sans', 'sans-serif'],
                        mono: ['DM Mono', 'monospace'],
                        display: ['Inter', 'sans-serif'],
                    },
                }
            }
        }
    </script>
    @stack('styles')
    <style>
        *,
        *::before,
        *::after {
            box-sizing: border-box;
        }

        html,
        body {
            height: 100%;
            margin: 0;
            overflow-x: hidden;
            background-color: #0B0F14;
            font-family: 'DM Sans', sans-serif;
            color: #e2e8f0;
        }

        /* ── Noise grain overlay ── */
        body::after {
            content: '';
            position: fixed;
            inset: 0;
            background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.035'/%3E%3C/svg%3E");
            pointer-events: none;
            z-index: 9999;
        }

        /* ── Ambient glows ── */
        .glow-orb {
            position: fixed;
            border-radius: 50%;
            filter: blur(100px);
            pointer-events: none;
            z-index: 0;
        }

        .glow-orb-1 {
            width: min(500px, 60vw);
            height: min(500px, 60vw);
            background: radial-gradient(circle, rgba(109, 40, 217, 0.07) 0%, transparent 70%);
            top: -15%;
            left: 10%;
        }

        .glow-orb-2 {
            width: min(400px, 50vw);
            height: min(400px, 50vw);
            background: radial-gradient(circle, rgba(6, 182, 212, 0.05) 0%, transparent 70%);
            bottom: -10%;
            right: 5%;
        }

        /* ── Scrollbar ── */
        ::-webkit-scrollbar {
            width: 3px;
            height: 3px;
        }

        ::-webkit-scrollbar-track {
            background: transparent;
        }

        ::-webkit-scrollbar-thumb {
            background: rgba(139, 92, 246, 0.3);
            border-radius: 4px;
        }

        /* ── Sidebar ── */
        #sidebar {
            background: linear-gradient(180deg, rgba(13, 17, 23, 0.97) 0%, rgba(11, 15, 20, 0.99) 100%);
            backdrop-filter: blur(24px);
            -webkit-backdrop-filter: blur(24px);
            border-right: 1px solid rgba(255, 255, 255, 0.04);
            transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            z-index: 200;
        }

        /* Mobile: off-canvas */
        #sidebar {
            position: fixed;
            top: 0;
            left: 0;
            bottom: 0;
            width: 260px;
            transform: translateX(-100%);
        }

        #sidebar.open {
            transform: translateX(0);
        }

        /* Desktop: always visible */
        @media (min-width: 1024px) {
            #sidebar {
                position: relative;
                transform: none !important;
                width: 220px;
                flex-shrink: 0;
                height: 100vh;
            }
        }

        /* ── Overlay ── */
        #overlay {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, 0.6);
            backdrop-filter: blur(2px);
            z-index: 10;
        }

        #overlay.show {
            display: block;
        }

        /* ── Topbar ── */
        .topbar {
            background: rgba(11, 15, 20, 0.88);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.04);
            position: sticky;
            top: 0;
            z-index: 100;
        }

        /* ── Glass card ── */
        .glass {
            background: linear-gradient(135deg, rgba(22, 27, 38, 0.85) 0%, rgba(18, 24, 33, 0.9) 100%);
            border: 1px solid rgba(255, 255, 255, 0.05);
            border-radius: 16px;
            transition: transform 0.3s ease, box-shadow 0.3s ease, border-color 0.3s ease;
        }

        .glass:hover {
            transform: translateY(-1px);
            border-color: rgba(139, 92, 246, 0.15);
            box-shadow: 0 20px 50px -15px rgba(0, 0, 0, 0.5), 0 0 0 1px rgba(139, 92, 246, 0.05);
        }

        /* ── KPI glow corners ── */
        .kpi-glow::after {
            content: '';
            position: absolute;
            top: -10px;
            right: -10px;
            width: 100px;
            height: 100px;
            border-radius: 50%;
            filter: blur(35px);
            opacity: 0.15;
            pointer-events: none;
        }

        .kpi-violet::after {
            background: #8b5cf6;
        }

        .kpi-cyan::after {
            background: #06b6d4;
        }

        .kpi-emerald::after {
            background: #10b981;
        }

        .kpi-amber::after {
            background: #f59e0b;
        }

        /* ── Search ── */
        .search-box {
            background: rgba(255, 255, 255, 0.04);
            border: 1px solid rgba(255, 255, 255, 0.07);
            transition: all 0.2s;
        }

        .search-box:focus {
            outline: none;
            background: rgba(139, 92, 246, 0.05);
            border-color: rgba(139, 92, 246, 0.4);
            box-shadow: 0 0 0 3px rgba(139, 92, 246, 0.08);
        }

        /* ── Nav item ── */
        .nav-item {
            position: relative;
            border-radius: 12px;
            cursor: pointer;
            transition: background 0.2s;
        }

        .nav-item:hover {
            background: rgba(255, 255, 255, 0.04);
        }

        .nav-item.active {
            background: linear-gradient(90deg, rgba(139, 92, 246, 0.15) 0%, transparent 100%);
        }

        .nav-item.active::before {
            content: '';
            position: absolute;
            left: 0;
            top: 50%;
            transform: translateY(-50%);
            width: 3px;
            height: 55%;
            background: linear-gradient(180deg, #8b5cf6, #06b6d4);
            border-radius: 0 4px 4px 0;
        }

        /* ── Progress bars ── */
        .prog-track {
            background: rgba(255, 255, 255, 0.06);
            border-radius: 99px;
            overflow: hidden;
        }

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
            background: linear-gradient(90deg, transparent 0%, rgba(255, 255, 255, 0.18) 50%, transparent 100%);
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

        /* ── Spark bars ── */
        .spark {
            display: flex;
            align-items: flex-end;
            gap: 2px;
            height: 28px;
        }

        .spark span {
            flex: 1;
            border-radius: 2px;
            min-height: 3px;
        }

        /* ── Chart bars ── */
        .chartbar {
            position: relative;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 4px;
        }

        .chartbar-fill {
            width: 100%;
            border-radius: 4px 4px 0 0;
            background: linear-gradient(180deg, rgba(139, 92, 246, 0.85), rgba(109, 40, 217, 0.4));
            cursor: pointer;
            transition: all 0.25s;
        }

        .chartbar-fill:hover {
            background: linear-gradient(180deg, #a78bfa, rgba(139, 92, 246, 0.7));
            filter: drop-shadow(0 0 8px rgba(139, 92, 246, 0.55));
        }

        .chartbar-tip {
            position: absolute;
            bottom: calc(100% + 6px);
            left: 50%;
            transform: translateX(-50%);
            background: rgba(22, 30, 42, 0.97);
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 8px;
            padding: 5px 9px;
            font-size: 10px;
            white-space: nowrap;
            opacity: 0;
            pointer-events: none;
            transition: opacity 0.2s;
            z-index: 10;
            color: #e2e8f0;
            font-family: 'DM Mono', monospace;
        }

        .chartbar:hover .chartbar-tip {
            opacity: 1;
        }

        /* ── Badges ── */
        .badge {
            display: inline-flex;
            align-items: center;
            padding: 2px 10px;
            border-radius: 99px;
            font-size: 10px;
            font-weight: 600;
            white-space: nowrap;
        }

        .badge-ok {
            background: rgba(16, 185, 129, 0.12);
            color: #34d399;
            border: 1px solid rgba(16, 185, 129, 0.2);
        }

        .badge-warn {
            background: rgba(245, 158, 11, 0.12);
            color: #fbbf24;
            border: 1px solid rgba(245, 158, 11, 0.2);
        }

        .badge-err {
            background: rgba(239, 68, 68, 0.12);
            color: #f87171;
            border: 1px solid rgba(239, 68, 68, 0.2);
        }

        .badge-inf {
            background: rgba(99, 102, 241, 0.12);
            color: #818cf8;
            border: 1px solid rgba(99, 102, 241, 0.2);
        }

        /* ── Table row ── */
        .trow {
            transition: background 0.15s;
        }

        .trow:hover {
            background: rgba(255, 255, 255, 0.025);
        }

        /* ── AI panel ── */
        .ai-panel {
            background: linear-gradient(135deg, rgba(109, 40, 217, 0.09) 0%, rgba(6, 182, 212, 0.04) 100%);
            border: 1px solid rgba(139, 92, 246, 0.2);
            position: relative;
            overflow: hidden;
            animation: aipulse 3s ease-in-out infinite;
        }

        .ai-panel::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 1px;
            background: linear-gradient(90deg, transparent, rgba(139, 92, 246, 0.6), rgba(6, 182, 212, 0.4), transparent);
        }

        @keyframes aipulse {

            0%,
            100% {
                box-shadow: 0 0 20px rgba(139, 92, 246, 0.15);
            }

            50% {
                box-shadow: 0 0 40px rgba(139, 92, 246, 0.3), 0 0 80px rgba(139, 92, 246, 0.1);
            }
        }

        /* ── AI dots ── */
        .ai-dot {
            width: 6px;
            height: 6px;
            border-radius: 50%;
            animation: pulse-dot 1.5s ease-in-out infinite;
        }

        .ai-dot:nth-child(1) {
            background: #8b5cf6;
        }

        .ai-dot:nth-child(2) {
            background: #06b6d4;
            animation-delay: 0.2s;
        }

        .ai-dot:nth-child(3) {
            background: #8b5cf6;
            animation-delay: 0.4s;
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

        /* ── Gradient text ── */
        .grad-text {
            background: linear-gradient(135deg, #a78bfa, #38bdf8);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        /* ── Primary button ── */
        .btn-primary {
            background: linear-gradient(135deg, #7c3aed, #4f46e5);
            border: 1px solid rgba(139, 92, 246, 0.4);
            transition: all 0.2s;
        }

        .btn-primary:hover {
            box-shadow: 0 0 18px rgba(124, 58, 237, 0.4), 0 4px 16px rgba(0, 0, 0, 0.35);
            transform: translateY(-1px);
        }

        /* ── Ghost button ── */
        .btn-ghost {
            background: rgba(255, 255, 255, 0.04);
            border: 1px solid rgba(255, 255, 255, 0.07);
            transition: all 0.2s;
        }

        .btn-ghost:hover {
            background: rgba(255, 255, 255, 0.08);
        }

        /* ── Avatar ring ── */
        .avatar-ring {
            background: linear-gradient(135deg, #7c3aed, #06b6d4);
            padding: 2px;
            border-radius: 50%;
        }

        /* ── Notif dot ── */
        .notif-dot {
            background: #f43f5e;
            box-shadow: 0 0 7px rgba(244, 63, 94, 0.8);
        }

        /* ── Segment pills ── */
        .seg {
            padding: 3px 10px;
            border-radius: 99px;
            font-size: 11px;
            font-weight: 500;
            cursor: pointer;
            color: rgba(255, 255, 255, 0.35);
            border: 1px solid transparent;
            transition: all 0.2s;
        }

        .seg:hover {
            color: rgba(255, 255, 255, 0.65);
        }

        .seg.active {
            background: rgba(139, 92, 246, 0.15);
            color: #a78bfa;
            border-color: rgba(139, 92, 246, 0.25);
        }

        /* ── Inventory alert row ── */
        .inv-crit {
            background: rgba(239, 68, 68, 0.06);
            border: 1px solid rgba(239, 68, 68, 0.12);
            border-radius: 12px;
        }

        .inv-warn {
            background: rgba(245, 158, 11, 0.06);
            border: 1px solid rgba(245, 158, 11, 0.12);
            border-radius: 12px;
        }

        /* ── Bottom nav (mobile only) ── */
        .bottom-nav {
            background: rgba(13, 17, 23, 0.97);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-top: 1px solid rgba(255, 255, 255, 0.05);
        }

        /* ── Store selector ── */
        .store-sel {
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(255, 255, 255, 0.05);
            border-radius: 12px;
        }

        /* ── Product img ── */
        .prod-img {
            background: linear-gradient(135deg, rgba(139, 92, 246, 0.15), rgba(6, 182, 212, 0.1));
            border: 1px solid rgba(255, 255, 255, 0.06);
            border-radius: 12px;
            flex-shrink: 0;
        }

        /* ── Section heading ── */
        .sec-head {
            font-family: 'Syne', sans-serif;
            font-weight: 700;
            color: white;
        }

        /* ── Divider ── */
        hr.dim {
            border-color: rgba(255, 255, 255, 0.04);
        }

        /* ── Responsive table hidden cols ── */
        @media (max-width: 639px) {
            .hide-xs {
                display: none !important;
            }
        }

        @media (max-width: 767px) {
            .hide-sm {
                display: none !important;
            }
        }
    </style>
</head>

<body class="relative">


    <!-- ════════════════════════════ ROOT LAYOUT ════════════════════════════ -->
    <div class="relative z-15 flex h-screen overflow-hidden">
        <!-- ════════════════════════════ SIDEBAR ════════════════════════════ -->
        @includeif('admin.layouts.sidebar')


        <!-- Ambient orbs -->
        <div class="glow-orb glow-orb-1" aria-hidden="true"></div>
        <div class="glow-orb glow-orb-2" aria-hidden="true"></div>

        <!-- ════════════════════════════ OVERLAY ════════════════════════════ -->
        <div id="overlay" onclick="closeSidebar()"></div>
        <!-- ════════════════════════════ CONTENT AREA ════════════════════════════ -->
        <div class="flex-1 flex flex-col min-w-0 overflow-hidden">
            <!-- ════════════════════════════ TOPBAR ════════════════════════════ -->
            @includeIf('admin.layouts.header')


            @yield('content')
        </div>
        @includeIf('admin.layouts.bottom_navbar')


        <script>
            // ── Sidebar toggle ──
            function openSidebar() {
                document.getElementById('sidebar').classList.add('open');
                document.getElementById('overlay').classList.add('show');
                document.body.style.overflow = 'hidden';
            }

            function closeSidebar() {
                document.getElementById('sidebar').classList.remove('open');
                document.getElementById('overlay').classList.remove('show');
                document.body.style.overflow = '';
            }

            // ── Segment pill toggle ──
            document.querySelectorAll('.seg').forEach(btn => {
                btn.addEventListener('click', () => {
                    btn.closest('.flex').querySelectorAll('.seg').forEach(b => b.classList.remove('active'));
                    btn.classList.add('active');
                });
            });

            // ── Nav item click (sidebar) ──
            document.querySelectorAll('.nav-item').forEach(item => {
                item.addEventListener('click', () => {
                    document.querySelectorAll('.nav-item').forEach(i => i.classList.remove('active'));
                    item.classList.add('active');
                });
            });

            // ── Close sidebar on desktop resize ──
            window.addEventListener('resize', () => {
                if (window.innerWidth >= 1024) closeSidebar();
            });
        </script>
    </div>

</body>

</html>
