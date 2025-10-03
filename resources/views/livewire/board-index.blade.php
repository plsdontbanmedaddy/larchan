<div class="max-w-4xl mx-auto py-8">
    <h1 class="text-3xl font-bold text-center mb-6">Larachan Boards</h1>

    <div class="bg-white text-black p-6 rounded-lg shadow-md">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-2xl font-semibold">Board List</h2>
            <a href="{{ route('board.create') }}" wire:navigate class="bg-blue-600 text-white font-bold py-2 px-4 rounded-md hover:bg-blue-700">
                Create Board
            </a>
        </div>
        <ul class="list-disc pl-5 space-y-2">
            @foreach ($boards as $board)
                <li>
                    <a href="{{ route('board.show', $board->board_url) }}" class="text-blue-800 hover:underline font-bold" wire:navigate>
                        /{{ $board->board_url }}/ - {{ $board->board_name }}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</div>