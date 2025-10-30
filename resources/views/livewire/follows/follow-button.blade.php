<?php

use Livewire\Volt\Component;
use App\Models\User;

new class extends Component {
    // 1. STATE (Input)
    // Menerima data $user dari luar
    public User $user;

    // 2. STATE (Internal)
    public bool $isFollowing;

    /**
     * 'mount' dijalankan saat komponen pertama kali dimuat
     */
    public function mount(): void
    {
        // Cek apakah user yang sedang login sudah follow user ini
        $this->isFollowing = auth()->user()->following()->where('following_user_id', $this->user->id)->exists();
    }

    /**
     * ACTION: Dipanggil oleh wire:click
     */
    public function toggleFollow(): void
    {
        // Cek apakah user sudah login
        if (!auth()->check()) {
            // Jika belum login, redirect ke halaman login
            $this->redirect(route('login'), navigate: true);
            return;
        }

        // Cegah user follow dirinya sendiri
        if (auth()->id() === $this->user->id) {
            return;
        }

        if ($this->isFollowing) {
            // --- PROSES UNFOLLOW ---
            auth()->user()->following()->detach($this->user->id);
            $this->isFollowing = false;
        } else {
            // --- PROSES FOLLOW ---
            auth()->user()->following()->attach($this->user->id);
            $this->isFollowing = true;
        }
    }
}; ?>

<!-- 3. VIEW (HTML) -->
<div>
    @if (auth()->id() !== $user->id)
        <button wire:click="toggleFollow"
            class="rounded-full px-6 py-2 font-semibold text-sm transition duration-200 {{ $isFollowing ? 'bg-zinc-200 text-zinc-900 hover:bg-zinc-300 dark:bg-zinc-700 dark:text-white dark:hover:bg-zinc-600' : 'bg-gradient-to-r from-pink-500 to-rose-500 text-white hover:from-pink-600 hover:to-rose-600' }}">
            {{ $isFollowing ? 'Mengikuti' : 'Ikuti' }}
        </button>
    @endif
</div>
