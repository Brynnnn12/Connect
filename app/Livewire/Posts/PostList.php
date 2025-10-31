<?php

namespace App\Livewire\Posts;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Attributes\On;

class PostList extends Component
{
    protected $listeners = ['postCreated' => '$refresh', 'postUpdated' => '$refresh', 'postDeleted' => '$refresh'];

    public function edit($id)
    {
        $this->dispatch('editPost', $id);
    }

    public function delete($id)
    {
        $post = Post::find($id);

        if (!$post) {
            session()->flash('error', 'Postingan tidak ditemukan atau sudah dihapus!');
            return;
        }

        if (Auth::id() !== $post->user_id) {
            session()->flash('error', 'Anda tidak bisa menghapus postingan orang lain!');
            return;
        }

        $post->delete();
        session()->flash('message', 'Postingan berhasil dihapus!');
        $this->dispatch('postDeleted');
    }

    public function render()
    {
        // Ambil data terbaru SETIAP KALI render
        $posts = Post::with(['user'])
            ->withCount('likes')
            ->latest()
            ->get();

        return view('livewire.posts.post-list', [
            'posts' => $posts // Mengirim data terbaru
        ]);
    }
}
