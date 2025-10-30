<?php

use Livewire\Volt\Component;
use App\Models\User;
use Illuminate\Support\Collection;

new class extends Component {
    // 2. STATE (Properti)
    public User $user; // Diterima dari Route (Route-Model Binding)
    public int $postCount;
    public int $followersCount;
    public int $followingCount;
    public Collection $posts;

    /**
     * 'mount' akan dipanggil secara otomatis oleh Livewire.
     * Ia akan menerima $user dari route '/profile/{user:id}'
     */
    public function mount(User $user): void
    {
        $this->user = $user;

        // 3. LOGIC
        // Muat statistik jumlah dengan efisien menggunakan loadCount
        $this->user->loadCount(['posts', 'followers', 'following']);
        $this->postCount = $this->user->posts_count;
        $this->followersCount = $this->user->followers_count;
        $this->followingCount = $this->user->following_count;

        // Muat semua postingan milik user ini saja dengan eager loading
        $this->posts = $this->user->posts()->with('user')->latest()->get();
    }
}; ?>

<x-layouts.app :title="$user->name . ' - Profil'">
    <div class="min-h-screen bg-white dark:bg-zinc-950">
        <!-- Profile Header -->
        <div class="border-b border-zinc-200 dark:border-zinc-700">
            <div class="mx-auto max-w-4xl px-4 py-8">
                <!-- Profile Info Container -->
                <div class="flex flex-col sm:flex-row gap-8 items-start sm:items-center">
                    <!-- Avatar -->
                    <div
                        class="flex h-40 w-40 items-center justify-center rounded-full bg-gradient-to-br from-pink-500 to-rose-500 flex-shrink-0">
                        <span class="text-6xl font-bold text-white">
                            {{ $user->initials() }}
                        </span>
                    </div>

                    <!-- Profile Details -->
                    <div class="flex-1">
                        <div class="flex flex-col sm:flex-row sm:items-center gap-4 mb-4">
                            <div>
                                <h1 class="text-3xl font-bold text-zinc-900 dark:text-white">
                                    {{ $user->name }}
                                </h1>
                                <p class="text-zinc-600 dark:text-zinc-400">
                                    @{{ strtolower(str_replace(' ', '_', $user - > name)) }}
                                </p>
                            </div>

                            <!-- Follow/Edit Button -->
                            @if (auth()->id() !== $user->id)
                                <livewire:follows.follow-button :user="$user" />
                            @else
                                <a href="{{ route('profile.edit') }}" wire:navigate
                                    class="rounded-full border-2 border-zinc-300 px-8 py-2 font-semibold text-zinc-900 transition hover:bg-zinc-100 dark:border-zinc-600 dark:text-white dark:hover:bg-zinc-800">
                                    Edit Profil
                                </a>
                            @endif
                        </div>

                        <!-- Stats -->
                        <div class="flex gap-8">
                            <div>
                                <p class="text-2xl font-bold text-zinc-900 dark:text-white">
                                    {{ $postCount }}
                                </p>
                                <p class="text-sm text-zinc-600 dark:text-zinc-400">Postingan</p>
                            </div>
                            <div>
                                <p class="text-2xl font-bold text-zinc-900 dark:text-white">
                                    {{ $followersCount }}
                                </p>
                                <p class="text-sm text-zinc-600 dark:text-zinc-400">Pengikut</p>
                            </div>
                            <div>
                                <p class="text-2xl font-bold text-zinc-900 dark:text-white">
                                    {{ $followingCount }}
                                </p>
                                <p class="text-sm text-zinc-600 dark:text-zinc-400">Mengikuti</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Posts Section -->
        <div class="mx-auto max-w-4xl px-4 py-8">
            <h2 class="mb-6 text-2xl font-bold text-zinc-900 dark:text-white">
                Postingan
            </h2>

            @if ($user->posts()->count() > 0)
                <div class="space-y-4">
                    @foreach ($posts as $post)
                        <article
                            class="overflow-hidden rounded-2xl border border-zinc-200 bg-white shadow-sm transition hover:shadow-md dark:border-zinc-700 dark:bg-zinc-900">
                            <!-- Post Header -->
                            <div
                                class="flex items-center justify-between border-b border-zinc-200 p-4 dark:border-zinc-700">
                                <div class="flex items-center gap-3">
                                    <!-- User Avatar -->
                                    <div
                                        class="flex h-12 w-12 items-center justify-center rounded-full bg-gradient-to-br from-pink-500 to-rose-500 flex-shrink-0">
                                        <span class="text-sm font-bold text-white">
                                            {{ $post->user->initials() }}
                                        </span>
                                    </div>

                                    <!-- User Info -->
                                    <div>
                                        <a href="{{ route('profile', $post->user) }}" wire:navigate
                                            class="font-semibold text-zinc-900 hover:underline dark:text-white">
                                            {{ $post->user->name }}
                                        </a>
                                        <p class="text-xs text-zinc-500 dark:text-zinc-400">
                                            {{ $post->created_at->diffForHumans() }}
                                        </p>
                                    </div>
                                </div>

                                <!-- Action Menu (Edit/Delete) -->
                                @if (auth()->id() === $post->user_id)
                                    <div class="relative group">
                                        <button
                                            class="p-2 text-zinc-500 hover:bg-zinc-100 rounded-full dark:hover:bg-zinc-800">
                                            <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                                                <path
                                                    d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                            </svg>
                                        </button>

                                        <!-- Dropdown Menu -->
                                        <div
                                            class="absolute right-0 hidden group-hover:block bg-white dark:bg-zinc-800 rounded-lg shadow-lg border border-zinc-200 dark:border-zinc-700 z-10 w-32">
                                            <button wire:click="$parent.edit({{ $post->id }})"
                                                class="w-full text-left px-4 py-2 text-sm text-zinc-700 dark:text-zinc-300 hover:bg-zinc-100 dark:hover:bg-zinc-700 flex items-center gap-2">
                                                <svg class="h-4 w-4" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                </svg>
                                                Edit
                                            </button>
                                            <button wire:click="$parent.delete({{ $post->id }})"
                                                wire:confirm="Hapus postingan ini?"
                                                class="w-full text-left px-4 py-2 text-sm text-red-600 dark:text-red-400 hover:bg-red-50 dark:hover:bg-red-900/20 flex items-center gap-2 border-t border-zinc-200 dark:border-zinc-700">
                                                <svg class="h-4 w-4" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
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
                                <p
                                    class="text-base leading-relaxed text-zinc-900 dark:text-zinc-100 whitespace-pre-wrap break-words">
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
                                                d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                        </svg>
                                        <span class="text-sm font-medium">Bagikan</span>
                                    </button>
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>
            @else
                <div
                    class="rounded-2xl border-2 border-dashed border-zinc-200 bg-zinc-50 p-12 text-center dark:border-zinc-700 dark:bg-zinc-900/50">
                    <svg class="mx-auto h-16 w-16 text-zinc-400 dark:text-zinc-600 mb-4" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 11a7 7 0 01-7 7m0 0a7 7 0 01-7-7m7 7v4m0 0H8m4 0h4" />
                    </svg>
                    <p class="text-lg font-semibold text-zinc-900 dark:text-white mb-2">Belum ada postingan</p>
                    <p class="text-sm text-zinc-600 dark:text-zinc-400">{{ $user->name }} belum berbagi postingan</p>
                </div>
            @endif
        </div>
    </div>
</x-layouts.app>
