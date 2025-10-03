<?php

namespace App\Livewire;

use App\Models\Board;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.main')]
class BoardIndex extends Component
{
    public function render()
    {
        return view('livewire.board-index', [
            'boards' => Board::all(),
        ]);
    }
}