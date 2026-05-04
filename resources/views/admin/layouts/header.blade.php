 <header class="topbar flex items-center gap-3 px-4 md:px-6 py-3 flex-shrink-0">

     <!-- Hamburger (mobile/tablet) -->
     <button onclick="openSidebar()" class="btn-ghost p-2 rounded-xl lg:hidden flex-shrink-0">
         <svg width="16" height="16" viewBox="0 0 24 24" fill="none" class="text-gray-400">
             <path d="M3 12h18M3 6h18M3 18h18" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
         </svg>
     </button>

     <!-- Logo mobile -->
     <div class="flex items-center gap-2 lg:hidden flex-shrink-0">
         <div class="w-7 h-7 rounded-lg flex items-center justify-center"
             style="background:linear-gradient(135deg,#7c3aed,#06b6d4);">
             <svg width="13" height="13" viewBox="0 0 24 24" fill="none">
                 <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5" stroke="white" stroke-width="2"
                     stroke-linecap="round" stroke-linejoin="round" />
             </svg>
         </div>
         <span class="font-display font-bold text-white text-sm tracking-wide">NEXUS</span>
     </div>

     <!-- Page title (desktop) -->
     <div class="hidden lg:block flex-shrink-0">
         <h1 class="sec-head text-base tracking-tight">Overview</h1>
         <p class="text-[10px] text-gray-500">Sunday, Mar 29, 2026</p>
     </div>

     <!-- Search (tablet+) -->
     <div class="hidden sm:flex flex-1 max-w-xs md:max-w-sm mx-2 md:mx-4">
         <div class="relative w-full">
             <svg width="12" height="12" viewBox="0 0 24 24" fill="none"
                 class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-500 pointer-events-none">
                 <circle cx="11" cy="11" r="8" stroke="currentColor" stroke-width="2" />
                 <path d="M21 21l-4.35-4.35" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
             </svg>
             <input type="text" placeholder="Search…"
                 class="search-box w-full text-xs text-gray-300 placeholder-gray-600 pl-8 pr-4 py-2 rounded-xl font-sans">
         </div>
     </div>

     <!-- Right actions -->
     <div class="flex items-center gap-2 ml-auto flex-shrink-0">
         <!-- Add product (tablet+) -->
         <button onclick="window.location.href='{{ route('admin.product') }}'"
             class="btn-primary hidden sm:flex items-center gap-1.5 px-3 py-2 rounded-xl text-xs font-semibold text-white">
             <svg width="11" height="11" viewBox="0 0 24 24" fill="none">
                 <path d="M12 5v14M5 12h14" stroke="white" stroke-width="2.5" stroke-linecap="round" />
             </svg>
             <span class="hidden md:inline">Add Product</span>
             <span class="md:hidden">Add</span>
         </button>

         <!-- Notif bell -->
         <button class="relative btn-ghost p-2 rounded-xl">
             <svg width="15" height="15" viewBox="0 0 24 24" fill="none" class="text-gray-400">
                 <path d="M18 8A6 6 0 006 8c0 7-3 9-3 9h18s-3-2-3-9M13.73 21a2 2 0 01-3.46 0" stroke="currentColor"
                     stroke-width="2" stroke-linecap="round" />
             </svg>
             <span class="notif-dot absolute top-1.5 right-1.5 w-1.5 h-1.5 rounded-full"></span>
         </button>

         <!-- Avatar -->
         <a href="{{ route('admin.profile') }}">
             <div class="avatar-ring cursor-pointer">
                 <div
                     class="w-8 h-8 rounded-full bg-gradient-to-br from-violet-400 to-cyan-400 flex items-center justify-center text-xs font-bold text-white">
                     AR</div>
             </div>
         </a>
     </div>
 </header>
