<div class="max-w-2xl mx-auto py-12">
    <a href="{{ route('home') }}" wire:navigate class="hover:underline mb-6 block">&larr; Back to Board List</a>
    <div class="bg-white text-black p-6 rounded-lg shadow-md border border-gray-300">
        <h1 class="text-2xl font-bold mb-6">Create a New Board</h1>
        <form wire:submit="save" class="space-y-4">
            <div>
                <label for="board_name" class="block font-medium">Board Name</label>
                <input type="text" id="board_name" wire:model="board_name" class="w-full mt-1 p-2 border border-gray-400 rounded-md shadow-sm">
                @error('board_name') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
            </div>
            <div>
                <label for="board_url" class="block font-medium">Board URL (e.g., "g", "tech")</label>
                <input type="text" id="board_url" wire:model="board_url" class="w-full mt-1 p-2 border border-gray-400 rounded-md shadow-sm">
                @error('board_url') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
            </div>
            <button type="submit" class="bg-blue-600 text-white font-bold py-2 px-4 rounded-md hover:bg-blue-700">
                Create Board
            </button>
        </form>
    </div>
</div>