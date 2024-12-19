<div class="space-y-4">
    <!-- show all comments on a post -->
     <div class="mt-10"> <!-- adds some padding between post and comments section -->
        @foreach ($comments as $comment)
            <div class="p-3 bg-gray-100 rounded-lg shadow flex justify-between items-start">

                <!-- user and comment -->
                <div>
                    <a href="{{ route('users.show', $comment->user) }}" 
                        class="text-sm font-semibold">
                            {{ $comment->user->name }}
                    </a>

                    <p class="text-gray-700 pb-4">{{ $comment->comment }}
                        <small class="text-sm text-gray-500">{{ $comment->created_at->diffForHumans() }}</small>
                    </p>
                </div>

                <!-- Buttons -->
                <div class="flex space-x-2">
                    <!-- edit comment button -->
                    <a href="{{ route('comments.edit', $comment) }}" 
                        class="text-sm bg-gray-500 hover:bg-blue-500 text-white rounded p-1.5 pt-1.5">

                        <!-- icons using Heroicons -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-4" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M17.414 2.586a2 2 0 00-2.828 0L3 14.172V17h2.828l11.586-11.586a2 2 0 000-2.828zM15.293 4.707l1.414-1.414 1.586 1.586-1.414 1.414-1.586-1.586zM12.879 7.121L15 9.243l-1.293 1.293-2.121-2.121 1.293-1.293z"></path>
                        </svg>
                    </a>

                    <!-- delete comment button -->
                    <form method="POST" action="{{ route('comments.destroy', $comment) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" 
                            class="text-sm bg-gray-500 hover:bg-red-500 text-white p-2 rounded">

                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-4 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6h18M4 6a2 2 0 012-2h12a2 2 0 012 2M7 6h10m-5 4v8m-6-8v8" />
                            </svg>        
                        </button>
                    </form>
                </div>

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


