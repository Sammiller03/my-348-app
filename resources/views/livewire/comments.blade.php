<div class="space-y-4">
    <!-- show all comments on a post -->
     <div class="pt-4"> <!-- adds some padding between post and comments section -->
        @foreach ($comments as $comment)
            <div class="p-4 bg-gray-100 rounded-lg shadow">
                <p class="text-gray-700">{{ $comment->comment }}
                    <small class="text-sm text-gray-500">{{ $comment->created_at->diffForHumans() }}</small>
                </p>
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
        class="text-sm px-3 py-2 mt-2 bg-indigo-600 text-white font-semibold rounded hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-black"
        >Submit
    </button>
</form>
</div>


