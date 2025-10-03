<?php

namespace App\Livewire;

use App\Models\Board;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\Component;

#[Layout('components.layouts.main')]
class CreateBoard extends Component
{
    #[Rule('required|min:3|max:50')]
    public string $board_name = '';

    #[Rule('required|min:1|max:10|alpha_dash|unique:boards,board_url')]
    public string $board_url = '';

    public function save()
    {
        $this->validate();

        Board::create([
            'board_name' => $this->board_name,
            'board_url' => $this->board_url,
        ]);

        return $this->redirect(route('home'), navigate: true);
    }

    public function render()
    {
        return view('livewire.create-board');
    }
}