<div class="max-w-4xl mx-auto py-8">
    <div class="mb-4">[ <a href="{{ route('board.show', $board->board_url) }}" wire:navigate class="text-blue-800 hover:underline">Return</a> ]</div>
    <hr class="border-[#D9BFB7] my-4">

    <!-- Original Post -->
    <div class="mb-6">
        <div class="mb-2">
            <span class="font-bold text-lg text-blue-800">{{ $thread->title }}</span>
            <span class="font-bold text-green-800">Anonymous</span>
            <span class="text-sm text-gray-600">{{ $thread->created_at->format('m/d/y(D)H:i:s') }}</span>
            <span class="text-sm text-gray-600">No.{{ $thread->id }}</span>
        </div>
        <div class="text-lg whitespace-pre-wrap">{!! nl2br(format_greentext($thread->content)) !!}</div>
    </div>

    <!-- Replies -->
    <div class="space-y-3 pl-8">
        @foreach ($posts as $post)
            <div wire:key="post-{{ $post->id }}" class="bg-[#F0E0D6] p-3 rounded-md shadow-sm border border-[#D9BFB7]">
                <div class="text-sm mb-2">
                    <span class="font-bold text-green-800">Anonymous</span>
                    <span class="text-gray-600">{{ $post->created_at->format('m/d/y(D)H:i:s') }}</span>
                    <span class="text-gray-600">No.{{ $post->id }}</span>
                </div>
                <div class="whitespace-pre-wrap">{!! nl2br(format_greentext($post->content)) !!}</div>
            </div>
        @endforeach
    </div>

    <hr class="border-[#D9BFB7] my-8">

    <!-- Reply Form -->
    <div class="bg-[#EA8888] p-4 rounded-lg shadow-md border border-[#800000]">
        <h2 class="text-2xl font-semibold mb-4 text-white">Post a Reply</h2>
        <form wire:submit.prevent="newPost" class="space-y-4">
            <div>
                <textarea wire:model="replyContent" rows="4" class="w-full mt-1 p-2 border border-[#800000] rounded-md shadow-sm bg-white text-black" placeholder="Write your reply..."></textarea>
                @error('replyContent') <span class="text-white text-sm font-bold">{{ $message }}</span> @enderror
            </div>
            <button type="submit" class="bg-gray-200 text-[#800000] font-bold py-2 px-4 rounded-md hover:bg-white border border-[#800000]">
                Reply
            </button>
        </form>
    </div>
</div>