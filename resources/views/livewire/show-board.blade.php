<div class="max-w-4xl mx-auto py-8">
    <a href="{{ route('home') }}" wire:navigate class="hover:underline mb-6 block">&larr; Back to Board List</a>
    <div class="text-center mb-6">
        <h1 class="text-4xl font-bold tracking-tighter">/{{ $board->board_url }}/ - {{ $board->board_name }}</h1>
    </div>

    <div class="bg-[#EA8888] p-4 rounded-lg shadow-md mb-8 border border-[#800000]">
        <h2 class="text-2xl font-semibold mb-4 text-white">Create a New Thread</h2>
        <form wire:submit.prevent="newThread" class="space-y-4">
            <div>
                <label for="title" class="block font-medium">Title</label>
                <input type="text" id="title" wire:model="title" class="w-full mt-1 p-2 border border-[#800000] rounded-md shadow-sm bg-white text-black">
                @error('title') <span class="text-white text-sm font-bold">{{ $message }}</span> @enderror
            </div>
            <div>
                <label for="content" class="block font-medium">Content</label>
                <textarea id="content" wire:model="content" rows="4" class="w-full mt-1 p-2 border border-[#800000] rounded-md shadow-sm bg-white text-black"></textarea>
                @error('content') <span class="text-white text-sm font-bold">{{ $message }}</span> @enderror
            </div>
            <button type="submit" class="bg-gray-200 text-[#800000] font-bold py-2 px-4 rounded-md hover:bg-white border border-[#800000]">
                Create Thread
            </button>
        </form>
    </div>

    <hr class="border-[#D9BFB7] my-4">

    <div class="space-y-2">
        @forelse ($threads as $thread)
            <div class="bg-transparent border-t border-[#D9BFB7] py-4">
                <a href="{{ route('thread.show', ['board' => $board->board_url, 'thread' => $thread]) }}" wire:navigate class="text-xl font-semibold text-blue-800 hover:underline">{{ $thread->title }}</a>
                <div class="text-sm text-gray-600 mt-1">
                    <span>Thread No.{{ $thread->id }}</span> &bull;
                    <span>{{ $thread->posts_count }} replies</span> &bull;
                    <span>Last reply: {{ $thread->updated_at->diffForHumans() }}</span>
                </div>
                <p class="mt-2 whitespace-pre-wrap">{!! nl2br(Str::limit(format_greentext($thread->content), 250)) !!}</p>
            </div>
        @empty
            <p class="text-gray-600">No threads yet on this board. Be the first to create one!</p>
        @endforelse
    </div>

    <div class="mt-8">
        {{ $threads->links() }}
    </div>
</div>