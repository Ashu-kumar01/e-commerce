<!-- ══════════════════ 1. CATEGORY MASTER ══════════════════ -->
<div class="glass p-5 md:p-6 flex flex-col gap-5">

    <!-- Card header -->
    <div class="flex items-center justify-between">
        <div class="flex items-center gap-3">
            <div class="mod-icon" style="background:rgba(139,92,246,0.14);border:1px solid rgba(139,92,246,0.22);">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" class="text-violet-400">
                    <path d="M4 6h16M4 10h16M4 14h8" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                </svg>
            </div>
            <div>
                <div class="sec-title">Category Master</div>
                <div class="sec-sub">Manage top-level categories</div>
            </div>
        </div>
        <span class="count-chip">12 total</span>
    </div>
    <form action="{{ route('admin.category.store') }}" method="post">
        @csrf

        {{-- {{ dd($category->id) }} --}}
        <input type="hidden" name="id" value="{{ optional($category)->id }}">
        <!-- Form -->
        <div class="card-form">
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 mb-3">
                <div>
                    <label class="lbl">Category Name <span class="text-rose-500">*</span></label>
                    <input type="text" class="inp" placeholder="e.g. Apparel" name="catName" id="catName"
                        value="{{ old('name', optional($category)->name) }}" oninput="autoSlug(this,'catSlug')">
                </div>
                <div>
                    <label class="lbl">Slug</label>
                    <input type="text" class="inp inp-mono" value="{{ old('catSlug', $category->slug ?? '') }}"
                        placeholder="apparel" name="catSlug" id="catSlug">
                </div>
            </div>
            <div class="mb-3">
                <label class="lbl">Description</label>
                <textarea class="inp resize-none" rows="2" name="description" placeholder="Short description of this category…">{{ old('description', $category->description ?? '') }}</textarea>
            </div>
            <div class="flex items-center justify-between">
                <label class="toggle-wrapper">
                    <input type="checkbox" name="status" class="toggle-input" value="1" checked>

                    <div class="tog">
                        <div class="tog-thumb"></div>
                    </div>

                    <span class="text-xs text-gray-400">Active</span>
                </label>
                <button type="submit"
                    class="btn-sm btn-primary text-xs py-2 px-4 sm:flex items-center gap-1.5 px-3 py-2 rounded-xl text-xs font-semibold text-white">

                    {{ $category->id == '' ? 'Add Category' : 'Update Category' }}
                </button>
            </div>
        </div>
    </form>
    <!-- Search + table -->
    <div>
        <div class="flex items-center justify-between mb-3">
            <span class="text-[11px] text-gray-500 font-medium">Category List</span>
            <div class="relative">
                <svg width="12" height="12" viewBox="0 0 24 24" fill="none"
                    class="absolute left-2.5 top-1/2 -translate-y-1/2 text-gray-600 pointer-events-none">
                    <circle cx="11" cy="11" r="8" stroke="currentColor" stroke-width="2" />
                    <path d="M21 21l-4.35-4.35" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                </svg>

            </div>
        </div>

        <div class="card-table">
            <table class="tbl">
                <thead>
                    <tr>
                        <th class="sort-th">Name <svg width="8" height="8" viewBox="0 0 24 24" fill="none"
                                class="inline ml-1 text-gray-700">
                                <path d="M8 9l4-4 4 4M16 15l-4 4-4-4" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" />
                            </svg></th>
                        <th class="hide-xs">Slug</th>
                        <th class="hide-xs">Description</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="catTableBody">

                    @foreach ($categories as $data)
                        <tr>
                            <td class="font-medium text-gray-200">{{ $data->name ?? '' }}</td>
                            <td class="font-mono text-[11px] text-violet-400/70 hide-xs">
                                {{ $data->slug ?? '' }}
                            </td>
                            <td class="font-medium text-gray-200">{{ $data->description ?? '' }}</td>
                            <td>
                                <span class="badge {{ ($data->status ?? 0) == 1 ? 'badge-on' : 'badge-off' }} ">
                                    {{ ($data->status ?? 0) == 1 ? 'Active' : 'Inactive' }}
                                </span>
                            </td>

                            <td>
                                <div class="flex gap-1.5">
                                    <a href="{{ route('admin.category.edit', $data->id) }}" class="act-btn act-edit"
                                        title="Edit">
                                        <svg width="12" height="12" viewBox="0 0 24 24" fill="none">
                                            <path d="M11 4H4a2 2 0 00-2 2v14a2 2 0 002 2h14a2 2 0 002-2v-7"
                                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path d="M18.5 2.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 9.5-9.5z"
                                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </svg>
                                    </a>
                                    <form action="{{ route('admin.category.delete', $data->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')

                                        <button class="act-btn act-del" title="Delete">
                                            🗑️
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
        {{ $categories->links() }}

    </div>
</div>
