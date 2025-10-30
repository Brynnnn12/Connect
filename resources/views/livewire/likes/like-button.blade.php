<?php

use Livewire\Volt\Component;
use App\Models\Post;

new class extends Component {
    // 1. STATE (Input)
    // Menerima data $post dari luar
    public Post $post;

    // 2. STATE (Internal)
    public int $likeCount;
    public bool $isLiked;

    /**
     * 'mount' dijalankan saat komponen pertama kali dimuat
     */
    public function mount(): void
    {
        // Cek apakah user yang sedang login sudah me-like post ini
        $this->isLiked = auth()->user()->likes()->where('post_id', $this->post->id)->exists();

        // Hitung total like untuk post ini
        $this->likeCount = $this->post->likes()->count();
    }

    /**
     * ACTION: Dipanggil oleh wire:click
     */
    public function toggleLike(): void
    {
        // Cek apakah user sudah login
        if (!auth()->check()) {
            // Jika belum login, redirect ke halaman login
            $this->redirect(route('login'), navigate: true);
            return;
        }

        if ($this->isLiked) {
            // --- PROSES UNLIKE ---
            auth()->user()->likes()->detach($this->post->id);
            $this->isLiked = false;
            $this->likeCount--;
        } else {
            // --- PROSES LIKE ---
            auth()->user()->likes()->attach($this->post->id);
            $this->isLiked = true;
            $this->likeCount++;
        }
    }
}; ?>

<!-- 3. VIEW (HTML) -->
<div>
    <button wire:click="toggleLike" class="flex items-center space-x-2 group">
        <!-- Tampilkan ikon hati (SVG) -->
        <svg class="w-5 h-5 transition-all duration-150 {{ $isLiked ? 'text-red-600 group-hover:text-red-500' : 'text-gray-500 group-hover:text-red-600' }}"
            fill="{{ $isLiked ? 'currentColor' : 'none' }}" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
        </svg>

        <!-- Tampilkan jumlah like -->
        <span class="text-sm font-medium {{ $isLiked ? 'text-red-600' : 'text-gray-500' }}">
            {{ $likeCount }}
        </span>
    </button>
</div>
