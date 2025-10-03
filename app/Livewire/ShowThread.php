<?php

namespace App\Livewire;

use App\Events\PostCreated;
use App\Models\Board;
use App\Models\Thread;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\Attributes\Rule;

#[Layout('components.layouts.main')]
class ShowThread extends Component
{
    public Board $board;
    public Thread $thread;

    #[Rule('required|min:3')]
    public string $replyContent = '';

    public function mount(Board $board, Thread $thread)
    {
        $this->board = $board;
        $this->thread = $thread;
    }

    public function newPost()
    {
        $this->validate([
            'replyContent' => 'required|min:3',
        ]);

        $post = $this->thread->posts()->create([
            'content' => $this->replyContent,
        ]);

        $this->thread->touch();

        broadcast(new PostCreated($post))->toOthers();

        $this->reset('replyContent');
    }

    #[On('echo:thread.{thread.id},post.created')]
    public function refreshPosts()
    {
    }

    public function render()
    {
        $posts = $this->thread->posts()->get();

        return view('livewire.show-thread', [
            'posts' => $posts,
        ]);
    }
}