<?php

namespace App\Livewire\Likes;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class LikeButton extends Component
{
    public Post $post;
    public int $likeCount;
    public bool $isLiked;

    public function mount(): void
    {
        // Pastikan user login
        if (!Auth::check()) {
            $this->isLiked = false;
            $this->likeCount = $this->post->likes_count ?? $this->post->likes()->count();
            return;
        }

        // Cek apakah user yang sedang login sudah me-like post ini
        $this->isLiked = Auth::user()->likes()->where('post_id', $this->post->id)->exists();

        // Hitung total like untuk post ini
        $this->likeCount = $this->post->likes_count ?? $this->post->likes()->count();
    }

    public function toggleLike(): void
    {
        // Cek apakah user sudah login
        if (!Auth::check()) {
            // Jika belum login, redirect ke halaman login
            $this->redirect(route('login'), navigate: true);
            return;
        }

        if ($this->isLiked) {
            // --- PROSES UNLIKE ---
            Auth::user()->likes()->detach($this->post->id);
            $this->isLiked = false;
            $this->likeCount--;
        } else {
            // --- PROSES LIKE ---
            // Gunakan syncWithoutDetaching untuk menghindari duplicate key error
            Auth::user()->likes()->syncWithoutDetaching($this->post->id);
            $this->isLiked = true;
            $this->likeCount++;
        }
    }

    public function render()
    {
        return view('livewire.likes.like-button');
    }
}
