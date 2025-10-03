<?php

use App\Livewire\BoardIndex;
use App\Livewire\CreateBoard;
use App\Livewire\ShowBoard;
use App\Livewire\ShowThread;
use Illuminate\Support\Facades\Route;

Route::get('/', BoardIndex::class)->name('home');

Route::get('/create-board', CreateBoard::class)->name('board.create');

Route::get('/{board:board_url}', ShowBoard::class)->name('board.show');

Route::get('/{board:board_url}/thread/{thread}', ShowThread::class)->name('thread.show');
