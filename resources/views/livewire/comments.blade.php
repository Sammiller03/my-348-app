<div class="space-y-4">
    <!-- show all comments on a post -->
     <div class="pt-4"> <!-- adds some padding between post and comments section -->
        @foreach ($comments as $comment)
            <div class="p-4 bg-gray-100 rounded-lg shadow">

                <a href="{{ route('users.show', $comment->user) }}" 
                    class="text-sm font-semibold">
                        {{ $comment->user->name }}
                </a>

                <p class="text-gray-700">{{ $comment->comment }}
                    <small class="text-sm text-gray-500">{{ $comment->created_at->diffForHumans() }}</small>
                </p>

                <!-- edit comment button -->
                <a href="{{ route('comments.edit', $comment) }}" 
                    class="text-sm bg-gray-500 hover:bg-blue-500 text-white p-1 rounded px-2 whitespace-nowrap">
                        Edit comment
                </a>

                <!-- delete comment button -->
                <form method="POST" action="{{ route('comments.destroy', $comment) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" 
                                class="text-sm bg-gray-500 hover:bg-red-500 text-white p-1 rounded px-2 whitespace-nowrap">
                                    Delete comment
                    </button>
                </form>

            </div>
        @endforeach
    </div>


    <!-- add new comment -->
    <form wire:submit.prevent="addComment" class="mt-4">
        <input 
            type="text" 
            wire:model="newComment" 
            placeholder="Write a comment"
            class="w-full p-2 border rounded focus:ring focus:ring-indigo-300"
        />
        <button
            type="submit" 
            class="text-sm px-3 py-2 mt-2 bg-indigo-600 text-white font-semibold 
            rounded hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-black"
            >Submit
        </button>
    </form>
</div>


