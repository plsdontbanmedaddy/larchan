<?php

namespace Database\Seeders;

use App\Models\Board;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Board::create([
            'board_name' => 'Random',
            'board_url' => 'b',
        ]);

        Board::create([
            'board_name' => 'Politically Incorrect',
            'board_url' => 'pol',
        ]);
    }
}