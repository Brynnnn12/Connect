<x-layouts.app :title="__('Dashboard')">
    <div class="min-h-screen bg-white dark:bg-zinc-950">
        <!-- Main Container -->
        <div class="mx-auto max-w-6xl px-4 py-6">
            <!-- Header Section -->
            <div class="mb-8">
                <h1 class="text-4xl font-bold text-zinc-900 dark:text-white">
                    Beranda
                </h1>
                <p class="mt-2 text-zinc-600 dark:text-zinc-400">
                    Terhubung dengan teman-teman Anda
                </p>
            </div>

            <!-- Grid Layout -->
            <div class="grid grid-cols-1 gap-8 lg:grid-cols-3">
                <!-- Main Feed (Left + Center) -->
                <div class="lg:col-span-2 space-y-6">
                    <!-- Create Post Card -->
                    <div
                        class="overflow-hidden rounded-2xl border border-zinc-200 bg-white shadow-sm dark:border-zinc-700 dark:bg-zinc-900">
                        <!-- User Info Bar -->
                        <div class="flex items-center gap-4 border-b border-zinc-200 p-4 dark:border-zinc-700">
                            <div
                                class="flex h-12 w-12 items-center justify-center rounded-full bg-gradient-to-br from-pink-500 to-rose-500 flex-shrink-0">
                                <span class="text-sm font-bold text-white">
                                    {{ auth()->user()->name[0] ?? 'U' }}
                                </span>
                            </div>
                            <button onclick="Livewire.dispatch('openCreateModal')"
                                class="flex-1 rounded-full bg-zinc-100 px-4 py-3 text-left text-zinc-500 transition hover:bg-zinc-200 dark:bg-zinc-800 dark:text-zinc-400 dark:hover:bg-zinc-700">
                                Apa yang sedang Anda pikirkan, {{ auth()->user()->name }}?
                            </button>
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex items-center justify-around border-t border-zinc-200 p-4 dark:border-zinc-700">
                            <button onclick="Livewire.dispatch('openCreateModal')"
                                class="flex items-center gap-2 rounded-lg px-4 py-2 text-zinc-600 transition hover:bg-zinc-100 dark:text-zinc-400 dark:hover:bg-zinc-800">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                <span class="font-medium">Foto/Video</span>
                            </button>
                            <button onclick="Livewire.dispatch('openCreateModal')"
                                class="flex items-center gap-2 rounded-lg px-4 py-2 text-zinc-600 transition hover:bg-zinc-100 dark:text-zinc-400 dark:hover:bg-zinc-800">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span class="font-medium">Perasaan/Aktivitas</span>
                            </button>
                        </div>

                        <!-- Hidden Create Post Button -->
                        <button id="create-post" style="display: none;"></button>
                    </div>

                    <!-- Post List -->
                    <livewire:posts.post-list />
                </div>

                <!-- Right Sidebar -->
                <div class="hidden lg:block">
                    <!-- Search Box -->
                    <div class="sticky top-20 space-y-6">
                        <div class="relative">
                            <input type="text" placeholder="🔍 Cari teman..."
                                class="w-full rounded-full border-0 bg-zinc-100 px-4 py-3 placeholder-zinc-500 focus:bg-zinc-50 focus:ring-2 focus:ring-pink-500 dark:bg-zinc-800 dark:text-white dark:placeholder-zinc-400 dark:focus:bg-zinc-700" />
                        </div>

                        <!-- Suggested Users -->
                        <div
                            class="overflow-hidden rounded-2xl border border-zinc-200 bg-white shadow-sm dark:border-zinc-700 dark:bg-zinc-900">
                            <div class="border-b border-zinc-200 p-4 dark:border-zinc-700">
                                <h3 class="text-xl font-bold text-zinc-900 dark:text-white">
                                    Orang yang Mungkin Anda Kenal
                                </h3>
                            </div>

                            <div class="divide-y divide-zinc-200 space-y-0 dark:divide-zinc-700">
                                @foreach (auth()->user()->where('id', '!=', auth()->id())->limit(5)->get() as $user)
                                    <a wire:navigate href="{{ route('profile', $user) }}"
                                        class="flex items-center justify-between px-4 py-3 hover:bg-zinc-50 dark:hover:bg-zinc-800 transition">
                                        <div class="flex items-center gap-2">
                                            <div
                                                class="flex h-10 w-10 items-center justify-center rounded-full bg-gradient-to-br from-pink-500 to-rose-500">
                                                <span
                                                    class="text-xs font-bold text-white">{{ $user->name[0] ?? 'U' }}</span>
                                            </div>
                                            <div>
                                                <p class="font-semibold text-zinc-900 text-sm dark:text-white">
                                                    {{ $user->name }}</p>
                                            </div>
                                        </div>
                                        <!-- Follow Button Component -->
                                        <livewire:follows.follow-button :user="$user" />
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Livewire Modal -->
    <livewire:posts.post-modal />
</x-layouts.app>
