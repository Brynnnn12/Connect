<?php

namespace App\Livewire\Posts;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class PostModal extends Component
{
    public $postId, $content, $showModal = false;

    protected $listeners = ['editPost' => 'loadPost', 'openCreateModal' => 'openModal'];

    public function mount()
    {
        $this->resetForm();
    }

    public function loadPost($id)
    {
        $post = Post::findOrFail($id);

        $this->postId = $post->id;
        $this->content = $post->content;
        $this->showModal = true;
    }

    public function openModal()
    {
        $this->resetForm();
        $this->showModal = true;
    }


    public function save()
    {
        $this->validate([
            'content' => 'required|min:3|max:2000',
        ]);

        if ($this->postId) {
            // Update existing post
            Post::where('id', $this->postId)->update([
                'content' => $this->content,
            ]);

            $this->dispatch('postUpdated');
            session()->flash('message', 'Postingan berhasil diperbarui!');
        } else {
            // Create new post
            Post::create([
                'user_id' => Auth::id(),
                'content' => $this->content,
            ]);

            $this->dispatch('postCreated');
            session()->flash('message', 'Postingan berhasil dibuat!');
        }

        $this->resetForm();
    }

    public function resetForm()
    {
        $this->postId = null;
        $this->content = "";
        $this->showModal = false;
    }

    public function render()
    {
        return view('livewire.posts.post-modal');
    }
}
