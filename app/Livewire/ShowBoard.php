<?php

namespace App\Livewire;

use App\Models\Board;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\Attributes\Rule;
use Livewire\WithPagination;

#[Layout('components.layouts.main')]
class ShowBoard extends Component
{
    use WithPagination;

    public Board $board;

    #[Rule('required|min:3|max:255')]
    public string $title = '';

    #[Rule('required|min:3')]
    public string $content = '';

    public function mount(Board $board)
    {
        $this->board = $board;
    }

    public function newThread()
    {
        $this->validate();

        $thread = $this->board->threads()->create([
            'title' => $this->title,
            'content' => $this->content,
        ]);

        $this->reset(['title', 'content']);

        return $this->redirect(route('thread.show', ['board' => $this->board->board_url, 'thread' => $thread]), navigate: true);
    }

    public function render()
    {
        $threads = $this->board->threads()->withCount('posts')->latest('updated_at')->paginate(10);

        return view('livewire.show-board', [
            'threads' => $threads,
        ]);
    }
}