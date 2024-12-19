<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Comment;


class Comments extends Component
{
    public $newComment;
    public $post;

    public function mount($post)
    {
        $this->post = $post;
    }

    public function addComment() 
    {
        $this->validate([
            'newComment' => 'required|max:255',
        ]);

        $comment = Comment::create([
            'comment' => $this->newComment,
            'user_id' => auth()->id(),
            'post_id' => $this->post->id,
        ]);

        $this->reset(['newComment']);  // Reset only the newComment field
    }

    public function render()
    {
        $comments = $this->post->comments;

        return view('livewire.comments', ['comments' => $comments]);
    }
}
