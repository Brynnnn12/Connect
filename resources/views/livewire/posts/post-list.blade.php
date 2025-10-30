<div class="mx-auto max-w-2xl space-y-4 p-4 lg:p-0">
    <!-- Status Flash Messages -->
    @if (session()->has('message'))
        <div
            class="rounded-lg border-l-4 border-green-500 bg-green-50 p-4 text-green-700 dark:bg-green-900/20 dark:text-green-400">
            <p class="font-medium">✅ {{ session('message') }}</p>
        </div>
    @endif

    @if (session()->has('error'))
        <div
            class="rounded-lg border-l-4 border-red-500 bg-red-50 p-4 text-red-700 dark:bg-red-900/20 dark:text-red-400">
            <p class="font-medium">❌ {{ session('error') }}</p>
        </div>
    @endif

    <!-- Posts Feed -->
    @forelse($posts as $post)
        <article
            class="overflow-hidden rounded-2xl border border-zinc-200 bg-white shadow-sm transition hover:shadow-md dark:border-zinc-700 dark:bg-zinc-900">
            <!-- Post Header -->
            <div class="flex items-center justify-between border-b border-zinc-200 p-4 dark:border-zinc-700">
                <div class="flex items-center gap-3">
                    <!-- User Avatar -->
                    <div
                        class="flex h-12 w-12 items-center justify-center rounded-full bg-gradient-to-br from-pink-500 to-rose-500 flex-shrink-0">
                        <span class="text-sm font-bold text-white">
                            {{ $post->user->name[0] ?? 'U' }}
                        </span>
                    </div>

                    <!-- User Info -->
                    <div>
                        <p class="font-semibold text-zinc-900 dark:text-white">
                            {{ $post->user->name }}
                        </p>
                        <div class="text-xs text-zinc-500 dark:text-zinc-400">
                            {{ $post->created_at->diffForHumans() }}
                        </div>
                    </div>
                </div>

                <!-- Action Menu (Edit/Delete) -->
                @if (auth()->id() === $post->user_id)
                    <div class="relative group">
                        <button class="p-2 text-zinc-500 hover:bg-zinc-100 rounded-full dark:hover:bg-zinc-800">
                            <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                            </svg>
                        </button>

                        <!-- Dropdown Menu -->
                        <div
                            class="absolute right-0 hidden group-hover:block bg-white dark:bg-zinc-800 rounded-lg shadow-lg border border-zinc-200 dark:border-zinc-700 z-10 w-32">
                            <button wire:click="edit({{ $post->id }})"
                                class="w-full text-left px-4 py-2 text-sm text-zinc-700 dark:text-zinc-300 hover:bg-zinc-100 dark:hover:bg-zinc-700 flex items-center gap-2">
                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                                Edit
                            </button>
                            <button wire:click="delete({{ $post->id }})" wire:confirm="Hapus postingan ini?"
                                class="w-full text-left px-4 py-2 text-sm text-red-600 dark:text-red-400 hover:bg-red-50 dark:hover:bg-red-900/20 flex items-center gap-2 border-t border-zinc-200 dark:border-zinc-700">
                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                                Hapus
                            </button>
                        </div>
                    </div>
                @endif
            </div>

            <!-- Post Content -->
            <div class="p-4">
                <p class="text-base leading-relaxed text-zinc-900 dark:text-zinc-100 whitespace-pre-wrap break-words">
                    {{ $post->content }}
                </p>
                <p class="mt-3 text-xs text-zinc-500 dark:text-zinc-400">
                    {{ $post->created_at->format('d M Y, H:i') }}
                </p>
            </div>

            <!-- Post Actions -->
            <div class="border-t border-zinc-200 px-4 py-3 dark:border-zinc-700">
                <div class="flex items-center justify-around text-zinc-600 dark:text-zinc-400">
                    <!-- Like Button Component -->
                    <livewire:likes.like-button :post="$post" />

                    <button
                        class="flex items-center gap-2 rounded-lg px-3 py-2 hover:bg-zinc-100 dark:hover:bg-zinc-800 transition">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                        </svg>
                        <span class="text-sm font-medium">Komentar</span>
                    </button>
                    <button
                        class="flex items-center gap-2 rounded-lg px-3 py-2 hover:bg-zinc-100 dark:hover:bg-zinc-800 transition">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                        </svg>
                        <span class="text-sm font-medium">Bagikan</span>
                    </button>
                </div>
            </div>
        </article>
    @empty
        <!-- Empty State -->
        <div
            class="rounded-2xl border-2 border-dashed border-zinc-200 bg-zinc-50 p-12 text-center dark:border-zinc-700 dark:bg-zinc-900/50">
            <svg class="mx-auto h-16 w-16 text-zinc-400 dark:text-zinc-600 mb-4" fill="none" stroke="currentColor"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M19 11a7 7 0 01-7 7m0 0a7 7 0 01-7-7m7 7v4m0 0H8m4 0h4" />
            </svg>
            <p class="text-lg font-semibold text-zinc-900 dark:text-white mb-2">Belum ada postingan</p>
            <p class="text-sm text-zinc-600 dark:text-zinc-400 mb-6">Jadilah yang pertama membagikan sesuatu!</p>
            <livewire:posts.post-modal />
        </div>
    @endforelse
</div>
