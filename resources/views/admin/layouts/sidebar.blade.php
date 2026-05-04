  <aside id="sidebar" class="flex flex-col h-full overflow-y-auto">

      <!-- Logo -->
      <div class="px-5 py-5 flex items-center gap-3 flex-shrink-0">
          <div class="w-8 h-8 rounded-xl flex items-center justify-center flex-shrink-0"
              style="background:linear-gradient(135deg,#7c3aed,#06b6d4);">
              <svg width="15" height="15" viewBox="0 0 24 24" fill="none">
                  <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5" stroke="white" stroke-width="2"
                      stroke-linecap="round" stroke-linejoin="round" />
              </svg>
          </div>
          <div>
              <div class="font-display font-bold text-white text-sm tracking-wide">NEXUS</div>
              <div class="text-[9px] text-gray-500 tracking-widest uppercase font-mono">Commerce OS</div>
          </div>
          <!-- Close on mobile -->
          <button onclick="closeSidebar()"
              class="ml-auto lg:hidden text-gray-500 hover:text-gray-300 p-1 rounded-lg btn-ghost">
              <svg width="14" height="14" viewBox="0 0 24 24" fill="none">
                  <path d="M18 6L6 18M6 6l12 12" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
              </svg>
          </button>
      </div>

      <!-- Store selector -->
      <div class="mx-3 mb-4 flex-shrink-0">
          <div
              class="store-sel flex items-center justify-between px-3 py-2.5 cursor-pointer hover:border-white/10 transition-colors">
              <div class="flex items-center gap-2">
                  <div class="w-6 h-6 rounded-lg flex items-center justify-center text-[9px] font-bold text-white"
                      style="background:linear-gradient(135deg,#7c3aed,#4f46e5);">S</div>
                  <div>
                      <div class="text-xs font-medium text-gray-200">Stellar Shop</div>
                      <div class="text-[10px] text-gray-500">Pro Plan</div>
                  </div>
              </div>
              <svg width="11" height="11" viewBox="0 0 24 24" fill="none" class="text-gray-500">
                  <path d="M6 9l6 6 6-6" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
              </svg>
          </div>
      </div>

      <!-- Nav -->
      <nav class="px-3 flex flex-col gap-0.5 flex-shrink-0">
          <div class="text-[9px] font-semibold text-gray-600 tracking-widest uppercase px-3 mb-1">Menu</div>
          <a href="{{ route('admin.dashboard') }}">
              <div class="nav-item active flex items-center gap-3 px-3 py-2.5">
                  <svg width="15" height="15" viewBox="0 0 24 24" fill="none"
                      class="text-violet-400 flex-shrink-0">
                      <rect x="3" y="3" width="7" height="7" rx="1" stroke="currentColor"
                          stroke-width="2" />
                      <rect x="14" y="3" width="7" height="7" rx="1" stroke="currentColor"
                          stroke-width="2" />
                      <rect x="3" y="14" width="7" height="7" rx="1" stroke="currentColor"
                          stroke-width="2" />
                      <rect x="14" y="14" width="7" height="7" rx="1" stroke="currentColor"
                          stroke-width="2" />
                  </svg>
                  <span class="text-xs font-medium text-gray-200">Dashboard</span>
              </div>
          </a>
          <a href="{{ route('admin.ordered') }}">
              <div class="nav-item flex items-center gap-3 px-3 py-2.5">
                  <svg width="15" height="15" viewBox="0 0 24 24" fill="none"
                      class="text-gray-500 flex-shrink-0">
                      <path
                          d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"
                          stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                  </svg>
                  <span class="text-xs font-medium text-gray-500">Orders</span>
                  <span
                      class="ml-auto text-[10px] font-mono bg-violet-500/20 text-violet-300 px-1.5 py-0.5 rounded-md">24</span>
              </div>
          </a>
          <a href="{{ route('admin.category.index') }}">
              <div class="nav-item flex items-center gap-3 px-3 py-2.5">
                  <svg width="15" height="15" viewBox="0 0 24 24" fill="none"
                      class="text-gray-500 flex-shrink-0">
                      <path d="M20 7H4a2 2 0 00-2 2v10a2 2 0 002 2h16a2 2 0 002-2V9a2 2 0 00-2-2z" stroke="currentColor"
                          stroke-width="2" />
                      <path d="M16 3H8l-2 4h12l-2-4z" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                  </svg>
                  <span class="text-xs font-medium text-gray-500">Category & Brand</span>
              </div>
          </a>
          <a href="{{ route('admin.subcategory.index') }}">
              <div class="nav-item flex items-center gap-3 px-3 py-2.5">
                  <svg width="15" height="15" viewBox="0 0 24 24" fill="none"
                      class="text-gray-500 flex-shrink-0">
                      <path d="M20 7H4a2 2 0 00-2 2v10a2 2 0 002 2h16a2 2 0 002-2V9a2 2 0 00-2-2z"
                          stroke="currentColor" stroke-width="2" />
                      <path d="M16 3H8l-2 4h12l-2-4z" stroke="currentColor" stroke-width="2"
                          stroke-linecap="round" />
                  </svg>
                  <span class="text-xs font-medium text-gray-500">Sub-Category</span>
              </div>
          </a>
          <a href="{{ route('admin.addproduct.index') }}">
              <div class="nav-item flex items-center gap-3 px-3 py-2.5">
                  <svg width="15" height="15" viewBox="0 0 24 24" fill="none"
                      class="text-gray-500 flex-shrink-0">
                      <path d="M20 7H4a2 2 0 00-2 2v10a2 2 0 002 2h16a2 2 0 002-2V9a2 2 0 00-2-2z"
                          stroke="currentColor" stroke-width="2" />
                      <path d="M16 3H8l-2 4h12l-2-4z" stroke="currentColor" stroke-width="2"
                          stroke-linecap="round" />
                  </svg>
                  <span class="text-xs font-medium text-gray-500">Products</span>
              </div>
          </a>
          <a href="{{ route('admin.brand.index') }}">
              <div class="nav-item flex items-center gap-3 px-3 py-2.5">
                  <svg width="15" height="15" viewBox="0 0 24 24" fill="none"
                      class="text-gray-500 flex-shrink-0">
                      <path d="M20 7H4a2 2 0 00-2 2v10a2 2 0 002 2h16a2 2 0 002-2V9a2 2 0 00-2-2z"
                          stroke="currentColor" stroke-width="2" />
                      <path d="M16 3H8l-2 4h12l-2-4z" stroke="currentColor" stroke-width="2"
                          stroke-linecap="round" />
                  </svg>
                  <span class="text-xs font-medium text-gray-500">Brand Master</span>
              </div>
          </a>

          <div class="nav-item flex items-center gap-3 px-3 py-2.5">
              <svg width="15" height="15" viewBox="0 0 24 24" fill="none"
                  class="text-gray-500 flex-shrink-0">
                  <path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2M9 11a4 4 0 100-8 4 4 0 000 8z" stroke="currentColor"
                      stroke-width="2" stroke-linecap="round" />
              </svg>
              <span class="text-xs font-medium text-gray-500">Customers</span>
          </div>

          <div class="nav-item flex items-center gap-3 px-3 py-2.5">
              <svg width="15" height="15" viewBox="0 0 24 24" fill="none"
                  class="text-gray-500 flex-shrink-0">
                  <path d="M18 20V10M12 20V4M6 20v-6" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                      stroke-linejoin="round" />
              </svg>
              <span class="text-xs font-medium text-gray-500">Analytics</span>
          </div>

          <div class="nav-item flex items-center gap-3 px-3 py-2.5">
              <svg width="15" height="15" viewBox="0 0 24 24" fill="none"
                  class="text-gray-500 flex-shrink-0">
                  <circle cx="12" cy="12" r="3" stroke="currentColor" stroke-width="2" />
                  <path
                      d="M12 1v4M12 19v4M4.22 4.22l2.83 2.83M16.95 16.95l2.83 2.83M1 12h4M19 12h4M4.22 19.78l2.83-2.83M16.95 7.05l2.83-2.83"
                      stroke="currentColor" stroke-width="2" stroke-linecap="round" />
              </svg>
              <span class="text-xs font-medium text-gray-500">Settings</span>
          </div>

          <hr class="dim my-3">
          <div class="text-[9px] font-semibold text-gray-600 tracking-widest uppercase px-3 mb-1">Integrations
          </div>

          <div class="nav-item flex items-center gap-3 px-3 py-2.5">
              <svg width="15" height="15" viewBox="0 0 24 24" fill="none"
                  class="text-gray-500 flex-shrink-0">
                  <rect x="3" y="11" width="18" height="11" rx="2" stroke="currentColor"
                      stroke-width="2" />
                  <path d="M7 11V7a5 5 0 0110 0v4" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
              </svg>
              <span class="text-xs font-medium text-gray-500">Marketplace</span>
          </div>
      </nav>

      <!-- Sidebar footer -->
      <div class="mt-auto p-4 flex-shrink-0">
          <div class="p-3 rounded-xl mb-3"
              style="background:linear-gradient(135deg,rgba(139,92,246,0.1),rgba(6,182,212,0.05));border:1px solid rgba(139,92,246,0.15);">
              <div class="text-[10px] font-semibold text-violet-300 mb-1">Storage</div>
              <div class="text-[10px] text-gray-500 mb-2">14.2 GB of 20 GB</div>
              <div class="prog-track h-1.5">
                  <div class="prog-fill" style="width:71%"></div>
              </div>
          </div>
          <div class="flex items-center gap-2 px-1">
              <a href="{{ route('admin.profile') }}">
                  <div class="avatar-ring flex-shrink-0">
                      <div
                          class="w-7 h-7 rounded-full bg-gradient-to-br from-violet-400 to-cyan-400 flex items-center justify-center text-[10px] font-bold text-white">
                          AR</div>
                  </div>
                  <div class="flex-1 min-w-0">
                      <div class="text-xs font-medium text-gray-300 truncate">{{ Auth::user()->name }}</div>
                      <div class="text-[10px] text-gray-600">Admin</div>
                  </div>
              </a>

              <a href="{{ route('admin.logout') }}">
                  <svg width="13" height="13" viewBox="0 0 24 24" fill="none"
                      class="text-gray-600 flex-shrink-0">
                      <path d="M9 21H5a2 2 0 01-2-2V5a2 2 0 012-2h4M16 17l5-5-5-5M21 12H9" stroke="currentColor"
                          stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                  </svg>
              </a>
              
          </div>
      </div>
  </aside>
