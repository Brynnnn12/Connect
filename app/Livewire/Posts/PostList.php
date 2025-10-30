<?php

namespace App\Livewire\Posts;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class PostList extends Component
{
    protected $listeners = ['postCreated' => 'loadPosts', 'postUpdated' => 'loadPosts'];

    public function edit($id)
    {
        $this->dispatch('editPost', $id);
    }

    public function delete($id)
    {
        $post = Post::findOrFail($id);

        // Cek apakah user adalah pemilik post
        if (Auth::id() !== $post->user_id) {
            session()->flash('error', 'Anda tidak bisa menghapus postingan orang lain!');
            return;
        }

        $post->delete();
        session()->flash('message', 'Postingan berhasil dihapus!');
        $this->dispatch('postUpdated');
    }

    public function render()
    {
        return view('livewire.posts.post-list', [
            'posts' => Post::with('user')
                ->latest()
                ->get()
        ]);
    }
}
